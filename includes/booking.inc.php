<?php
require "database.inc.php";
require "functions.inc.php";
if(isset($_POST['submit'])){
/***************************************************OWNER SECTION*********************************************************/


    foreach($_POST as $key => $value) {
        ${$key} = mysqli_real_escape_string($connect,trim($value));
    }
    //checks if any of the variables above are empty
    if(empty($firstName) or empty($lastName) or empty($email) or empty($address) or empty($phone) or empty($typeOfWalk)){
        header("Location: ../index.php?error=empty#booking");
        exit();
    }
    //checks for only letters in firstName and lastName or if the length is shorter than 2
    validation("/^[a-zA-Z\s]*$/",$lastName,2,"error=notValid#booking");
    validation("/^[a-zA-Z\s]*$/",$firstName,2,"error=notValid#booking");
    //checks if the email has a valid format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?error=email#booking");
        exit();
    }
    //checks if the address has letters,numbers,spaces and a / or if the length is shorter than 5
    validation("/^[a-zA-Z0-9\/\s]*$/",$address,5,"error=notValid#booking");
    //checks for only numbers and if it begins with +381 or if the length is shorter than 9
    validation("/^\+381\s[0-9\/\-\s]*$/",$phone,9,"error=notValid#booking");
    //checks if the walks are /oneTime|daily|weekly/
    validation("/^(oneTime|daily|weekly)$/",$typeOfWalk,0,"error=fatal#booking");

    //depended on the type of walk checks for error in the appropriate fields
    switch ($typeOfWalk){
        case "oneTime":
            //checks if date and time are empty
            if(empty($date) or empty($time)){
                header("Location: ../index.php?error=empty#booking");
                exit();
            }
            //checks if the format of date and time is valid
            validation("/^2[0-9]{3}\-(0[1-9]|1[0-2])\-(0[1-9]|1[0-9]|2[0-9]|3[0-1])$/",$date,0,"error=notValid#booking");
            validation("/^(0[0-9]|1[0-9]|2[0-3])\:[0-5][0-9]$/",$time,0,"error=notValid#booking");
            //if the day is not empty display fatal Error
            if(!empty($day)){
                header("Location: ../index.php?error=fatal#booking");
                exit();
            }
            break;

        case "daily":
            //checks if the time is empty
            if(empty($time)){
                header("Location: ../index.php?error=empty#booking");
                exit();
            }
            //validates the time based on the format xx:xx
            validation("/^(0[0-9]|1[0-9]|2[0-3])\:[0-5][0-9]$/",$time,0,"error=notValid#booking");
            //if either date or day are not empty display Error
            if(!empty($date) or !empty($day)){
                header("Location: ../index.php?error=fatal#booking");
                exit();
            }
            break;

        case "weekly":
            //checks if the day or time are empty
            if(empty($day) or empty($time)){
                header("Location: ../index.php?error=empty#booking");
                exit();
            }
            //validates the time based on the format xx:xx
            validation("/^(0[0-9]|1[0-9]|2[0-3])\:[0-5][0-9]$/",$time,0,"error=notValid#booking");
            //validates the day
            dayValidation($day);
            //checks if the date is not empty and displays Error
            if(!empty($date)){
                header("Location: ../index.php?error=fatal#booking");
                exit();
            }
            break;

        default :
            //if none of the above cases were executed redirect with an Error
            header("Location: ../index.php?error=fatal#booking");
            exit();
    }

    //checks if there is an email already in the database
    $sql = "SELECT email,name FROM users WHERE email='$email';";
    $query = mysqli_query($connect,$sql);
    if(mysqli_num_rows($query) > 0 ){
        header("Location: ../index.php?error=registered#booking");
        exit();
    }
    /***************************************************OWNER SECTION*******************************************************/


    /***************************************************DOG SECTION*********************************************************/
    //checks if $numberOfDogs is empty
    if(empty($numberOfDogs)){
        header("Location: ../index.php?error=empty#booking");
        exit();
    }
    //checks if the value of $numberOfDogs is either 1, 2 or 3
    validation("/^(1|2|3)$/",$numberOfDogs,0,"error=fatal#booking");
    $numberOfDogs = (int)$numberOfDogs;
    for($i=0; $i<$numberOfDogs; $i++){
        $dogNumber = ["One","Two","Three"];
        dogValidation(
            $connect,
            ${"dogName".$dogNumber[$i]},
            ${"dogYear".$dogNumber[$i]},
            ${"dogMonth".$dogNumber[$i]},
            ${"dogBreed".$dogNumber[$i]},
            ${"dogVaccinated".$dogNumber[$i]},
            ${"dogTrained".$dogNumber[$i]},
            ${"dogAggression".$dogNumber[$i]},
            ${"dogOther".$dogNumber[$i]}
        );
        //combines year and month into age for the dog
        ${"dogAge".$dogNumber[$i]} = ${"dogYear".$dogNumber[$i]} * 12 +  ${"dogMonth".$dogNumber[$i]};
        //converts every first letter of a word to uppercase
        ${"dogName".$dogNumber[$i]} = ucwords(strtolower(${"dogName".$dogNumber[$i]}));
        //casts strings as to so it can be read in database
        ${"dogVaccinated".$dogNumber[$i]} = (int)${"dogVaccinated".$dogNumber[$i]};
        ${"dogTrained".$dogNumber[$i]} = (int)${"dogTrained".$dogNumber[$i]};
        ${"dogAggression".$dogNumber[$i]} = (int)${"dogAggression".$dogNumber[$i]};

    }
    /***************************************************\/DOG SECTION\/*********************************************************/
    //capitalize the first letter of each word for $name
    $name = ucwords(strtolower($firstName." ".$lastName));
    $address = ucwords(strtolower($address));
    //replaces the - and / in the phone number with an empty string
    $phone = str_replace(array('/','-'),"",$phone);
    //generates random string of character(20) sets status(free walk) to 1 and verified to 0
    $verificationCode = generateCode();
    $reviewCode = rand(1111111111,9999999999);
    //hashes the email
    $hashedEmail = md5($email);
    //combine date and time to write to the database
    if(!empty($date) and !empty($time)){
        $dateTime = $date." ".$time;
    }

    //INSERT INTO TABLE USERS
    $sql = "INSERT INTO users(name,email,hashed_email,address,phone,status,verified,review_code,verification_code) 
            VALUES ('$name','$email','$hashedEmail','$address','$phone',0,0,'$reviewCode','$verificationCode');";
    if(!$query = mysqli_query($connect,$sql)){
        header("Location: index.php?error=fatal#booking");
        exit();
    }
    //gets the user_id from the database
    $userID = getUserID($connect,$verificationCode);
    //inserts dogs into the database based on the number of them
    for($i=0; $i<$numberOfDogs; $i++){
        $dogNumber = ["One","Two","Three"];
        dogSQL(
            $connect,
            "$userID,
            '${"dogName".$dogNumber[$i]}',
            ${"dogAge".$dogNumber[$i]},
            '${"dogBreed".$dogNumber[$i]}',
            ${"dogVaccinated".$dogNumber[$i]},
            ${"dogTrained".$dogNumber[$i]},
            ${"dogAggression".$dogNumber[$i]},
            '${"dogOther".$dogNumber[$i]}'"
        );
    }
    //depended on the $typeOfWalk inserts the correct data into the database
    switch($typeOfWalk){
        case "oneTime":
            typeOfWalkSQL($connect,"user_fk,type,one_time_walk",
                                    "$userID,'$typeOfWalk','$dateTime'"
            );
            break;
        case "daily":
            typeOfWalkSQL($connect,"user_fk,type,daily_walk_time",
                                    "$userID,'$typeOfWalk','$time'
            ");
            break;
        case "weekly":
            typeOfWalkSQL($connect,"user_fk,type,weekly_walk_day,weekly_walk_time",
                                    "$userID,'$typeOfWalk','$day','$time'"
            );
            break;
        default:
            header("Location: ../index.php?error=fatal#booking");
            exit();
    }
    //SEND VERIFICATION EMAIL
    $to = $email;
    $subject = "VERIFY";
    $txt = "<html>
    Verify your request<br><a href=\"https://walkadog.secondsection.in.rs/verification.inc.php?code=$verificationCode\">Verify</a> ";
    $headers = "From:  walk·a·dog <walkadog@secondsection.in.rs>" . " \r\n" .
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    mail($to,$subject,$txt,$headers);
    //if everything was done successfully redirects with message success
    header("Location: ../index.php?error=success#booking");
    exit();

}else{
    //if the form has not been sent from the booking form
    header("Location: ../index.php?error=fatal#booking");
    exit();
}
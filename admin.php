<?php
//require database and header
require "includes/database.inc.php";
require "includes/header.inc.php";
require "includes/functions.inc.php";
    //if the $_SESSION has started you can seee the admin panel
    if(isset($_SESSION['username']) and $_SESSION['username'] =='linolada') {
            //gets all the emails from the table mail
            $sql = "SELECT id,mail FROM newsletter";
            $query = mysqli_query($connect,$sql);

/***************************************NEWSLETTER**************************************************/
?>
    <div class="col-sm-12 text-center mt-5">
        <h1>SELECT WHICH TABLE YOU WANT TO DISPLAY</h1>
    </div>
    <div class="col-sm-12 py-5" align="center">
        <button class="btn btn-primary" id="btnNewsletter">Newsletter</button>
        <button class="btn btn-primary" id="btnReviews">Reviews</button>
        <button class="btn btn-primary" id="btnReviewCode">Review Code</button>
        <button class="btn btn-primary" id="btnCustomers">Customers</button>
        <button class="btn btn-primary" id="btnWalks">Walks</button>
        <button class="btn btn-primary" id="btnDogs">Dogs</button>
    </div>
    <div class="text-center fw-600">
        <?php
        if(isset($_GET['error'])){
            $error = $_GET['error'];
            if($error == 'error') echo "Something went wrong! Try again.";
            if($error == 'success') echo "Your action was completed successfully";
        }
        ?>
    </div>
    <div class="container" id="newsletter">
        <div class="row mt-5">
            <div class="col-sm-12 pb-5">
                <h1 class="text-center">Newsletter</h1>
            </div>
            <div class="col-sm-6 mb-5">
                <form method="post" action="includes/secret/sendMail.inc.php">
                    <label>Subject</label>
                    <input type="text" name="subject">
                    <label>Message</label>
                    <textarea name="comment"></textarea>
                    <button class="btn btn-primary btn-group-justified" type="submit" name="submit">Send</button>
                </form>
                    <?php
                        if(isset($_GET['mail'])){
                            $mail = $_GET['mail'];
                            if($mail == 'success'){
                                echo "<span class=\"text-center\">Newsletter sent successfully</span>";
                            }
                            if($mail == 'error'){
                                echo "<span class=\"text-center\">There was an error! Please try again</span>";
                            }
                        }
                    ?>
                    </div>
            <div class="col-sm-6 table-scroll">
                <table class="table table-striped table-danger">
                    <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>email</th>
                        <th>update/delete</th>
                    <tr>
                    </thead>
                    <tbody>
                    <?php
                    //displays every email from table mail (inside is a form where you can delete or update the email)
                    while($result = mysqli_fetch_assoc($query)) {
                        echo"
                        <tr>
                            <td>{$result['id']}</td>
                            <td>{$result['mail']}</td>
                            <td>
                                <form method=\"post\" action=\"includes/secret/editMail.inc.php\">
                                    <input type=\"hidden\" name=\"id\" value=\"{$result['id']}\">
                                    <button type=\"submit\" name=\"update\" value=\"update\" class=\"btn btn-primary\">UPDATE</button>
                                    <button onclick=\"return confirm('Are you sure you wish to delete this item?');\"  
                                    type=\"submit\" name=\"delete\" value=\"delete\" class=\"btn btn-primary ml-3\">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-5 col-sm-offset-3 mt-5">
                <form action="includes/secret/adminNewsletter.inc.php" method="post">
                    <div class="form-group">
                        <input type="text" name="email" placeholder="Email Address..." >
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                    </div>
                    <div class="col-sm-12">
                        <hr>
                    </div>
            </div>
        <?php
/***************************************NEWSLETTER**************************************************/

/******************************************REVIEWS**************************************************/
            $sql = "SELECT review_id, name, comment,reviews.verified FROM reviews JOIN users ON code_fk = review_code;";
            $query = mysqli_query($connect,$sql);
        ?>

            <div class="container" id="reviews">
                <div class="row mt-5">
                    <div class="col-sm-12">
                        <h1 class="text-center">REVIEWS</h1>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3 mb-5">
                    </div>
                </div>
                <div class="col-sm-12  table-scroll">
                <table class="table table-striped table-danger">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>comment</th>
                            <th>verified</th>
                            <th>approve</th>
                        <tr>
                    </thead>
                    <tbody>
        <?php
            //displays every email from table mail inside is a form where you can delete or update the email
            while($result = mysqli_fetch_assoc($query)) {
                $verified = checkSQLBoolean ($result['verified']);
                echo"
                    <tr>
                        <td class=\"col-sm-1\">{$result['review_id']}</td>
                        <td class=\"col-sm-2\">{$result['name']}</td>
                        <td class=\"col-sm-5\">{$result['comment']}</td>
                        <td>$verified</td>
                        <td class=\"col-sm-4\">
                            <form method=\"post\" action=\"includes/secret/approve.inc.php\">
                                <button onclick=\"return confirm('Are you sure you wish to verify this item?');\" 
                                type=\"submit\" name=\"approve\" value=\"{$result['review_id']}\" class=\"btn btn-primary\">VERIFY</button>
                                <button onclick=\"return confirm('Are you sure you wish to delete this item?');\"  
                                type=\"submit\" name=\"delete\" value=\"{$result['review_id']}\" class=\"btn btn-primary ml-3\">DELETE</button>
                            </form>
                        </td>
                    </tr>
                ";
            }
        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-5 col-sm-offset-1 mt-5"></div>
                <div class="col-sm-12">
                <hr>
                </div>
            </div>
        <?php
    /******************************************REVIEWS**************************************************/
        $sql = "SELECT DISTINCT user_id,u.name,email,phone,address,status FROM users u
                JOIN dogs on user_id = owner_fk
                WHERE u.verified=1
        ";
        $query = mysqli_query($connect,$sql);
        ?>

    <div class="container" id="customers">
        <div class="row mt-5">
            <div class="col-sm-12">
                <h1 class="text-center">CUSTOMERS</h1>
            </div>
            <div class="col-sm-6 col-sm-offset-3 mb-5">
            </div>
        </div>
        <span>Note only displays customers that are verified</span>
        <div class="col-sm-12 col-sm-offset-0 table-scroll">
            <table class="table table-striped table-danger">
                <thead class="thead-light">
                <tr align="center">
                    <th>#</th>
                    <th>name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>address</th>
                    <th>free walk</th>
                    <th>update</th>
                <tr>
                </thead>
                <tbody>
                <?php
                //displays every email from table mail inside is a form where you can delete or update the email
                while($result = mysqli_fetch_assoc($query)) {
                    if($result['status'] == 1)
                        $result['status'] = "<i class=\"fa fa-close\"></i>";
                    else  $result['status'] = "<i class=\"fa fa-check\"></i>";

                    echo " <tr>
                            <td>{$result['user_id']}</td>
                            <td>{$result['name']}</td>
                            <td>{$result['email']}</td>
                            <td>{$result['phone']}</td>
                            <td>{$result['address']}</td>
                            <td>{$result['status']}</td>
                            <td>
                                <form method=\"post\" action=\"includes/secret/editUser.inc.php\">
                                    <input type=\"hidden\" name=\"id\" value=\"{$result['user_id']}\">
                                    <button type=\"submit\" name=\"update\" value=\"update\" class=\"btn btn-primary\">UPDATE</button>
                                    <button onclick=\"return confirm ('Are you sure you wish to delete this item?');\"  
                                    type=\"submit\" name=\"delete\" value=\"delete\" class=\"btn btn-primary ml-3\">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    ";
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-5 col-sm-offset-1 mt-5"></div>
        <div class="col-sm-12">
            <hr>
        </div>
    </div>
    <!-- ******************************************CUSTOMERS************************************************** -->
    <?php
    /**********************************************WALKS****************************************************/
    $sql = "SELECT user_id,u.name,COUNT(dog_id) as 'dogs', type,one_time_walk,weekly_walk_day,weekly_walk_time,daily_walk_time FROM users u
                JOIN dogs on user_id = owner_fk
                JOIN walks on user_id = user_fk
                WHERE u.verified=1
                GROUP BY user_id,type,one_time_walk,weekly_walk_day,weekly_walk_time,daily_walk_time;
        ";
    $query = mysqli_query($connect,$sql);
    ?>

    <div class="container" id="walks">
        <div class="row mt-5">
            <div class="col-sm-12">
                <h1 class="text-center">WALKS</h1>
            </div>
            <div class="col-sm-6 col-sm-offset-3 mb-5">
            </div>
        </div>
        <span>Note only displays customers that are verified</span>
        <div class="col-sm-12 col-sm-offset-0 table-scroll">
            <table class="table table-striped table-danger">
                <thead class="thead-light">
                <tr align="center">
                    <th>#</th>
                    <th>name</th>
                    <th># dogs</th>
                    <th>type</th>
                    <th>time/date</th>
                    <th>update/delete</th>
                <tr>
                </thead>
                <tbody>
                <?php
                //displays every email from table mail inside is a form where you can delete or update the email
                while($result = mysqli_fetch_assoc($query)) {
                    echo " <tr>
                            <td>{$result['user_id']}</td>
                            <td>{$result['name']}</td>
                            <td>{$result['dogs']}</td>
                            <td>{$result['type']}</td>
                            <td>{$result['weekly_walk_day']} {$result['weekly_walk_time']} {$result['daily_walk_time']} {$result['one_time_walk']}</td>
                            <td>
                                <form method=\"post\" action=\"includes/secret/editWalk.inc.php\">
                                    <input type=\"hidden\" name=\"id\" value=\"{$result['user_id']}\">
                                    <button type=\"submit\" name=\"update\" value=\"update\" class=\"btn btn-primary\">UPDATE</button>
                                    <button onclick=\"return confirm ('Are you sure you wish to delete this item?');\"  
                                    type=\"submit\" name=\"delete\" value=\"delete\" class=\"btn btn-primary ml-3\">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    ";
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-5 col-sm-offset-1 mt-5"></div>
        <div class="col-sm-12">
            <hr>
        </div>
    </div>
    <!-- **********************************************WALKS**************************************************** -->
    <?php
    /******************************************DOGS**************************************************/
    $sql = "SELECT users.user_id as 'id',users.name as 'name',dogs.name as 'dogName',age,breed,vaccinated,trained,aggression,other FROM dogs
            JOIN users ON user_id = owner_fk
    ";
    $query = mysqli_query($connect,$sql);
    ?>
    <div class="container" id="dogs">
        <div class="row mt-5">
            <div class="col-sm-12">
                <h1 class="text-center">DOGS</h1>
            </div>
            <div class="col-sm-6 col-sm-offset-3 mb-5">
            </div>
        </div>
        <span>Note only displays customers that are verified</span>
        <div class="col-sm-12 col-sm-offset-0 table-scroll">
            <table class="table table-striped table-danger">
                <thead class="thead-light">
                <tr align="center">
                    <th>#</th>
                    <th>name</th>
                    <th>dog name</th>
                    <th>age</th>
                    <th>breed</th>
                    <th>vaccinated</th>
                    <th>trained</th>
                    <th>aggression</th>
                    <th>other</th>
                    <th>update/delete</th>
                <tr>
                </thead>
                <tbody>
                <?php
                //displays every email from table mail inside is a form where you can delete or update the email
                while($result = mysqli_fetch_assoc($query)) {
                    $vaccinated = checkSQLBoolean ($result['vaccinated']);
                    $trained = checkSQLBoolean ($result['trained']);
                    $aggression = checkSQLBoolean ($result['aggression']);
                    echo " <tr>
                            <td>{$result['id']}</td>
                            <td>{$result['name']}</td>
                            <td>{$result['dogName']}</td>
                            <td >{$result['age']}</td>
                            <td class=\"col-sm-2\">{$result['breed']}</td>
                            <td>$vaccinated</td>
                            <td>$trained</td>
                            <td>$aggression</td>
                            <td class=\"col-sm-2\">{$result['other']}</td>
                            <td class=\"col-sm-3\">
                                <form method=\"post\" action=\"includes/secret/editDog.inc.php\">
                                    <input type=\"hidden\" name=\"id\" value=\"{$result['id']}\">
                                    <button type=\"submit\" name=\"update\" value=\"update\" class=\"btn btn-primary\">UPDATE</button>
                                    <button onclick=\"return confirm ('Are you sure you wish to delete this item?');\"  
                                    type=\"submit\" name=\"delete\" value=\"delete\" class=\"btn btn-primary ml-3\">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    ";
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-5 col-sm-offset-1 mt-5"></div>
        <div class="col-sm-12">
            <hr>
        </div>
    </div>
    <?php
    //gets all the emails from the table mail
    $sql = "SELECT user_id,name,email,review_code FROM users
                    WHERE review_code not in (SELECT code_fk FROM reviews)";
    $query = mysqli_query($connect,$sql);

    /***************************************REVIEW CODE**************************************************/
    ?>

    <div class="container" id="review-code">
        <div class="row mt-5">
            <div class="col-sm-12 pb-5">
                <h1 class="text-center">Review Code</h1>
            </div>
            <div class="col-sm-6 mb-5">
                <form method="post" action="includes/secret/sendReviewCode.php">
                    <label>Code</label>
                    <input type="text" name="code">
                    <label>Email</label>
                    <input type="email" name="email">
                    <button class="btn btn-primary btn-group-justified mt-4" type="submit" name="submit">Send</button>
                </form>
            </div>
            <div class="col-sm-6 table-scroll">
                <table class="table table-striped table-danger">
                    <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>email</th>
                        <th>code</th>
                    <tr>
                    </thead>
                    <tbody>
                    <?php
                    //displays every email from table mail (inside is a form where you can delete or update the email)
                    while($result = mysqli_fetch_assoc($query)) {
                        echo"
                        <tr>
                            <td>{$result['user_id']}</td>
                            <td>{$result['name']}</td>
                            <td>{$result['email']}</td>
                            <td>{$result['review_code']}</td>
                        </tr>
                        ";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12">
                <hr>
            </div>
        </div>
    </div>
    <?php
    /***************************************REVIEW CODE**************************************************/
    ?>

    <?php
        //if the admin is not logged in it will display a login form
    }else{
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <form class="login-form login"  method="post" action="includes/login.inc.php">
                        <input  class="form-control mb-10"  type="text" name="username" placeholder="Username">
                        <input class="form-group form-control" type="password" name="password" placeholder="password">
                        <button class="btn btn-primary btn-group-justified" type="submit" name="submit">Login</button>
                        <?php
                        //error checking for the admin form
                        if(isset($_GET['login'])){
                            if($_GET['login'] === 'empty'){
                                echo "<div class=\"text-center text-light\">Please fill in all fields</div>";
                            }
                            if($_GET['login'] === 'error'){
                                echo "<div class=\"text-center text-light\">Wrong information</div>";

                            }
                            if($_GET['login'] === 'fatal'){
                                echo "<div class=\"text-center text-light\">Oops something went wrong</div>";

                            }

                        }
        }
                        ?>
                    </form>
                </div>
            </div>
        </div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/admin.js"></script>
</body>
</html>




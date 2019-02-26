<?php
require "../database.inc.php";
session_start();

if(isset($_POST['update']) and isset($_SESSION['username'])){
    $id = mysqli_real_escape_string ($connect,$_POST['id']);
    //form for changing walk details
    ?>
        <form action="editWalk.inc.php" method="post">
            <input type="hidden" name="id" value="<?=$id?>">
            <label>Type</label>
            <select name="walk">
            <option value="oneTime">One Time</option>
            <option value="weekly">Weekly</option>
            <option value="daily">Daily</option>
            </select><br>
            <label>Time for One Time Walk/Daily Walk</label>
            <input type="time" name="time"><br>
            <label>Date for One Time Walk</label>
            <input type="date" name="date"><br>
            <label>Day for Weekly Walk</label>
            <select name="day">
            <option></option>
            <option value="Monday">Monday</option>
            <option value="Monday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
            </select><br>
            <label>Time for Weekly Walk</label>
            <input type="time" name="weeklyTime"><br>
            <button type="submit" name="submit">Send</button>
        </form>
<?php
}elseif (isset($_POST['delete']) and isset($_SESSION['username'])){
    //deleting the walk from the database where the ID's match
    $id = $_POST['id'];
    $sql = "DELETE FROM walks WHERE user_fk = $id;";
    $query = mysqli_query ($connect,$sql);
    if(!$query){
        header ("Location: ../../admin.php?error=error");
        exit();
    }
    header ("Location: ../../admin.php?error=success");
    exit();

} elseif (isset($_POST['submit']) and isset($_SESSION['username'])){
    foreach ($_POST as $key => $value){
        ${$key} = mysqli_real_escape_string ($connect,trim ($value));
    }
    //inserting the new data into the database
    switch ($walk){
        case "oneTime":
            $dateTime = $date." ".$time;
            $sql = "UPDATE walks SET walks.type = '$walk',one_time_walk = '$dateTime',daily_walk_time = NULL,weekly_walk_day = NULL,weekly_walk_time = NULL WHERE user_fk = $id;";
        break;
        case "daily":
            $sql = "UPDATE walks SET walks.type = '$walk',daily_walk_time = '$time',one_time_walk = NULL,weekly_walk_day = NULL,weekly_walk_time = NULL WHERE user_fk = $id;";
        break;
        case "weekly":
            $sql = "UPDATE walks SET walks.type = '$walk',weekly_walk_day = '$day',weekly_walk_time = '$weeklyTime',one_time_walk = NULL,daily_walk_time = NULL WHERE user_fk = $id;";
        break;
        default:
            header ("Location: ../../admin.php?error=error");
            exit();
    }

    $query = mysqli_query ($connect,$sql);
    if(!$query){
        header ("Location: ../../admin.php?error=error");
        exit();
    }
    header ("Location: ../../admin.php?error=success");
    exit();
}else{
    header ("Location: ../../index.php");
    exit();
}


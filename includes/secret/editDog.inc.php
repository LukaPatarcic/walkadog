<?php
require "../database.inc.php";
session_start();

if(isset($_POST['update']) and isset($_SESSION['username'])){
    //gets dog information from the database where the IDs match
    $id = mysqli_real_escape_string ($connect,$_POST['id']);
    $sqlDog = "SELECT * FROM dogs where owner_fk = $id;";
    $queryDog = mysqli_query ($connect,$sqlDog);
    $resultDog = mysqli_fetch_assoc ($queryDog);
?>
<!-- form for changing the dogs information -->
<form action="editDog.inc.php" method="post">
    <input type="hidden" name="id" value="<?=$id?>">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Name" name="name" value="<?=$resultDog['name']?>"><br>
    <label>Age</label>
    <input type="text" class="form-check-inline" placeholder="Age" name="age" value="<?=$resultDog['age']?>">In Months<br>
    <label>Breed</label>
    <select name="breed">
        <option value="<?=$resultDog['breed']?>"><?=$resultDog['breed']?></option>
        <?php
        $sql = "SELECT breed FROM breeds;";
        $query = mysqli_query($connect,$sql);
        while($result = mysqli_fetch_assoc($query)){
            echo "<option value=\"{$result['breed']}\">{$result['breed']}</option>";
        }
        ?>
    </select><br>
    <label class="container1">Vaccinated</label>
    <input type="checkbox" id="vaccinated" class="custom-checkbox" name="vaccinated" value="<?=$resultDog['vaccinated']?>"><br>
    <label class="container1">Trained</label>
    <input type="checkbox" id="trained" class="custom-checkbox" name="trained" value="<?=$resultDog['trained']?>"><br>
    <label class="container1">Aggressive</label>
    <input type="checkbox" id="aggressive" class="custom-checkbox" name="aggressive" value="<?=$resultDog['aggression']?>"><br>
    <label class="headingDog">Other</label><br>
    <textarea class="form-control textarea" placeholder="Enter text here" rows="5" name="other"><?=$resultDog['other']?></textarea><br>
    <button type="submit" name="submit">Update</button>
</form>
<script src="../../js/jquery-3.2.1.min.js"></script>
<script>
    //checking checkbox values
    $(document).ready(function () {
        //checks the checkbox if it has the value of 1
        $('.custom-checkbox').each(function () {
            if($(this).val() == 1){
                $(this).attr("checked","checked");
            }
        });

    })
</script>
<?php
}elseif (isset($_POST['delete']) and isset($_SESSION['username'])){
    //deletes the dog from the database where the owner id's match
    $id = mysqli_real_escape_string ($connect,$_POST['id']);
    $sql = "DELETE FROM dogs WHERE owner_fk = $id";
    $query = mysqli_query ($connect,$sql);
    if(!$query){
        header ("Location: ../../admin.php?error=error");
        exit();
    }
    header ("Location: ../../admin.php?error=success");
    exit();

}elseif(isset($_POST['submit']) and isset($_SESSION['username'])){
    //updates the dogs information based on the form above
    foreach ($_POST as $key => $value) {
        ${$key} = mysqli_real_escape_string ($connect,$value);
    }
    $vaccinated = (int)$vaccinated;
    $trained = (int)$trained;
    $aggression = (int)$aggression;
    $sql = "UPDATE dogs SET name = '$name',age = $age, breed='$breed',vaccinated = $vaccinated,trained = $trained, aggression = $aggression, other = '$other' WHERE owner_fk = $id;";
    $query = mysqli_query ($connect,$sql);
    if(!$query){
        header ("Location: ../../admin.php?error=error");
        exit();
    }
    header ("Location: ../../admin.php?error=success");
    exit();
}else{
    header("Location: ../../index.php");
    exit();
}
<?php
require "includes/header.inc.php";
?>

<div class="clearfix"></div>
<!-- breadcrumb start -->
<section class="breadcrumb" style="background: url(images/dogBoneBackground.jpg) no-repeat center;">
    <div class="breadcrumb-overlay"></div>
    <div class="breadcrumb-title">
        <h1>Newsletter unsubscribe</h1>
    </div>
</section>
<!-- breadcrumb end -->

<!--error-->
<div class="page error404-page">
    <div class="error-page">
        <div class="container">
            <div class="errorpage">
                <strong>Newsletter</strong> <br />
            <?php
                require "includes/database.inc.php";
                if(isset($_GET['key'])){
                    //if the user has clicked the unsubscribe button it redirects him
                    //to this page and deletes him from the database if the hashedMails are valid
                    $hashedMail = $_GET['key'];
                    $sql = "SELECT hashedMail FROM newsletter WHERE hashedMail = '$hashedMail';";
                    $query = mysqli_query($connect,$sql);
                    $result = mysqli_fetch_assoc($query);
                    if($result['hashedMail'] == $hashedMail){
                        $sql = "DELETE FROM newsletter WHERE hashedMail = '$hashedMail'";
                        $query = mysqli_query($connect,$sql);
                        echo "<b>You have successfully unsubscribed</b>
                              <p>Thank you for using our services</p>";
                    }else{
                        echo "<b>We can't find you in our database</b>
                              <p>Try again later</p>";
                    }

                }else{
                    echo "<b>Oops something went wrong!</b>
                          <p>Try again later</p>";
                }
            ?>

                <br />
                <a href="index.php" class="btn btn-primary"> Go Back</a> </div>

        </div>
    </div>

</div>
<!--/error-->

<!-- js library start -->
<script  src="js/jquery-3.2.1.min.js"></script>
<script  src="js/bootstrap.min.js"></script>
<script  src="js/owl.carousel.min.js"></script>
<script  src=js/jquery.mixitup.min.js></script>
<script  src="js/jquery.magnific-popup.min.js"></script>
<script  src="js/waypoints.min.js"></script>
<script  src="js/jquery.counterup.min.js"></script>
<script  src=js/wow.js></script>
<script  src="js/script.js"></script>

<!-- js library end -->

</body>

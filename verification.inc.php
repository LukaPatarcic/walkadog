<?php
require "includes/database.inc.php";
require "includes/header.inc.php";
?>

<div class="clearfix"></div>
<!-- breadcrumb start -->
<section class="breadcrumb" style="background: url(images/dogBoneBackground.jpg) no-repeat center;">
    <div class="breadcrumb-overlay"></div>
    <div class="breadcrumb-title">
        <h1>Verification page</h1>
    </div>
</section>
<!-- breadcrumb end -->

<!--error-->
<div class="page error404-page">
    <div class="error-page">
        <div class="container">
            <div class="errorpage">
                <strong>VERIFICATION</strong> <br />
                <?php
                    if(isset($_GET['code'])){
                        $code = $_GET['code'];
                        //depending on the query display the appropriate message
                        $sql = "UPDATE users SET verified=1 WHERE verification_code='$code';";
                        $query = mysqli_query($connect,$sql);
                        if(!$query){
                            echo "
                                <b>Verification unsuccessful</b> 
                                <em>Sorry something went wrong</em>
                                <p>Try to verify again in a few minutes.</p>
                                <br />
                            ";
                        }else{
                            echo "
                                <b>Verification successful</b> 
                                <em>Thank you for registering</em>
                                <p>Can't wait to see you.</p>
                                <br />";
                        }

                    }else{
                        echo "
                            <b>Verification unsuccessful</b> 
                            <em>Oops something went wrong!</em>
                            <p>Please try again later!</p>
                            <br />
                        ";
                    }
                    ?>
                <a href="index.php" class="btn btn-primary"> Go Back</a>
            </div>
        </div>
    </div>
</div>


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
</html>

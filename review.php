<?php
require "includes/header.inc.php";
require "includes/database.inc.php";
require "includes/functions.inc.php";
?>

<body>


<div class="clearfix"></div>
<!-- breadcrumb start -->
<section class="breadcrumb" style="background: url(images/dogBoneBackground.jpg) no-repeat center;">
    <div class="breadcrumb-overlay"></div>
    <div class="breadcrumb-title">
        <h1>Your review</h1>
    </div>
</section>
<!-- breadcrumb end -->

<!--error-->
<div class="page error404-page">
    <div class="error-page">
        <div class="container">
            <div class="reviewpage">
                 <form method="post" action="includes/review.inc.php">
                     <div class="form-group">
                        <label for="reviewCode" class="reviewLabel">Review Code</label>
                        <input type="text" class="form-control textarea input-lg" id="reviewCode" maxlength="10" size="10" name="code">
                    </div>
                 	<div class="form-group">
                        <label for="reviewMessage" class="reviewLabelComment">Your comment</label>
                        <textarea class="form-control textarea" rows="5" id="reviewMessage" placeholder="Enter your comment" name="comment" maxlength="100"></textarea>
                    </div>
					<button type="submit" class="btn btn-primary" name="submit">Send</button>
                     <br><br>
                     <span class="newsletter-error">
                        <?php
                            if(isset($_GET['error'])){
                                $error = $_GET['error'];
                                if($error == 'badFormat'){
                                    echo "Please fill the form correctly!";
                                }
                                if($error == 'notInDatabase'){
                                    echo "The code you entered isn't valid!";
                                }
                                if($error == 'codeUsed'){
                                    echo "The given code has already been redeemed!";
                                }
                                if($error == 'success'){
                                    echo "Success! Thank you for your review!";
                                }
                                if($error == 'fatal'){
                                    echo "Oops something went wrong!";
                                }
                            }
                        ?>
                     </span>
            	</form>
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

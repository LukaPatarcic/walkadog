
<!--Footer-->
<footer>
    <div class="container">
        <div class="row">
            <div class="  col-xs-12 col-sm-8 col-md-4 col-lg-4">
                <div class="footer-widget">
                    <h3>walk·a·dog</h3>
                    <div class="widget-content">
                        <div class="text">Here is our information. Contact us at any time!</div>
                        <address>
                            <p><a href="#"><i class="fa fa-map-marker"></i></a> Subotica, Serbia</p>
                            <p><a href="#"><i class="fa fa-phone"></i></a>+381 62 165 3523</p>
                            <p><a href="#"><i class="fa fa-envelope"></i></a> walkadog@secondsection.in.rs</p>
                        </address>
                    </div>
                </div>
            </div>
            <div class=" col-xs-12  col-sm-4 col-md-3 col-lg-3">
                <div class="footer-widget links-widget">
                    <h3>Explore</h3>
                        <ul>
                            <li><a href="#home">home</a></li>
                            <li><a href="#about">about</a></li>
                            <li><a href="#pricing">pricing</a></li>
                            <li><a href="#booking">booking</a></li>
                            <li><a href="#contact">contact</a></li>
                </div>
            </div>
            <div class="pt-xs-0  col-xs-12 pt-sm-3 col-sm-12 col-md-5 col-lg-5" id="newsletter">
                <div class="footer-widget subscribe-widget">
                    <h3>Newsletter</h3>
                    <div class="widget-content">
                        <div class="text">Sign up here for our newsletter</div>
                        <div class="newsletter-form">
                            <form action="includes/newsletter.inc.php" method="post">
                                <div class="form-group">
                                    <input type="hidden" name="hidden">
                                    <input type="hidden" name="formLocation" value="footer">
                                    <input type="email" name="email" placeholder="Email Address..." required>
                                </div>
                                <div>
                                    <div class="pb-3 fw-600">
                                    <?php
                                        //error displaying for the footer newsletter
                                        if(isset($_GET['mailnewsletter'])){
                                            $mail = $_GET['mailnewsletter'];
                                            if($mail == 'error'){
                                                echo "Error! Please fill in the field!";
                                            }
                                            if($mail == 'mail'){
                                                echo "Please enter a valid email!";
                                            }
                                            if($mail == 'fatalError'){
                                                echo "Oops something went wrong. Please try again!";
                                            }
                                            if($mail == 'success'){
                                                echo "Thank you for signing up for our newsletter";
                                            }
                                            if($mail == 'same'){
                                                echo "You are already subscribed!";
                                            }
                                        }
                                    ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary">subscribe now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!--Footer Bottom START-->
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="text text-left">Copyrights &copy; <a href="#">Linolada <?= date("Y") ?></a>. All Rights Reserved</div>
            </div>
            <div class="col-md-6 col-sm-6">
                <ul class="social-links text-right">
                    <li><a target="_blank" href="https://www.facebook.com/Walkadog-539111946568168/"><i class="fab fa-facebook"></i></a></li>
                    <li><a target="_blank" href="https://twitter.com/walkadog1"><i class="fab fa-twitter"></i></a></li>
                    <li><a target="_blank" href="https://www.youtube.com/channel/UCuj4wzw9FlD5nL3nf_DEb3A"><i class="fab fa-youtube"></i></a></li>
                    <li><a target="_blank" href="https://www.instagram.com/walkadog6/"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Footer Bottom End -->

<!-- scroll top -->
<a class="scroll-top" href="javascript:void(0)"><i class="fa fa-angle-up"></i></a>

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
<script src="js/booking.js"></script>
<!-- js library end -->

</body>
</html>

    <!--  Scripts
    ================================================== -->

    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>

    <!-- Bootsrap javascript file -->
    <?php echo '<script src="'.PROJECT_ROOT.'assets/js/bootstrap.min.js"></script>'; ?>
    <?php echo '<script src="'.PROJECT_ROOT.'assets/js/bootstrap-dropdown.js"></script>'; ?>
    
    <!-- owl carouseljavascript file -->
    <?php echo '<script src="'.PROJECT_ROOT.'assets/js/owl.carousel.min.js"></script>'; ?>

    <!-- Template main javascript -->
    <?php echo '<script src="'.PROJECT_ROOT.'assets/js/main.js"></script>'; ?>

    <!-- Modernizr -->
    <?php echo '<script src="'.PROJECT_ROOT.'assets/js/modernizr-2.6.2.min.js"></script>'; ?>
    <?php echo '<script src="'.PROJECT_ROOT.'vendor/datatables/js/jquery.dataTables.min.js"></script>'; ?>
    <?php echo '<script src="'.PROJECT_ROOT.'vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>'; ?>
    <?php echo '<script src="'.PROJECT_ROOT.'vendor/datatables-responsive/dataTables.responsive.js"></script>'; ?>

    <!-- date range picker -->
    <?php echo '<script src="'.PROJECT_ROOT.'assets/js/moment.min.js"></script>'; ?>
    <?php echo '<script src="'.PROJECT_ROOT.'assets/js/daterangepicker.min.js"></script>'; ?>

    <script>
        $(document).ready(function(){
            $(".event-imgs").owlCarousel();
        });
        function logout(){
            $.ajax({
                url: host + "/panel_proc/logout.php",
                method:"POST",
                data:{},
                success:(e)=>{
                    location.href = host;
                }
            });
        }
    </script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>

    </body>
</html>
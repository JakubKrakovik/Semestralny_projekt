<footer class="tm-black-bg">
    <div class="container">
        <div class="row">
            <p class="tm-copyright-text">Copyright &copy; 2084 Your Company Name</p>
        </div>
    </div>
</footer>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="js/templatemo-script.js"></script>
<script>
    $(function() {

        // https://css-tricks.com/snippets/jquery/smooth-scrolling/
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    $(window).load(function(){
        // Flexsliders
        $('.flexslider.flexslider-banner').flexslider({
            controlNav: false
        });
        $('.flexslider').flexslider({
            animation: "slide",
            directionNav: false,
            slideshow: false
        });
    });
</script>
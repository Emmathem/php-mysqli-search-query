</div>
   <footer>
    <div class = "container">
        &copy; <?= date('Y'); ?> E-Learning, Computer Science Department;
    </div>
</footer>
<script src="<?= LINK_PREFIX; ?>assets/javascript/wow.min.js"></script>
<script>
    var wow = new WOW({
        boxClass: 'wow', // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 0, // distance to the element when triggering the animation (default is 0)
        mobile: true, // trigger animations on mobile devices (default is true)
        live: true, // act on asynchronously loaded content (default is true)
        callback: function(box) {
            // the callback is fired every time an animation is started
            // the argument that is passed in is the DOM node being animated
        },
        scrollContainer: null // optional scroll container selector, otherwise use window
    });
    wow.init();

</script>
<script>

<script src="<?= LINK_PREFIX; ?>assets/javascript/jquery.min.js"></script>
<script src="<?= ADMIN_PREFIX; ?>assets/javascript/datatables.min.js"></script>
<script src = "<?= LINK_PREFIX; ?>assets/javascript/sidebar_menu.js"></script>
<script src="<?= LINK_PREFIX; ?>assets/javascript/bootstrap.min.js"></script>
<script src="<?= LINK_PREFIX; ?>assets/javascript/owl.carousel.min.js"></script>
<script src="<?= LINK_PREFIX; ?>assets/javascript/main.js"></script>
<script src="<?= LINK_PREFIX; ?>assets/javascript/emma.js"></script>
</body>

</html>

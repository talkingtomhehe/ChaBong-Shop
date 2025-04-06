<?php
// filepath: c:\xampp\htdocs\chabongshop\views\layouts\footer.php
// Common footer for all pages
?>
    </main>
    
    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="bi bi-arrow-up"></i>
    </button>
    
    <footer>
        <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All Rights Reserved.</p>
    </footer>

    <script>
        // Back to top button
        var mybutton = document.getElementById("myBtn");
        
        window.onscroll = function() {scrollFunction()};
        
        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    
    <script src="<?php echo SITE_URL; ?>public/js/script.js"></script>
</body>
</html>
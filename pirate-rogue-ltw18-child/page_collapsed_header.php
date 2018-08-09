<?php
/**
 * Template Name: Collapsed Header
 */

function scrollJavaScript()
{ ?>
    <script>
        (function () {
            var height = document.getElementById('masthead').offsetHeight;
            height = isNaN(height) ? 0 : Math.max(0, height - 33);
            window.scrollTo(0, height);
        }());
    </script>
<?php }

add_action('wp_footer', 'scrollJavaScript');

include 'page.php';

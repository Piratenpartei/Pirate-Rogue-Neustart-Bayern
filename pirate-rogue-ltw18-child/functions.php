<?php
include_once "Map_Widget.php";
include_once "Topic_Widget.php";

/** @noinspection PhpUndefinedFunctionInspection */
function pirate_rogue_ltw18_enqueue_styles()
{
    $parent_style = 'pirate-rogue-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'pirate_rogue_ltw18_enqueue_styles');

function pirate_rogue_ltw18_widgets()
{
    register_widget('Map_Widget');
    register_widget('Topic_Widget');
}

add_action('widgets_init', 'pirate_rogue_ltw18_widgets');

$blogname = get_bloginfo('name');
set_theme_mod('pirate_rogue_credit',
    sprintf(
        'Copyright &copy; %1$s Piratenpartei Bayern<br /> '
        . 'Made with &#x2665; and <a href="https://wordpress.org/" rel="nofollow">WordPress</a>. '
        . 'Theme: <a href="https://gitlab.com/CptS/ltw2018-wordpress-theme" rel="nofollow">Pirate Rogue LTW18</a> by CptS based on <a href="https://github.com/Piratenpartei/Pirate-Rogue/" rel="nofollow">Pirate Rogue</a> by xwolf.',
        date("Y"),
        $blogname
    )
);


function socialMetaHead()
{ ?>
    <meta property="og:url" content="https://neustart.bayern/"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="NEUSTART.BAYERN"/>
    <meta property="og:description" content="Piratenpartei Bayern"/>
    <meta property="og:image"
          content="https://design2018.neustart-bayern.de/static/social-media/Facebook-Titelbild-Neustart.png"/>
    <meta property="og:image:width" content="820"/>
    <meta property="og:image:height" content="312"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@PiratenBayern"/>
    <meta name="twitter:title" content="NEUSTART.BAYERN"/>
    <meta name="twitter:description" content="Piratenpartei Bayern"/>
    <meta name="twitter:image"
          content="https://design2018.neustart-bayern.de/static/social-media/Facebook-Titelbild-Neustart.png"/>
<?php }

add_action('wp_head', 'socialMetaHead');

function sticky_sidebar_enqueue_scripts()
{
    ?>
    <script src="<? echo get_stylesheet_directory_uri() ?>/js/css-element-queries-1.0.1/ResizeSensor.js"></script>
    <script src="<? echo get_stylesheet_directory_uri() ?>/js/sticky-sidebar-3.2.0/sticky-sidebar.js"></script>
    <script>
        window.onload = function () {
            var sidebarEl = document.getElementById('sidebar-page');
            if (sidebarEl) {
                window.stickySidebar = new StickySidebar(sidebarEl, {
                    containerSelector: '#blog-wrap',
                    resizeSensor: true,
                    topSpacing: 120
                });
            }
        };
    </script>
    <?php
}

add_action('wp_enqueue_scripts', 'sticky_sidebar_enqueue_scripts');

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

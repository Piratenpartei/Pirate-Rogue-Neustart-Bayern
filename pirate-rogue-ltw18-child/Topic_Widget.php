<?php

class Topic_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'pirate_rouge_ltw18_topic_widget',
            __('Piraten LTW18 Wahlprogramm-Themen', 'pirate_rouge_ltw18_topic_widget'),
            array('description' => __('Übersicht der Wahlprogramm-Themen', 'pirate_rouge_ltw18_topic_widget'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        $id = 'pirate_rouge_ltw18_topic_wrapper_' . uniqid();
        echo '<div id="' . $id . '-wrapper" style="position: relative;">';
        echo '<img src="' . get_bloginfo('stylesheet_directory') . '/img/topics/topics.png"/>';
        echo '<a href="" id="' . $id . '" style="position: absolute; top: 0; bottom: 0; left: 0;">&nbsp;</a>';
        echo '</div>';
        echo '<p class="author-contribution">Abbildung: ';
        // TODO: list all licenses (only license names)
        echo '<a href="javascript:void(0)" id="' . $id . '-author-contribution-expand-link">Eine Lizenz, Eine andere Lizenz, &hellip;</a>';
        echo '<span id="' . $id . '-author-contribution-full" style="display: none";>';
        // TODO: list all license (details: "lizcense / source / author")
        echo '<br><a href="">Eine Lizenz</a> / <a href="">Quellwebseite</a> / <a href="">Autor</a>';
        echo '<br><a href="">Eine andere Lizenz</a> / <a href="">Quellwebseite</a> / <a href="">Autor</a>';
        echo '<br>[<a href="javascript:void(0)" id="' . $id . '-author-contribution-collapse-link">ausblenden</a>]';
        echo '</span>';
        echo '</p>';
        echo $args['after_widget'];
        ?>
        <script>
            (function (id) {
                var wrapper = document.getElementById(id + '-wrapper');
                var a = wrapper.querySelector('a');
                var img = wrapper.querySelector('img');
                a.style.width = img.width + 'px';
                img.onload = function () {
                    a.style.width = img.width + 'px';
                };
                var prevHref;
                var links = {
                    '/wahlprogramm-2018/familienpolitik': [
                        [0, 6, 35, 10],
                        [3, 8, 12, 15]
                    ],
                    '/wahlprogramm-2018/freiheit-sicherheit-rechtsstaat': [
                        [42, 0, 100, 10]
                    ]
                    // TODO: insert all topics with coordinates
                };

                function getHref(x, y) {
                    for (var link in links) {
                        if (links.hasOwnProperty(link)) {
                            for (var i = 0; i < links[link].length; i++) {
                                var coords = links[link][i];
                                if (x >= coords[0] && x <= coords[2]
                                    && y >= coords[1] && y <= coords[3]) {
                                    return link;

                                }
                            }
                        }
                    }
                    return '#';
                }

                a.addEventListener('mousemove', function (e) {
                    var rect = e.target.getBoundingClientRect();
                    var x = Math.round((e.clientX - rect.left) / img.width * 100);
                    var y = Math.round((e.clientY - rect.top) / img.height * 100);


                    a.href = getHref(x, y);

                    if (prevHref !== a.href) {
                        prevHref = a.href;
                        a.style.display = 'none';
                        window.setTimeout(function () {
                            a.style.display = 'block';
                        }, 1);
                    }
                    console.log(x, y, a.href);
                }, true);


                var authorExpand = document.getElementById(id + '-author-contribution-expand-link');
                var authorCollapse = document.getElementById(id + '-author-contribution-collapse-link');
                var authorFull = document.getElementById(id + '-author-contribution-full');
                authorExpand.onclick = function () {
                    authorExpand.style.display = 'none';
                    authorFull.style.display = 'inline';
                };
                authorCollapse.onclick = function () {
                    authorExpand.style.display = 'inline';
                    authorFull.style.display = 'none';
                };
            }('<?php echo $id; ?>'))
        </script>
        <?php
    }

    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Themen', 'pirate_rouge_ltw18_topic_widget');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}
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
        echo '<div id="' . $id . '-wrapper" style="position: relative; text-align: center;">';
        echo '<img src="' . get_bloginfo('stylesheet_directory') . '/img/topics/topics.png"/>';
        echo '<div id="' . $id . '-links" style="position: absolute; top: 0; bottom: 0; left: 0;">&nbsp;</div>';
        echo '</div>';
        echo '<p class="author-contribution">Abbildungen: ';
        echo '<a href="https://creativecommons.org/publicdomain/zero/1.0/deed.de" target="_blank">CC0</a>';
        echo ' / ';
        echo '<a href="https://pixabay.com" target="_blank">Pixabay</a> / ';
        echo '<a href="https://pixabay.com/de/frau-m%C3%A4dchen-freiheit-gl%C3%BCcklich-591576/" target="_blank">[1]</a> '
            . '<a href="https://pixabay.com/de/users/jill111-334088/" target="_blank">jill111</a> / ';
        echo '<a href="https://pixabay.com/de/fr%C3%A4nkische-schweiz-walberla-h%C3%BCgel-1445828/" target="_blank">[2]</a> '
            . '<a href="https://pixabay.com/de/users/markusspiske-670330/" target="_blank">markusspiske</a> / ';
        echo '<a href="https://pixabay.com/de/kabel-technik-rot-gelb-stecker-2755783/" target="_blank">[3]</a> '
            . '<a href="https://pixabay.com/de/users/fotofixautomat-6459159/" target="_blank">fotofixautomat</a> / ';
        echo '<a href="https://pixabay.com/de/sch%C3%BCler-eingabe-tastatur-text-849825/" target="_blank">[4]</a> '
            . '<a href="https://pixabay.com/de/users/StartupStockPhotos-690514/" target="_blank">StartupStockPhotos</a>';
        echo '</p>';
        echo $args['after_widget'];
        ?>
        <script>
            (function (id) {
                var imgWrapper = document.getElementById(id + '-wrapper');
                var linksWrapper = document.getElementById(id + '-links');
                var img = imgWrapper.querySelector('img');
                var links = {
                    '/wahlprogramm-2018/familienpolitik': [
                        [2, 6, 36, 11],
                        [5, 11, 15, 16]
                    ],
                    '/wahlprogramm-2018/freiheit-sicherheit-rechtsstaat': [
                        [42, 1, 100, 11]
                    ],
                    '/wahlprogramm-2018/heimat': [
                        [28, 16, 43, 26],
                        [43, 19, 57, 24]
                    ],
                    '/wahlprogramm-2018/digitale-wirtschaft': [
                        [59, 25, 66, 30],
                        [66, 26, 92, 33]
                    ],
                    '/wahlprogramm-2018/bezahlbarer-wohnraum': [
                        [5, 33, 33, 40],
                        [6, 40, 16, 46]
                    ],
                    '/wahlprogramm-2018/digitales-bayern': [
                        [76, 39, 97, 46],
                        [79, 46, 94, 55]
                    ],
                    '/wahlprogramm-2018/fluch': [
                        [10, 55, 20, 63],
                        [20, 58, 37, 62]
                    ],
                    '/wahlprogramm-2018/verkehrspolitik': [
                        [71, 62, 80, 68],
                        [62, 68, 98, 72]
                    ],
                    '/wahlprogramm-2018/zukunftsgerechte-bildung': [
                        [25, 75, 39, 84],
                        [39, 77, 79, 83]
                    ],
                    // TODO: "Energiewirtschaft" --> "Energie"????
                    '/wahlprogramm-2018/energie': [
                        [2, 83, 11, 88],
                        [2, 88, 43, 92]
                    ],
                    '/wahlprogramm-2018/verbraucher-und-datenschutz': [
                        [51, 90, 98, 97]
                    ]
                };

                function applyImageSize() {
                    linksWrapper.style.width = img.width + 'px';
                    linksWrapper.style.left = ((imgWrapper.offsetWidth - img.width) / 2) + 'px';

                    linksWrapper.innerHTML = '';
                    for (var link in links) {
                        if (links.hasOwnProperty(link)) {
                            for (var i = 0; i < links[link].length; i++) {
                                var coords = links[link][i];
                                linksWrapper.innerHTML += '<a href="' + link + '" ' +
                                    'style="display: block; position: absolute; ' +
                                    'left: ' + coords[0] + '%; top: ' + coords[1] + '%;' +
                                    'width: ' + (coords[2] - coords[0]) + '%; height: ' + (coords[3] - coords[1]) + '%;">&nbsp;</a>';
                            }
                        }
                    }
                }

                applyImageSize();
                img.onload = applyImageSize;
                window.addEventListener('resize', applyImageSize, true);
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
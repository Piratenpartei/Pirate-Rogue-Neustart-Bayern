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
            (function (id, links) {
                var imgWrapper = document.getElementById(id + '-wrapper');
                var linksWrapper = document.getElementById(id + '-links');
                var img = imgWrapper.querySelector('img');
                var topicCoords = {
                    'familienpolitik': [
                        [2, 6, 36, 11],
                        [5, 11, 15, 16]
                    ],
                    'freiheitsicherheitrechtsstaat': [
                        [42, 1, 100, 11]
                    ],
                    'heimat': [
                        [28, 16, 43, 26],
                        [43, 19, 57, 24]
                    ],
                    'digitalewirtschaft': [
                        [59, 25, 66, 30],
                        [66, 26, 92, 33]
                    ],
                    'bezahlbarerwohnraum': [
                        [5, 33, 33, 40],
                        [6, 40, 16, 46]
                    ],
                    'digitalesbayern': [
                        [76, 39, 97, 46],
                        [79, 46, 94, 55]
                    ],
                    'flucht': [
                        [10, 55, 20, 63],
                        [20, 58, 37, 62]
                    ],
                    'verkehrspolitik': [
                        [71, 62, 80, 68],
                        [62, 68, 98, 72]
                    ],
                    'zukunftsgerechtebildung': [
                        [25, 75, 39, 84],
                        [39, 77, 79, 83]
                    ],
                    // TODO: "Energiewirtschaft" --> "Energie"????
                    'energie': [
                        [2, 83, 11, 88],
                        [2, 88, 43, 92]
                    ],
                    'verbraucherunddatenschutz': [
                        [51, 90, 98, 97]
                    ]
                };

                function applyImageSize() {
                    linksWrapper.style.width = img.width + 'px';
                    linksWrapper.style.left = ((imgWrapper.offsetWidth - img.width) / 2) + 'px';

                    linksWrapper.innerHTML = '';
                    for (var topic in topicCoords) {
                        if (topicCoords.hasOwnProperty(topic)) {
                            for (var i = 0; i < topicCoords[topic].length; i++) {
                                var coords = topicCoords[topic][i];
                                console.log(topic,links[topic]);
                                linksWrapper.innerHTML += '<a href="' + links[topic] + '" ' +
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
            }('<?php echo $id; ?>', {
                familienpolitik: '<?php echo esc_attr($instance['link_familienpolitik']); ?>',
                freiheitsicherheitrechtsstaat: '<?php echo esc_attr($instance['link_freiheitsicherheitrechtsstaat']); ?>',
                heimat: '<?php echo esc_attr($instance['link_heimat']); ?>',
                digitalewirtschaft: '<?php echo esc_attr($instance['link_digitalewirtschaft']); ?>',
                bezahlbarerwohnraum: '<?php echo esc_attr($instance['link_bezahlbarerwohnraum']); ?>',
                digitalesbayern: '<?php echo esc_attr($instance['link_digitalesbayern']); ?>',
                flucht: '<?php echo esc_attr($instance['link_flucht']); ?>',
                verkehrspolitik: '<?php echo esc_attr($instance['link_verkehrspolitik']); ?>',
                zukunftsgerechtebildung: '<?php echo esc_attr($instance['link_zukunftsgerechtebildung']); ?>',
                energie: '<?php echo esc_attr($instance['link_energie']); ?>',
                verbraucherunddatenschutz: '<?php echo esc_attr($instance['link_verbraucherunddatenschutz']); ?>'
            }))
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
        if (isset($instance['link_familienpolitik'])) {
            $link_familienpolitik = $instance['link_familienpolitik'];
        } else {
            $link_familienpolitik = __('/wahlprogramm-2018/familienpolitik', 'pirate_rouge_ltw18_topic_widget');
        }
        if (isset($instance['link_freiheitsicherheitrechtsstaat'])) {
            $link_freiheitsicherheitrechtsstaat = $instance['link_freiheitsicherheitrechtsstaat'];
        } else {
            $link_freiheitsicherheitrechtsstaat = __('/wahlprogramm-2018/freiheit-sicherheit-rechtsstaat', 'pirate_rouge_ltw18_topic_widget');
        }
        if (isset($instance['link_heimat'])) {
            $link_heimat = $instance['link_heimat'];
        } else {
            $link_heimat = __('/wahlprogramm-2018/heimat', 'pirate_rouge_ltw18_topic_widget');
        }
        if (isset($instance['link_digitalewirtschaft'])) {
            $link_digitalewirtschaft = $instance['link_digitalewirtschaft'];
        } else {
            $link_digitalewirtschaft = __('/wahlprogramm-2018/digitale-wirtschaft', 'pirate_rouge_ltw18_topic_widget');
        }
        if (isset($instance['link_bezahlbarerwohnraum'])) {
            $link_bezahlbarerwohnraum = $instance['link_bezahlbarerwohnraum'];
        } else {
            $link_bezahlbarerwohnraum = __('/wahlprogramm-2018/bezahlbarer-wohnraum', 'pirate_rouge_ltw18_topic_widget');
        }
        if (isset($instance['link_digitalesbayern'])) {
            $link_digitalesbayern = $instance['link_digitalesbayern'];
        } else {
            $link_digitalesbayern = __('/wahlprogramm-2018/digitales-bayern', 'pirate_rouge_ltw18_topic_widget');
        }
        if (isset($instance['link_flucht'])) {
            $link_flucht = $instance['link_flucht'];
        } else {
            $link_flucht = __('/wahlprogramm-2018/flucht', 'pirate_rouge_ltw18_topic_widget');
        }
        if (isset($instance['link_verkehrspolitik'])) {
            $link_verkehrspolitik = $instance['link_verkehrspolitik'];
        } else {
            $link_verkehrspolitik = __('/wahlprogramm-2018/verkehrspolitik', 'pirate_rouge_ltw18_topic_widget');
        }
        if (isset($instance['link_zukunftsgerechtebildung'])) {
            $link_zukunftsgerechtebildung = $instance['link_zukunftsgerechtebildung'];
        } else {
            $link_zukunftsgerechtebildung = __('/wahlprogramm-2018/zukunftsgerechtebildung', 'pirate_rouge_ltw18_topic_widget');
        }
        if (isset($instance['link_energie'])) {
            $link_energie = $instance['link_energie'];
        } else {
            $link_energie = __('/wahlprogramm-2018/energie', 'pirate_rouge_ltw18_topic_widget');
        }
        if (isset($instance['link_verbraucherunddatenschutz'])) {
            $link_verbraucherunddatenschutz = $instance['link_verbraucherunddatenschutz'];
        } else {
            $link_verbraucherunddatenschutz = __('/wahlprogramm-2018/verbraucherunddatenschutz', 'pirate_rouge_ltw18_topic_widget');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('link_familienpolitik'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_familienpolitik'); ?>"
                   name="<?php echo $this->get_field_name('link_familienpolitik'); ?>" type="text"
                   value="<?php echo esc_attr($link_familienpolitik); ?>"/>
            <label for="<?php echo $this->get_field_id('link_freiheitsicherheitrechtsstaat'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_freiheitsicherheitrechtsstaat'); ?>"
                   name="<?php echo $this->get_field_name('link_freiheitsicherheitrechtsstaat'); ?>" type="text"
                   value="<?php echo esc_attr($link_freiheitsicherheitrechtsstaat); ?>"/>
            <label for="<?php echo $this->get_field_id('link_heimat'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_heimat'); ?>"
                   name="<?php echo $this->get_field_name('link_heimat'); ?>" type="text"
                   value="<?php echo esc_attr($link_heimat); ?>"/>
            <label for="<?php echo $this->get_field_id('link_digitalewirtschaft'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_digitalewirtschaft'); ?>"
                   name="<?php echo $this->get_field_name('link_digitalewirtschaft'); ?>" type="text"
                   value="<?php echo esc_attr($link_digitalewirtschaft); ?>"/>
            <label for="<?php echo $this->get_field_id('link_bezahlbarerwohnraum'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_bezahlbarerwohnraum'); ?>"
                   name="<?php echo $this->get_field_name('link_bezahlbarerwohnraum'); ?>" type="text"
                   value="<?php echo esc_attr($link_bezahlbarerwohnraum); ?>"/>
            <label for="<?php echo $this->get_field_id('link_digitalesbayern'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_digitalesbayern'); ?>"
                   name="<?php echo $this->get_field_name('link_digitalesbayern'); ?>" type="text"
                   value="<?php echo esc_attr($link_digitalesbayern); ?>"/>
            <label for="<?php echo $this->get_field_id('link_flucht'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_flucht'); ?>"
                   name="<?php echo $this->get_field_name('link_flucht'); ?>" type="text"
                   value="<?php echo esc_attr($link_flucht); ?>"/>
            <label for="<?php echo $this->get_field_id('link_verkehrspolitik'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_verkehrspolitik'); ?>"
                   name="<?php echo $this->get_field_name('link_verkehrspolitik'); ?>" type="text"
                   value="<?php echo esc_attr($link_verkehrspolitik); ?>"/>
            <label for="<?php echo $this->get_field_id('link_zukunftsgerechtebildung'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_zukunftsgerechtebildung'); ?>"
                   name="<?php echo $this->get_field_name('link_zukunftsgerechtebildung'); ?>" type="text"
                   value="<?php echo esc_attr($link_zukunftsgerechtebildung); ?>"/>
            <label for="<?php echo $this->get_field_id('link_energie'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_energie'); ?>"
                   name="<?php echo $this->get_field_name('link_energie'); ?>" type="text"
                   value="<?php echo esc_attr($link_energie); ?>"/>
            <label for="<?php echo $this->get_field_id('link_verbraucherunddatenschutz'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_verbraucherunddatenschutz'); ?>"
                   name="<?php echo $this->get_field_name('link_verbraucherunddatenschutz'); ?>" type="text"
                   value="<?php echo esc_attr($link_verbraucherunddatenschutz); ?>"/>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        $instance['link_familienpolitik'] = (!empty($new_instance['link_familienpolitik'])) ? strip_tags($new_instance['link_familienpolitik']) : '';
        $instance['link_freiheitsicherheitrechtsstaat'] = (!empty($new_instance['link_freiheitsicherheitrechtsstaat'])) ? strip_tags($new_instance['link_freiheitsicherheitrechtsstaat']) : '';
        $instance['link_heimat'] = (!empty($new_instance['link_heimat'])) ? strip_tags($new_instance['link_heimat']) : '';
        $instance['link_digitalewirtschaft'] = (!empty($new_instance['link_digitalewirtschaft'])) ? strip_tags($new_instance['link_digitalewirtschaft']) : '';
        $instance['link_bezahlbarerwohnraum'] = (!empty($new_instance['link_bezahlbarerwohnraum'])) ? strip_tags($new_instance['link_bezahlbarerwohnraum']) : '';
        $instance['link_digitalesbayern'] = (!empty($new_instance['link_digitalesbayern'])) ? strip_tags($new_instance['link_digitalesbayern']) : '';
        $instance['link_flucht'] = (!empty($new_instance['link_flucht'])) ? strip_tags($new_instance['link_flucht']) : '';
        $instance['link_verkehrspolitik'] = (!empty($new_instance['link_verkehrspolitik'])) ? strip_tags($new_instance['link_verkehrspolitik']) : '';
        $instance['link_zukunftsgerechtebildung'] = (!empty($new_instance['link_zukunftsgerechtebildung'])) ? strip_tags($new_instance['link_zukunftsgerechtebildung']) : '';
        $instance['link_energie'] = (!empty($new_instance['link_energie'])) ? strip_tags($new_instance['link_energie']) : '';
        $instance['link_verbraucherunddatenschutz'] = (!empty($new_instance['link_verbraucherunddatenschutz'])) ? strip_tags($new_instance['link_verbraucherunddatenschutz']) : '';

        return $instance;
    }
}
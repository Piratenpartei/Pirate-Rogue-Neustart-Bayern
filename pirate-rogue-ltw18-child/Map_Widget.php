<?php

class Map_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'pirate_rouge_ltw18_map_widget',
            __('Piraten LTW18 Übersichtskarte', 'pirate_rouge_ltw18_map_widget'),
            array('description' => __('Übersichtskarte der Regierungsbezirke in Bayern', 'pirate_rouge_ltw18_map_widget'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        $id = 'pirate_rouge_ltw18_map_wrapper_' . uniqid();
        echo '<div id="' . $id . '">';
        echo file_get_contents(__DIR__ . "/img/map/map.svg");
        echo '</div>';
        echo '<p class="author-contribution">';
        echo '<a href="https://gitlab.com/CptS/ltw2018-wordpress-theme/tree/master/pirate-rogue-ltw18-child/img/map" target="_blank">Abbildung</a>: ';
        echo '<a href="https://creativecommons.org/licenses/by-sa/3.0" target="_blank">CC BY-SA 3.0</a>';
        echo ' / basierend auf ';
        echo '<a href="https://commons.wikimedia.org/wiki/File:Bayern-Regierungsbezirke.svg" target="_blank">Wikimedia Commons</a> / ';
        echo '<a href="https://commons.wikimedia.org/wiki/User:Willtron" target="_blank">Willtron</a> / ';
        echo '<a href="https://commons.wikimedia.org/wiki/User:NordNordWest" target="_blank">NNW</a>';
        echo '</p>';
        echo $args['after_widget'];
        ?>
        <script>
            (function (id, urls) {
                var wrapper = document.getElementById(id);

                function createClickHandler(url) {
                    return function () {
                        location.href = url;
                    }
                }

                for (var r in urls) {
                    if (urls.hasOwnProperty(r)) {
                        wrapper.querySelector('.' + r).onclick = createClickHandler(urls[r]);
                    }
                }
            }('<?php echo $id; ?>', {
                oberbayern: '<?php echo esc_attr($instance['link_oberbayern']); ?>',
                niederbayern: '<?php echo esc_attr($instance['link_niederbayern']); ?>',
                oberpfalz: '<?php echo esc_attr($instance['link_oberpfalz']); ?>',
                oberfranken: '<?php echo esc_attr($instance['link_oberfranken']); ?>',
                mittelfranken: '<?php echo esc_attr($instance['link_mittelfranken']); ?>',
                unterfranken: '<?php echo esc_attr($instance['link_unterfranken']); ?>',
                schwaben: '<?php echo esc_attr($instance['link_schwaben']); ?>'
            }))
        </script>
        <?php
    }

    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Übersichtskarte', 'pirate_rouge_ltw18_map_widget');
        }
        if (isset($instance['link_oberbayern'])) {
            $link_oberbayern = $instance['link_oberbayern'];
        } else {
            $link_oberbayern = __('#oberbayern', 'pirate_rouge_ltw18_map_widget');
        }
        if (isset($instance['link_niederbayern'])) {
            $link_niederbayern = $instance['link_niederbayern'];
        } else {
            $link_niederbayern = __('#niederbayern', 'pirate_rouge_ltw18_map_widget');
        }
        if (isset($instance['link_oberpfalz'])) {
            $link_oberpfalz = $instance['link_oberpfalz'];
        } else {
            $link_oberpfalz = __('#oberpfalz', 'pirate_rouge_ltw18_map_widget');
        }
        if (isset($instance['link_oberfranken'])) {
            $link_oberfranken = $instance['link_oberfranken'];
        } else {
            $link_oberfranken = __('#oberfranken', 'pirate_rouge_ltw18_map_widget');
        }
        if (isset($instance['link_mittelfranken'])) {
            $link_mittelfranken = $instance['link_mittelfranken'];
        } else {
            $link_mittelfranken = __('#mittelfranken', 'pirate_rouge_ltw18_map_widget');
        }
        if (isset($instance['link_unterfranken'])) {
            $link_unterfranken = $instance['link_unterfranken'];
        } else {
            $link_unterfranken = __('#unterfranken', 'pirate_rouge_ltw18_map_widget');
        }
        if (isset($instance['link_schwaben'])) {
            $link_schwaben = $instance['link_schwaben'];
        } else {
            $link_schwaben = __('#schwaben', 'pirate_rouge_ltw18_map_widget');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('link_oberbayern'); ?>"><?php _e('Link Oberbayern:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_oberbayern'); ?>"
                   name="<?php echo $this->get_field_name('link_oberbayern'); ?>" type="text"
                   value="<?php echo esc_attr($link_oberbayern); ?>"/>
            <label for="<?php echo $this->get_field_id('link_niederbayern'); ?>"><?php _e('Link Niederbayer:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_niederbayern'); ?>"
                   name="<?php echo $this->get_field_name('link_niederbayern'); ?>" type="text"
                   value="<?php echo esc_attr($link_niederbayern); ?>"/>
            <label for="<?php echo $this->get_field_id('link_oberpfalz'); ?>"><?php _e('Link Oberpfalz:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_oberpfalz'); ?>"
                   name="<?php echo $this->get_field_name('link_oberpfalz'); ?>" type="text"
                   value="<?php echo esc_attr($link_oberpfalz); ?>"/>
            <label for="<?php echo $this->get_field_id('link_oberfranken'); ?>"><?php _e('Link Oberfranken:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_oberfranken'); ?>"
                   name="<?php echo $this->get_field_name('link_oberfranken'); ?>" type="text"
                   value="<?php echo esc_attr($link_oberfranken); ?>"/>
            <label for="<?php echo $this->get_field_id('link_mittelfranken'); ?>"><?php _e('Link Mittelfranken:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_mittelfranken'); ?>"
                   name="<?php echo $this->get_field_name('link_mittelfranken'); ?>" type="text"
                   value="<?php echo esc_attr($link_mittelfranken); ?>"/>
            <label for="<?php echo $this->get_field_id('link_unterfranken'); ?>"><?php _e('Link Unterfranken:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_unterfranken'); ?>"
                   name="<?php echo $this->get_field_name('link_unterfranken'); ?>" type="text"
                   value="<?php echo esc_attr($link_unterfranken); ?>"/>
            <label for="<?php echo $this->get_field_id('link_schwaben'); ?>"><?php _e('Link Schwaben:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_schwaben'); ?>"
                   name="<?php echo $this->get_field_name('link_schwaben'); ?>" type="text"
                   value="<?php echo esc_attr($link_schwaben); ?>"/>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['link_oberbayern'] = (!empty($new_instance['link_oberbayern'])) ? strip_tags($new_instance['link_oberbayern']) : '';
        $instance['link_niederbayern'] = (!empty($new_instance['link_niederbayern'])) ? strip_tags($new_instance['link_niederbayern']) : '';
        $instance['link_oberpfalz'] = (!empty($new_instance['link_oberpfalz'])) ? strip_tags($new_instance['link_oberpfalz']) : '';
        $instance['link_oberfranken'] = (!empty($new_instance['link_oberfranken'])) ? strip_tags($new_instance['link_oberfranken']) : '';
        $instance['link_mittelfranken'] = (!empty($new_instance['link_mittelfranken'])) ? strip_tags($new_instance['link_mittelfranken']) : '';
        $instance['link_unterfranken'] = (!empty($new_instance['link_unterfranken'])) ? strip_tags($new_instance['link_unterfranken']) : '';
        $instance['link_schwaben'] = (!empty($new_instance['link_schwaben'])) ? strip_tags($new_instance['link_schwaben']) : '';
        return $instance;
    }
}
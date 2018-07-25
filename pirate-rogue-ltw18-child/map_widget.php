<?php

// Creating the widget
class Map_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'pirate_rouge_ltw18_map_widget',
            __('Piraten LTW18 Übersichtskarte', 'pirate_rouge_ltw18_map_widget'),
            array('description' => __('Bavarian overview map', 'pirate_rouge_ltw18_map_widget'),)
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
        echo $args['after_widget'];
        ?>
        <script>
            (function (id) {
                const wrapper = document.getElementById(id);
                [
                    'oberbayern', 'niederbayern', 'oberpfalz', 'oberfranken',
                    'mittelfranken', 'unterfranken', 'schwaben'
                ].forEach(function (b) {
                    wrapper.querySelector('.' + b).onclick = function () {
                        location.hash = b;
                    }
                });
            }('<?php echo $id; ?>'))
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
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
        echo '<a href="https://gitlab.com/CptS/ltw2018-wordpress-theme/tree/master/pirate-rogue-ltw18-child/img/map" target="_blank">Abbildung</a>';
        echo ' basierend auf ';
        echo '<a href="https://commons.wikimedia.org/wiki/File:Bayern-Regierungsbezirke.svg" target="_blank">Wikimedia Commons</a> / ';
        echo '<a href="https://commons.wikimedia.org/wiki/User:Willtron" target="_blank">Willtron</a> / ';
        echo '<a href="https://commons.wikimedia.org/wiki/User:NordNordWest" target="_blank">NNW</a> / ';
        echo '<a href="https://creativecommons.org/licenses/by-sa/3.0" target="_blank">CC BY-SA 3.0</a>';
        echo '</p>';
        echo $args['after_widget'];
        ?>
        <script>
            (function (id) {
                var wrapper = document.getElementById(id);
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
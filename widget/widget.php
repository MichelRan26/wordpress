<?php
class My_Widget extends WP_Widget {
    public $args = array (
        'before_title' => '<h4 class= "widgettitle">',
        'after_title'  => '</h4>',
        'before_widget' => '<div class = "widget-wrap">',
        'after_widget' => '</div></div>',
    );
    public function __construct() {
        // actual widget porcesses
        parent::__construct(
            'my-text', // Base ID
            'My Text'  // Name
        );
        add_action('widgets_init', function (){
            register_widget('My_Widget');
        });
    }
    public function widget ($args,$instance) {
        // outputs the content of the widget
        echo $args['before_widget'];
        if(!empty($instance['title'])){
            echo $args['before_title'].apply_filters('widget_title',$instance['title']).$args['after_title'];
        }    
        echo '<div class = "textwidget">';
        echo esc_html__($instance['text'],'text_domain');
        echo '</div>';
        echo $args['after_widget'];
    }

    public function form($instance) {
        // outputs the option form in the admin
        $title = !empty($instance['title'])?$instance['title'] : esc_html__('','text_domain');
        $text  = !empty($instance['text'])?$instance['text'] : esc_html__('','text_domain');
    ?>
        <p>
            <label for ="<?php echo esc_attr($this->get_field_id('title'));?>"><?= esc_html__('Title:','text_domain');?></label>
            <input class = "widefat" id ="<?= esc_attr($this->get_field_id('title'))?>" name ="<?= esc_attr($this->get_field_name('title'))?>" type ="text" value= "<?= esc_attr($title)?>">
        </p>
        <p>
            <label for ="<?php echo esc_attr($this->get_field_id('text'));?>"><?= esc_html__('Text:','text_domain');?></label>
            <textarea class = "widefat" id ="<?= esc_attr($this->get_field_id('text'))?>" name ="<?= esc_attr($this->get_field_name('text'))?>" type ="text" cols ="30" rows ="10"><?= esc_attr($text)?></textarea>
        </p>
    <?php
    }

    public function update($new_instance,$old_instance) {
        // processes widget options to be saved
        $instance = array();
        $isntance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']): '';
        $instance['text'] = (!empty($new_instance['text'])) ? strip_tags($new_instance['text']) : '';

        return $instance;
    }

}
$my_widget = new My_Widget();
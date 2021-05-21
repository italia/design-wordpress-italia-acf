<?php

/**
 * Class mdi_footer_menu
 * widget per il menu del footer
 */
class mdi_footer_menu extends WP_Widget {
    public function __construct() {
        $widget_ops = array(
            'classname' => 'mdi_footer_menu',
            'description' => 'Footer Menu',
        );
        parent::__construct( 'mdi_footer_menu', 'Footer Menu', $widget_ops );
    }

    public function widget( $args, $instance ) {
        extract($args);

        if(!$instance["menu"]) return false;

        echo $before_widget;

        // Widget title
        if(isset($instance["title"]) && $instance["title"]){
            echo $before_title;
            echo $instance["title"];
            echo $after_title;
        } else {
            echo "<h4>&nbsp;</h4>";
        }
        ?>
        <div class="link-list-wrapper">
            <ul class="pt-2 bt-alpha-2 link-list clearfix">
                <?php
                $count = 1;
                $items = wp_get_nav_menu_items( $instance["menu"] );
                foreach($items as $item) {
                    echo '<li class="py-2"><a href="'.$item->url.'" class="list-item" title="'.esc_attr($item->title).'">'.$item->title.'</a></li>';
                    $count++;
                }
                ?>
            </ul>
        </div>
        <?php

        echo $after_widget;
    }

    public function form( $instance ) {
        $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Titolo:</label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'menu' ); ?>">Seleziona Menu:</label>
            <select id="<?php echo $this->get_field_id( 'menu' ); ?>" name="<?php echo $this->get_field_name( 'menu' ); ?>" style="width:100%;">
                <option value="0">Nessuno</option>
                <?php
                foreach($menus as $menu) {
                    $selected = $menu->term_id == $instance['menu'] ? ' selected="selected"' : '';
                    echo '<option value="'.$menu->term_id.'"'.$selected.'>'.$menu->name.'</option>';
                }
                ?>
            </select>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = $new_instance['title'];
        $instance['menu'] = $new_instance['menu'];
        $instance['number'] = $new_instance['number'];
        return $instance;
    }
}

// register Foo_Widget widget
function register_mdi_footer_menu() {
    register_widget( 'mdi_footer_menu' );
}
add_action( 'widgets_init', 'register_mdi_footer_menu' );
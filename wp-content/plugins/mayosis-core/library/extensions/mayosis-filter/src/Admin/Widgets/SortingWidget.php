<?php

namespace FilterEverything\Filter;

if ( ! defined('WPINC') ) {
    wp_die();
}

class SortingWidget extends \WP_Widget
{
    public function __construct() {
        parent::__construct(
            'mayosis_sorting_widget', // Base ID
            esc_html__( 'Mayosis Filter &mdash; Sorting', 'mayosis-filter'),
            array( 'description' => esc_html__( 'Displays a dropdown with sort options', 'mayosis-filter' ), )
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        $title  = isset( $instance['title'] ) ? $instance['title'] : '';

        // Display nothing if preview mode
        if( isset( $_GET['legacy-widget-preview'] ) || isset( $_GET['_locale'] ) ){
            return;
        }

        if( isset( $_POST['action'] ) && $_POST['action'] === 'elementor_ajax' ){
            echo '<strong>'.esc_html__( 'Mayosis Filter &mdash; Sorting', 'mayosis-filter' ).'</strong>';
            return;
        }

        if( isset( $_GET['action'] ) && $_GET['action'] === 'elementor' ){
            echo '<strong>'.esc_html__( 'Mayosis Filter &mdash; Sorting', 'mayosis-filter' ).'</strong>';
            return;
        }

        $container       = Container::instance();
        $templateManager = $container->getTemplateManager();
        $url_manager     = new UrlManager();
        $sorting         = new Sorting();
        // @todo values (keys) shouldn't be meta, meta_num or can?
        $orderby = isset( $_GET['ordr'] ) ? mayosis_clean( wp_unslash( $_GET['ordr'] ) ) : 'default';

        echo $args['before_widget'];
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        // Include front template
        $templateManager->includeFrontView(
            'orderby',
            array(
                'action'    => $url_manager->getFormActionUrl(),
                'selected_orderby'   => $orderby,
                'titles'    => $instance['titles'],
                'orderbies' => $instance['orderbies'],
                'orders'    => $instance['orders'],
                'meta_keys' => $instance['meta_keys']
            )
        );

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title     = isset( $instance['title'] ) ? $instance['title'] : '';

        $sorting   = new Sorting();
        $defaults  = $sorting->getSortingDefaults();

        $titles    = ( ! empty( $instance['titles'] ) ) ? $instance['titles'] : $defaults['titles'];
        $orderbies = ( ! empty( $instance['orderbies'] ) ) ? $instance['orderbies'] : $defaults['orderbies'];
        $meta_keys = ( ! empty( $instance['meta_keys'] ) ) ? $instance['meta_keys'] : $defaults['meta_keys'];
        $orders    = ( ! empty( $instance['orders'] ) ) ? $instance['orders'] : $defaults['orders'];
        $i         = 1;

        // We can add new sorting options later
        // But it would be good to know all them to decide how to build logic

        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p><strong><label><?php esc_html_e( 'Sorting options:', 'mayosis-filter' ); ?></label></strong></p>
        <div class="mayosis-sorting-list">
        <?php
        foreach ( $orderbies as $k => $orderby ){

            $orderbiesConfig = array(
                'class'   => 'widefat mayosis-orderby-select',
                'name'    => esc_attr($this->get_field_name('orderbies') . '[]'),
                'id'      => esc_attr($this->get_field_id('orderbies') . '-' . $i),
                // Todo add new options via filter
                // First should be popular sorting criteria
                // Then common like tax or meta key
                'options' => $sorting->getSortingOptions(),
                'value'   => $orderby
            );

            $ordersConfig = array(
                'class'   => 'widefat',
                'name'    => esc_attr( $this->get_field_name('orders') . '[]'),
                'id'      => esc_attr( $this->get_field_id( 'orders' ) . '-' . $i ),
                'options' => array( 'asc' => esc_html_x('ASC', 'sorting', 'mayosis-filter'), 'desc' => esc_html_x('DESC', 'sorting', 'mayosis-filter') ),
                'value'   => $orders[$k]
            );

            $orderbiesSelect = new Select($orderbiesConfig);
            $ordersSelect    = new Select($ordersConfig);

            $templateArgs = array(
                'widget'          => $this,
                'i'               => $i,
                'title'           => $titles[$k],
                'metaKey'         => $meta_keys[$k],
                'orderbiesSelect' => $orderbiesSelect,
                'ordersSelect'    => $ordersSelect
            );

            mysis_include_admin_view('sorting-item', $templateArgs );
            $i++;
        } ?>
            </div>
            <div class="mayosis-add-sorting-item-wrapper">
                <div class="mayosis-add-sorting-item-div">
                    <a href="#" class="button button-primary button-medium mayosis-add-sorting-item"><?php esc_html_e( '+ Add sorting option', 'mayosis-filter' ); ?></a>
                </div>
            </div>
            <?php /* if( isset( $this->number ) && $this->number ) : ?>
            <p>
                <label for="mayosis-sorting-widget-shortcode-<?php echo $this->number; ?>"><?php esc_html_e( 'Widget shortcode:', 'mayosis-filter' ); ?></label>
                <div id="mayosis-sorting-widget-shortcode-<?php echo $this->number; ?>" class="mayosis-sorting-widget-shortcode"><input type="text" value="<?php echo '[fe_sort id=&#x22;'.$this->number.'&#x22;]'; ?>" readonly="readonly"/></div>
            </p>
            <?php endif; */ ?>
            <input type="text" class="mayosis-ballast" id="<?php echo $this->get_field_id( 'ballast' ); ?>" name="<?php echo $this->get_field_name('ballast'); ?>" value="" style="display:none;"/>
            <script type="text/html" class="mayosis-new-sorting-item">
                <?php

                $i = 'mayosis_new_id';

                $orderbiesConfig = array(
                    'class'   => 'widefat mayosis-orderby-select',
                    'name'    => esc_attr( $this->get_field_name('orderbies') . '[]'),
                    'id'      => esc_attr( $this->get_field_id( 'orderbies' ) . '-' . $i ),
                    'options' => $sorting->getSortingOptions()
                );

                $ordersConfig = array(
                    'class'   => 'widefat',
                    'name'    => esc_attr( $this->get_field_name('orders') . '[]'),
                    'id'      => esc_attr( $this->get_field_id( 'orders' ) . '-' . $i ),
                    'options' => array( 'asc' => esc_html_x('ASC', 'sorting', 'mayosis-filter'), 'desc' => esc_html_x('DESC', 'sorting', 'mayosis-filter') )
                );

                $orderbiesSelect = new Select($orderbiesConfig);
                $ordersSelect    = new Select($ordersConfig);

                $templateArgs = array(
                    'widget'          => $this,
                    'i'               => $i,
                    'title'           => '',
                    'metaKey'         => '',
                    'orderbiesSelect' => $orderbiesSelect,
                    'ordersSelect'    => $ordersSelect
                );

                mysis_include_admin_view('sorting-item', $templateArgs );

                ?>
            </script>

        <?php

    }

    public function update( $new_instance, $old_instance ) {
        $instance = [];
        $instance['title']      = ( !empty( $new_instance['title'] ) ) ? $new_instance['title'] : '';

        $instance['titles']     = (!empty(  $new_instance['titles'] )) ? $new_instance['titles'] : [];
        $instance['orderbies']  = (!empty(  $new_instance['orderbies'] )) ? $new_instance['orderbies'] : [];
        $instance['orders']     = (!empty(  $new_instance['orders'] )) ? $new_instance['orders'] : [];
        $instance['meta_keys']  = (!empty(  $new_instance['meta_keys'] )) ? $new_instance['meta_keys'] : [];

        $instance['ballast']    = ( !empty( $new_instance['ballast'] ) ) ? $new_instance['ballast'] : '';

        return $instance;
    }
}
<?php
/**
 * The Template for displaying filter dropdown.
 *
 * This template can be overridden by copying it to yourtheme/filters/dropdown.php.
 *
 * $set - array, with the Filter Set parameters
 * $filter - array, with the Filter parameters
 * $url_manager - object, of the UrlManager PHP class
 * $terms - array, with objects of all filter terms except excluded
 * $noSelectUrl - string, URL for default option without selected term
 *
 * @see https://teconce.com/resources/templates-overriding/
 */

if ( ! defined('WPINC') ) {
    wp_die();
}

$noSelectUrl = ( empty( $filter['values'] ) ) ? $url_manager->getResetUrl() : $url_manager->getTermUrl( reset( $filter['values'] ), $filter['e_name'] );

?>
<div class="<?php echo mysis_filter_class( $filter ); // Already escaped ?>" data-fid="<?php echo esc_attr( $filter['ID'] ); ?>">
    <?php mysis_filter_header( $filter, $terms ); // Safe, escaped ?>
    <div class="<?php echo esc_attr( mysis_filter_content_class( $filter ) ); ?>">
        <?php if( ! empty( $terms ) || $view_args['ask_to_select_parent'] ): ?>
            <select id="mayosis-<?php echo esc_attr( $filter['entity'] ); ?>-<?php echo esc_attr( $filter['e_name'] ); ?>-<?php echo esc_attr( $filter['ID'] ); ?>"
                    aria-label="mayosis-<?php echo esc_attr( $filter['entity'] ); ?>-<?php echo esc_attr( $filter['e_name'] ); ?>-<?php echo esc_attr( $filter['ID'] ); ?>"
                    class="mayosis-filters-widget-select">
                <?php if( $view_args['ask_to_select_parent'] !== false ) : ?>
                    <option class="mayosis-dropdown-default" value="0" data-mayosis-link="<?php echo esc_attr( $noSelectUrl ); ?>" id="mayosis-option-<?php echo esc_attr( $filter['entity'] ); ?>-<?php echo esc_attr( $filter['e_name'] ); ?>-0"><?php
                    echo esc_html( $view_args['ask_to_select_parent'] );
                    ?></option>
                <?php else: ?>
                    <option class="mayosis-dropdown-default" value="0" data-mayosis-link="<?php echo esc_attr( $noSelectUrl ); ?>" id="mayosis-option-<?php echo esc_attr( $filter['entity'] ); ?>-<?php echo esc_attr( $filter['e_name'] ); ?>-0"><?php
                        echo esc_html( mysis_dropdown_default_option( $filter ) );
                    ?></option>
                    <?php

                    foreach ( $terms as $id => $term_object ){
                        $disabled = 0;
                        $selected = ( in_array( $term_object->slug, $filter['values'] ) ) ? 1 : 0;

                        if( isset( $term_object->wp_queried ) && $term_object->wp_queried ){
                            $disabled   = 1;
                        }

                        ?>
                        <option class="mayosis-term-count-<?php echo esc_attr( $term_object->cross_count ); ?> mayosis-term-id-<?php echo esc_attr($term_object->term_id); ?>" value="<?php echo esc_attr( $term_object->term_id ); ?>" <?php selected( 1, $selected ); ?> <?php disabled( 1, $disabled ); ?> data-mayosis-link="<?php echo esc_attr( $url_manager->getTermUrl( $term_object->slug, $filter['e_name'] ) ); ?>" id="mayosis-option-<?php echo esc_attr( $filter['entity'] ); ?>-<?php echo esc_attr($filter['e_name']); ?>-<?php echo esc_attr( $id ); ?>"><?php
                            echo esc_html( $term_object->name );

                            if( $set['show_count']['value'] === 'yes' ) {
                                echo esc_html( ' ('.$term_object->cross_count.')' );
                            }
                        ?></option>
                    <?php } ?><!-- end foreach -->
                <?php endif; ?>
            </select>
        <?php else:
            if( ! mysis_is_filter_request() ){
                ?><p><?php esc_html_e('There are no terms yet', 'mayosis-filter' );

                if( mysis_is_debug_mode() ){
                    echo '&nbsp;'.mysis_help_tip(
                            esc_html__('Possible reasons: 1) Filter\'s criteria doesn\'t contain any terms yet and you have to add them 2) Terms may be created, but no one post that should be filtered attached to these terms 3) You excluded all possible terms in Filter\'s options.', 'mayosis-filter')
                        );
                }
            }else{
                esc_html_e('N/A', 'mayosis-filter' );
            }
            ?></p>
        <?php endif; ?><!-- end if -->
    </div>
</div>
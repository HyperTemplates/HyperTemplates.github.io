<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: map
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'MYSF_Field_map' ) ) {
  class MYSF_Field_map extends MYSF_Fields {

    public $version = '1.7.1';
    public $cdn_url = 'https://cdn.jsdelivr.net/npm/leaflet@';

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $args              = wp_parse_args( $this->field, array(
        'placeholder'    => esc_html__( 'Search...', 'mysf' ),
        'latitude_text'  => esc_html__( 'Latitude', 'mysf' ),
        'longitude_text' => esc_html__( 'Longitude', 'mysf' ),
        'address_field'  => '',
        'height'         => '',
      ) );

      $value             = wp_parse_args( $this->value, array(
        'address'        => '',
        'latitude'       => '20',
        'longitude'      => '0',
        'zoom'           => '2',
      ) );

      $default_settings   = array(
        'center'          => array( $value['latitude'], $value['longitude'] ),
        'zoom'            => $value['zoom'],
        'scrollWheelZoom' => false,
      );

      $settings = ( ! empty( $this->field['settings'] ) ) ? $this->field['settings'] : array();
      $settings = wp_parse_args( $settings, $default_settings );

      $style_attr  = ( ! empty( $args['height'] ) ) ? ' style="min-height:'. esc_attr( $args['height'] ) .';"' : '';
      $placeholder = ( ! empty( $args['placeholder'] ) ) ? array( 'placeholder' => $args['placeholder'] ) : '';

      echo $this->field_before();

      if ( empty( $args['address_field'] ) ) {
        echo '<div class="mysf--map-search">';
        echo '<input type="text" name="'. esc_attr( $this->field_name( '[address]' ) ) .'" value="'. esc_attr( $value['address'] ) .'"'. $this->field_attributes( $placeholder ) .' />';
        echo '</div>';
      } else {
        echo '<div class="mysf--address-field" data-address-field="'. esc_attr( $args['address_field'] ) .'"></div>';
      }

      echo '<div class="mysf--map-osm-wrap"><div class="mysf--map-osm" data-map="'. esc_attr( json_encode( $settings ) ) .'"'. $style_attr .'></div></div>';

      echo '<div class="mysf--map-inputs">';

        echo '<div class="mysf--map-input">';
        echo '<label>'. esc_attr( $args['latitude_text'] ) .'</label>';
        echo '<input type="text" name="'. esc_attr( $this->field_name( '[latitude]' ) ) .'" value="'. esc_attr( $value['latitude'] ) .'" class="mysf--latitude" />';
        echo '</div>';

        echo '<div class="mysf--map-input">';
        echo '<label>'. esc_attr( $args['longitude_text'] ) .'</label>';
        echo '<input type="text" name="'. esc_attr( $this->field_name( '[longitude]' ) ) .'" value="'. esc_attr( $value['longitude'] ) .'" class="mysf--longitude" />';
        echo '</div>';

      echo '</div>';

      echo '<input type="hidden" name="'. esc_attr( $this->field_name( '[zoom]' ) ) .'" value="'. esc_attr( $value['zoom'] ) .'" class="mysf--zoom" />';

      echo $this->field_after();

    }

    public function enqueue() {

      if ( ! wp_script_is( 'mysf-leaflet' ) ) {
        wp_enqueue_script( 'mysf-leaflet', esc_url( $this->cdn_url . $this->version .'/dist/leaflet.js' ), array( 'mysf' ), $this->version, true );
      }

      if ( ! wp_style_is( 'mysf-leaflet' ) ) {
        wp_enqueue_style( 'mysf-leaflet', esc_url( $this->cdn_url . $this->version .'/dist/leaflet.css' ), array(), $this->version );
      }

      if ( ! wp_script_is( 'jquery-ui-autocomplete' ) ) {
        wp_enqueue_script( 'jquery-ui-autocomplete' );
      }

    }

  }
}

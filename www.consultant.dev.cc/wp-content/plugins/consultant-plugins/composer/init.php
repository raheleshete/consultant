<?php

/**
 * Main Visual composer manager.
 * @var Vc_Manager - instance of composer management.
 */

global $vc_manager;
$vc_manager->setIsAsTheme();
$vc_manager->disableUpdater();

//include shortcode
foreach( glob( EF_ROOT . '/composer/shortcodes/*.php' ) as $shortcode ) {
  require_once(EF_ROOT .'/composer/shortcodes/'. basename( $shortcode ) );
}

foreach ( glob( EF_ROOT . '/composer/shortcodes/*', GLOB_ONLYDIR) as $shortcode ) {
  require_once( EF_ROOT . '/composer/shortcodes/' . basename($shortcode) . "/" . basename($shortcode) . ".php" );
}

// return assets folder plugins
function consultant_asset_url( $file ) {
  return plugins_url( 'shortcodes/' . $file, __FILE__ );
}

// Multiple Select
// ----------------------------------------------------------------------------------
vc_add_shortcode_param('vc_efa_chosen', 'vc_efa_chosen');
function vc_efa_chosen($settings, $value) {

  $css_option = vc_get_dropdown_option( $settings, $value );
  $value = explode( ',', $value );
  
  $output  = '<select name="'. $settings['param_name'] .'" data-placeholder="'. $settings['placeholder'] .'" multiple="multiple" class="wpb_vc_param_value wpb_chosen chosen wpb-input wpb-efa-select '. $settings['param_name'] .' '. $settings['type'] .' '. $css_option .'" data-option="'. $css_option .'">';

  foreach ( $settings['value'] as $values => $option ) {
    $selected = ( in_array( $option, $value ) ) ? ' selected="selected"' : '';
    $output .= '<option value="'. $option .'"'. $selected .'>'.$values .'</option>';
  }

  $output .= '</select>' . "\n";
   
  return $output;  
}



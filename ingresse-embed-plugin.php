<?php
/*
Plugin Name: Ingresse Embed Plugin
Version: 0.1-beta
Description: A simple tool to have Ingresse content in your blog.
Author: Hugo Campos
Author URI: ingresse.com
Plugin URI: https://github.com/hugofcampos/wp-ingresse-embed-plugin
Text Domain: ingresse-embed-plugin
Domain Path: /languages
*/

add_shortcode( 'ingresse-embed-button', 'ingresse_embed_button' );
function ingresse_embed_button( $atts ) {
    extract( shortcode_atts( array(
        'id' => '10',
    ), $atts ) );

    $html = "
    <link href='https://fonts.googleapis.com/css?family=Lato:300,900' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='https://dk57nqppwurwj.cloudfront.net/ingresse-widget.css'>
    <script src='https://dk57nqppwurwj.cloudfront.net/ingresse-widget.js'></script>
    <div class='ingresse-widget' data-eventid='$id'></div>
    ";
    return $html;
}

add_action( 'init', 'wptuts_buttons' );
function wptuts_buttons() {
    add_filter( "mce_external_plugins", "wptuts_add_buttons" );
    add_filter( 'mce_buttons', 'wptuts_register_buttons' );
}
function wptuts_add_buttons( $plugin_array ) {
    $plugin_array['ingresseEmbed'] = plugin_dir_url(__FILE__) . 'includes/js/tinymce/plugins/embed-button/plugin.js';
    return $plugin_array;
}
function wptuts_register_buttons( $buttons ) {
    array_push( $buttons, 'addevent' );
    return $buttons;
}
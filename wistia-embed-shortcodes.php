<?php
/*
Plugin Name: Wistia Embed Shortcodes
Plugin URI: https://github.com/jshimko/wistia-embed-shortcodes
Description: Use a simple shortcode to embed your Wistia videos and track emails of logged in users that watch them.
Version: 0.1.0
Author: Jeremy Shimko
Author URI: https://github.com/jshimko
*/

function wistia_embed_shortcode( $atts ) {

    // Define shortcode attributes
    extract( shortcode_atts(
        array(
            'id' => '',
            'color' => '7b796a', // Default color on all new Wistia players
            'width' => '640',
            'height' => '360',
            'autoplay' => 'false'
        ), $atts )
    );

    // Get user email for Wistia stats
    $current_user = wp_get_current_user();
    $email = $current_user->user_email;

    // Create embed code
    $video_embed = '
        <div id="wistia_'.$id.'" class="wistia_embed"
            style="width:'.$width.'px; height:'.$height.'px;">&nbsp;</div>
        <script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/E-v1.js"></script>
        <script>
            wistiaEmbed = Wistia.embed("' . $id . '", {
                autoPlay: '.$autoplay.',
                playerColor: "'.$color.'",
                videoWidth: '.$width.',
                videoHeight: '.$height.','.
                if (is_user_logged_in()) {'trackEmail: "'.$email.'"'}'
            });
        </script>';

    return $video_embed;

}
add_shortcode( 'wistia_embed', 'wistia_embed_shortcode' );
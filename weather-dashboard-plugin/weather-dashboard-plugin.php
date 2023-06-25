<?php

/*
Plugin Name: My Weather Plugin
Description: Displays a few weather blocks on the front end.
Version: 1.0
Author: Taras Shostak
Author URI: https://www.example.com
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

function weather_dashboard_enqueue_scripts() {
    wp_enqueue_style('weather-dashboard-style', plugin_dir_url(__FILE__) . 'css/style.css');
    wp_enqueue_script('weather-dashboard-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'weather_dashboard_enqueue_scripts');


function weather_dashboard_shortcode($atts) {
    ob_start();

    // Display the dashboard HTML
    include plugin_dir_path(__FILE__) . 'templates/dashboard.php';

    return ob_get_clean();
}
add_shortcode('weather_dashboard', 'weather_dashboard_shortcode');

?>
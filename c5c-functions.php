<?php
/**
 * Plugin Name: C5C Projects
 * Description: A custom plugin to create and manage a System Which Required Login Before Visit The Main Goal.
 * Version: 1.0
 * Author: Little Programmers by-Foysal Ahmed
 */

if (!defined('ABSPATH')) exit; // Prevent direct access

// Include required files
include_once 'includes/c5c-db-queries.php';
include_once 'includes/c5c-file-upload.php';

// Enqueue styles and scripts for the landing page and other templates

function c5c_enqueue_assets() {
    $template_slug = get_page_template_slug();
    
    wp_enqueue_script('jquery'); // Make sure jQuery is loaded

    // Enqueue styles and scripts conditionally based on the template being used
    if ($template_slug === 'templates/c5c-landing-page-template.php') {
        wp_enqueue_style('c5c-landing-style', plugin_dir_url(__FILE__) . 'css/c5c-style.css');
        wp_enqueue_style('c5c-landing-page-style', plugin_dir_url(__FILE__) . 'css/c5c-landing-page-style.css');
        wp_enqueue_script('c5c-landing-js', plugin_dir_url(__FILE__) . 'js/c5c-script.js', array('jquery'), null, true);
    } elseif ($template_slug === 'templates/c5c-contact-page-template.php') {
        error_log('Current Template: ' . $template_slug);
         wp_enqueue_style('c5c-landing-style', plugin_dir_url(__FILE__) . 'css/c5c-style.css');
        wp_enqueue_style('c5c-contact', plugin_dir_url(__FILE__) . 'css/c5c-contact.css');
        wp_enqueue_script('c5c-contact-js', plugin_dir_url(__FILE__) . 'js/c5c-contact-script.js', array('jquery'), null, true);
    } elseif ($template_slug === 'templates/c5c-dashboard-template.php') {
         wp_enqueue_style('c5c-landing-style', plugin_dir_url(__FILE__) . 'css/c5c-style.css');
        wp_enqueue_style('c5c-dashboard-style', plugin_dir_url(__FILE__) . 'css/c5c-dashboard-style.css');
        wp_enqueue_script('c5c-dashboard-js', plugin_dir_url(__FILE__) . 'js/c5c-dashboard-script.js', array('jquery'), null, true);
    }
}
add_action('wp_enqueue_scripts', 'c5c_enqueue_assets');

// Register multiple custom page templates
function c5c_register_custom_templates($templates) {
    $templates['templates/c5c-landing-page-template.php'] = 'C5C Landing Page';
    $templates['templates/c5c-contact-page-template.php'] = 'C5C Contact Page';
    $templates['templates/c5c-client-profile-template.php'] = 'C5C Client Profile';
    $templates['templates/c5c-dashboard-template.php'] = 'C5C Dashboard';
    return $templates;
}
add_filter('theme_page_templates', 'c5c_register_custom_templates');

// Load the correct template file based on the template selected
function c5c_load_custom_template($template) {
    $template_slug = get_page_template_slug();

    if ($template_slug === 'templates/c5c-landing-page-template.php') {
        $plugin_template = plugin_dir_path(__FILE__) . 'templates/c5c-landing-page-template.php';
    } elseif ($template_slug === 'templates/c5c-contact-page-template.php') {
        $plugin_template = plugin_dir_path(__FILE__) . 'templates/c5c-contact-page-template.php';
    } elseif ($template_slug === 'templates/c5c-client-profile-template.php') {
        $plugin_template = plugin_dir_path(__FILE__) . 'templates/c5c-client-profile-template.php';
    } elseif ($template_slug === 'templates/c5c-dashboard-template.php') {
        $plugin_template = plugin_dir_path(__FILE__) . 'templates/c5c-dashboard-template.php';
    }

    if (isset($plugin_template) && file_exists($plugin_template)) {
        return $plugin_template;
    }

    return $template;
}
add_filter('template_include', 'c5c_load_custom_template');




function c5c_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'logged-in' => __('Logged In Menu'),
        'logged-out' => __('Logged Out Menu'),
    ));
}
add_action('after_setup_theme', 'c5c_register_menus');

function c5c_custom_menu_classes($classes, $item, $args) {
    // Check for the specific menu location
    if ($args->theme_location === 'logged-in' || $args->theme_location === 'logged-out') {
        // Remove all existing classes
        $classes = [];
        // Add your custom class
        $classes[] = 'c5c-custom-menu-item';
    }
    return $classes;
}

add_filter('nav_menu_css_class', 'c5c_custom_menu_classes', 10, 3);

// For anchor tags (links), if needed
function c5c_custom_menu_link_attributes($atts, $item, $args) {
    if ($args->theme_location === 'logged-in' || $args->theme_location === 'logged-out') {
        // Customize attributes like class, target, etc.
        $atts['class'] = 'c5c-custom-link';
    }
    return $atts;
}

add_filter('nav_menu_link_attributes', 'c5c_custom_menu_link_attributes', 10, 3);

//Custome Logo SetUp

function c5c_theme_setup() {
    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'c5c_theme_setup');


function c5c_enqueue_scripts() {
    wp_enqueue_script('c5c-ajax-filter', plugin_dir_url(__FILE__) . 'js/c5c-ajax-filter.js', array('jquery'), null, true);

    // Localize the script to provide the AJAX URL
    wp_localize_script('c5c-ajax-filter', 'c5c_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'c5c_enqueue_scripts');


// Enqueue scripts and styles
function c5c_enqueue_file_upload_scripts() {
    wp_enqueue_script('jquery'); // Make sure jQuery is loaded
    wp_enqueue_script('c5c-upload', plugin_dir_url(__FILE__) . 'js/c5c-upload.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'c5c_enqueue_file_upload_scripts');

// // Add custom rewrite rule for files
// function c5c_custom_rewrite_rule() {
//     add_rewrite_rule('^([^/]+)/?$', 'index.php?file=$matches[1]', 'top');
// }
// add_action('init', 'c5c_custom_rewrite_rule');

// // Ensure WordPress recognizes the new query variable 'file'
// function c5c_add_query_vars($vars) {
//     $vars[] = 'file';
//     return $vars;
// }
// add_filter('query_vars', 'c5c_add_query_vars');

// Function to load single-file.php from the plugin's templates folder






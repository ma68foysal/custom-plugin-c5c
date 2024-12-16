<?php
// Hook for logged-in user
add_action('wp_ajax_c5c_filter_files', 'c5c_filter_files');
// Hook for logged-out users
add_action('wp_ajax_nopriv_c5c_filter_files', 'c5c_filter_files');

function c5c_filter_files()
{
    // Check if the category_id is set in the POST request
    if (isset($_POST['category_id'])) {
        // Sanitize and retrieve the category ID
        $category_id = intval($_POST['category_id']);

        // Get the files based on the category
        $files = c5c_get_files_by_filter($category_id); // Ensure this function exists and accepts a category ID

        // Check if files were retrieved
        if (!empty($files)) {
            // Send a JSON response with the success status and files
            wp_send_json_success($files);
        } else {
            // If no files found, send an error response
            wp_send_json_error('No files found for the selected category.');
        }
    } else {
        // If category_id is not set, send an error response
        wp_send_json_error('No category ID provided');
    }
    wp_die(); // Terminate properly
}

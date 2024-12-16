<?php
include_once 'c5c-db-queries.php'; // Ensure this is included

include_once 'c5c-db-queries.php';

function c5c_handle_file_upload() {
    if (!empty($_FILES['file']) && isset($_POST['file_title'])) {
        // Log form submission
        error_log("File upload process started.");

        $title = sanitize_text_field($_POST['file_title']);
        $description = sanitize_textarea_field($_POST['file_description']);
        $category_id = intval($_POST['category_id']);
        $subcategory_id = intval($_POST['subcategory_id']);

        // Log sanitized data
        error_log("Sanitized title: $title, category: $category_id, subcategory: $subcategory_id");

        // Handle file upload
        $file = $_FILES['file'];
        $upload = wp_handle_upload($file, ['test_form' => false]);

        if (isset($upload['file'])) {
            $file_url = $upload['url'];
            $mime_type = mime_content_type($upload['file']);

            // Log file upload result
            error_log("File successfully uploaded. URL: $file_url, MIME type: $mime_type");

            // Store file in DB and log the result
            $file_id = c5c_store_file_in_db($title, $description, $file_url, $mime_type, $category_id, $subcategory_id);
            if ($file_id) {
                wp_redirect(add_query_arg('upload_status', 'success', wp_get_referer()));
            exit;
            } else {
                error_log("Database insertion failed.");
                echo "Failed to save file information in the database.";
            }
        } else {
            error_log("File upload failed.");
            echo "File upload failed.";
        }
    } else {
        error_log("File or required fields are missing.");
        echo "Please upload a file and fill out the required fields.";
    }
}
add_action('admin_post_c5c_file_upload', 'c5c_handle_file_upload');



add_action('admin_post_c5c_handle_file_upload', 'c5c_handle_file_upload');
add_action('admin_post_nopriv_c5c_handle_file_upload', 'c5c_handle_file_upload'); // For non-logged-in users if needed

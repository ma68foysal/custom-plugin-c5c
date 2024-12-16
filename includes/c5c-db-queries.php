<?php
global $wpdb;

// Function to create table
function c5c_create_file_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'wp_c5c_files_table'; // Change to your actual table name
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        file_name varchar(255) NOT NULL,
        file_url varchar(255) NOT NULL,
        thumbnail_url varchar(255) NOT NULL,
        description text,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Function to store file in the database
function c5c_store_file_in_db($title, $description, $file_url, $mime_type, $category_id, $subcategory_id) {
    global $wpdb;

    // Prepare the insert query
    $table_name = $wpdb->prefix . 'c5c_files_table';
    $data = [
        'title' => $title,
        'description' => $description,
        'file_url' => $file_url,
        'mime_type' => $mime_type,
        'category_id' => $category_id,
        'subcategory_id' => $subcategory_id
    ];

    // Insert the file information into the database
    $insert = $wpdb->insert($table_name, $data);

    // Log the query and result
    if ($insert) {
        error_log("Database insert successful. ID: " . $wpdb->insert_id);
        return $wpdb->insert_id;
    } else {
        error_log("Database insert failed. Error: " . $wpdb->last_error);
        return false;
    }
}




// Fetch files from the database, optionally filtered by category and sub-category
function c5c_get_files($category = '', $subcategory = '') {
    global $wpdb;

    // Start query to fetch all files
    $query = "SELECT * FROM wp_c5c_files_table"; //  table name

    // Prepare conditions based on category and sub-category
    $conditions = array();
    $params = array();

    if (!empty($category)) {
        $conditions[] = "category_id = %d";
        $params[] = $category;
    }

    if (!empty($subcategory)) {
        $conditions[] = "subcategory_id = %d";
        $params[] = $subcategory;
    }

    // Add WHERE clause if there are conditions
    if (!empty($conditions)) {
        $query .= " WHERE " . implode(' AND ', $conditions);
    }

    // Prepare the query with parameters if any
    if (!empty($params)) {
        return $wpdb->get_results($wpdb->prepare($query, ...$params));
    }

    // If no filters, return all files
    return $wpdb->get_results($query);
}


// Fetch categories from the database
function c5c_get_categories() {
    global $wpdb;

    return $wpdb->get_results("SELECT * FROM wp_c5c_categories_table"); //  categories table name
}



// Fetch sub-categories from the database
function c5c_get_subcategories($category_id = '') {
    global $wpdb;

    if (!empty($category_id)) {
        return $wpdb->get_results($wpdb->prepare(
            "SELECT * FROM wp_c5c_subcategories_table WHERE category_id = %d", //  sub-categories table name
            $category_id
        ));
    } else {
        return $wpdb->get_results("SELECT * FROM wp_c5c_subcategories_table"); // Fetch all if no category is provided
    }
}

function c5c_get_files_by_filter($category_id = null) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'wp_c5c_files_table'; //  table name

    $query = "SELECT * FROM $table_name";
    
    if ($category_id) {
        $query .= $wpdb->prepare(" WHERE category_id = %d", $category_id);
    }

    return $wpdb->get_results($query);
}


// Function to fetch a single file by its ID
function c5c_get_file_by_id($file_id) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'wp_c5c_files_table'; // Change to your actual table name
    return $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $file_id));
}


// Fetch file details from the database by title
// function c5c_get_file_by_title($file_title) {
//     global $wpdb;
//     $table_name = $wpdb->prefix . 'c5c_files_table';  // Assuming your table is wp_c5c_files_table
//     return $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE title = %s", $file_title));
// }




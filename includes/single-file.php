<?php get_header(); ?>

<?php
// Get the file title from the URL
$file_title = get_query_var('file');

if (!$file_title) {
    error_log("No file title provided.");
    echo "<p>File not found.</p>";
} else {
    // Fetch file data from the database
    $file_data = c5c_get_file_by_title($file_title);

    if ($file_data) {
        // Display file details
        ?>
        <h1><?php echo esc_html($file_data->title); ?></h1>
        <p><?php echo esc_html($file_data->description); ?></p>
        <img src="<?php echo esc_url($file_data->file_url); ?>" alt="<?php echo esc_attr($file_data->title); ?>">
        <p><a href="<?php echo esc_url($file_data->file_url); ?>" download>Download File</a></p>
        <?php
    } else {
        echo "<p>File not found.</p>";
    }
}

?>
<?php get_footer(); ?>

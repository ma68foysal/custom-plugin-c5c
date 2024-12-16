<?php
// Ensure WordPress is loaded
if (!defined('ABSPATH')) exit;

// Check user role
$current_user = wp_get_current_user();
$user_role = $current_user->roles[0];

get_header();
?>

<?php
// Template Name: c5c Dashboard

// Ensure user is logged in
if (!is_user_logged_in()) {
    wp_redirect(home_url('/login'));
    exit;
}

// Get current user info
$current_user = wp_get_current_user();
$user_role = $current_user->roles[0]; // Get the user role (Admin, Client, etc.)

?>

<div class="c5c-dashboard-wrapper">
    <!-- Sidebar -->
    <aside class="c5c-dashboard-sidebar">
        <div class="c5c-logo">
            <img src="https://restaurant.littleprogrammers.org/wp-content/uploads/2024/10/cropped-Logo_c5c.png" alt="Logo">
        </div>
        <nav class="c5c-nav">
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Assets</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Shared</a></li>
            </ul>
        </nav>
        <a href="<?php echo wp_logout_url(home_url()); ?>" class="c5c-logout">Logout</a>
    </aside>

    <!-- Main Dashboard Content -->
    <main class="c5c-dashboard-main">
        <header class="c5c-dashboard-header">
            <h2>Welcome back, <?php echo esc_html($current_user->display_name); ?>!</h2>
        </header>

        <!-- Category Filter (Optional) -->
        <div class="c5c-category-filter">
            <label for="category_filter">Filter by Category:</label>
<select id="category_filter">
    <option value="">Select Category</option>
    <?php
    // Fetch categories from the database
    $categories = c5c_get_categories(); // Assuming you have a function to fetch categories
    foreach ($categories as $category) {
        echo '<option value="' . esc_attr($category->id) . '">' . esc_html($category->category_name) . '</option>';
    }
    ?>
</select>
<button id="filter_button">Filter</button>

        </div>
        <!--Include the file upload form-->
                <?php
        // Include the file upload form
        require('file-upload-form.php') ;
        
        ?>

        <!-- File Listing Grid -->
        <div class="c5c-file-grid">
               <?php
// Ensure this file is included correctly
include_once(dirname(__FILE__) . '/../includes/file-grid-template.php');
// Ensure this file is included correctly

?>

        </div>

        <!-- Add File Button (Only for Admins) -->
        <?php if ($user_role == 'administrator') : ?>
            <div class="c5c-add-file">
                <a href="#" class="c5c-add-file-btn">+ Add New File</a>
            </div>
        <?php endif; ?>
    </main>
</div>




<?php
get_footer();
?>

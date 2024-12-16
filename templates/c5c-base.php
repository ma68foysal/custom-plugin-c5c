<?php
// Ensure WordPress is loaded
if (!defined('ABSPATH')) exit;

get_template_part('../template-parts/header-custom.php');  // Reusable header
?>

<main id="main-content hlw-world">
    <?php
    // Dynamically load page-specific content (e.g., landing, contact, etc.)
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            the_content();
        }
    }
    ?>
</main>

<?php
get_template_part('../template-parts/footer-custom.php');  // Reusable footer
?>

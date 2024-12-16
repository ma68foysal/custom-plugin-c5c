<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Header and Navigation -->
<header class="c5c-header">
            <nav class="c5c-container">
                <div class="c5c-nav-container">
                    <!--<div> <a href="<?php echo esc_url(home_url()); ?>" class="c5c-logo">LOGO</a></div>-->
                    <div class="c5c-logo-container">
    <?php 
    if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
        // Display the custom logo if it exists
        the_custom_logo(); 
    } else {
        // Fallback if no logo is set, display site name or default text
        echo '<a href="' . esc_url(home_url()) . '" class="c5c-logo-text">' . get_bloginfo('name') . '</a>';
    }
    ?>
</div>

                    <div class="c5c-nav-menu">
                        <?php 
                        // Display menu items for logged-in users
                if ( is_user_logged_in() ) {
                    wp_nav_menu(array(
                        'theme_location' => 'logged-in',
                        'menu_class' => 'c5c-nav-link',
                        'container' => false,
                        'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    ));
                } else {
                    // Display menu items for logged-out users
                    wp_nav_menu(array(
                        'theme_location' => 'logged-out',
                        'menu_class' => 'c5c-nav-link',
                        'container' => false,
                        'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    ));
                }
                        // <a class="c5c-nav-link" href="">Home</a>
                        // <a class="c5c-nav-link active" href="">About us</a>
                        // <a class="c5c-nav-link" href="">Service</a>
                        // <a class="c5c-nav-link" href="">Project</a>
                        // <a class="c5c-nav-link" href="/contact">Contact</a>
                        ?>
                    </div>
                    <button class="c5c-header-contact-button" type="button">
                        Contact us
                    </button>
                </div>
            </nav>
        </header>

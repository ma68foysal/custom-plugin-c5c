<?php
// Ensure WordPress is loaded
if (!defined('ABSPATH')) exit;

// Load the header
// get_header(); 

  include(plugin_dir_path(__FILE__) .'../template-parts/header-custom.php');

?>

<!-- C5C Custom Landing Page Content -->
<main class="c5c-main">
      <!--Contact hero section  -->
      <section class="c5c-container contact-hero-container">
        <img
          src="<?php echo plugin_dir_url(__FILE__) . '../assets/images/contact-hero.png' ?>"
          alt="contact-hero"
          class="contact-hero-image"
        />
      </section>
      <!-- Contact Link Section -->
      <section class="c5c-container">
        <div class="c5c-contact-links-container">
          <div class="c5c-contact-links-service">
            <h2>Let's <span>Build</span> Something Great Together</h2>
            <div>
              <h2><span>– Reach Out to Us Today</span></h2>
              <button class="c5c-contact-links-service-button">
                Our Services
              </button>
            </div>
          </div>
          <div class="c5c-contact-links-company">
            <div class="c5c-contact-links-social">
              <a href="">
                <img
                  src="<?php echo plugin_dir_url(__FILE__) . '../assets/icons/facebook-02.svg' ?>"
                  alt=""
                />
              </a>
              <a href="">
                <img
                  src="<?php echo plugin_dir_url(__FILE__) . '../assets/icons/instagram.svg' ?> "
                  alt=""
                />
              </a>
              <a href="">
                <img
                  src="<?php echo plugin_dir_url(__FILE__) . '../assets/icons/new-twitter.svg' ?>"
                  alt=""
                />
              </a>
            </div>
            <div class="c5c-contact-links-email-phone">
              <p>Email :</p>
              <p>info@c5cproject.com</p>
            </div>
            <div class="c5c-contact-links-email-phone">
              <p>Phone :</p>
              <p>+8801571484593</p>
            </div>
          </div>
        </div>
      </section>
      <!-- Location map Section -->
      <section class="c5c-contact-map-container">
        <div class="c5c-container">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3439.8988904299254!2d91.90848327515336!3d24.89927367790396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375053a770c30fe9%3A0xf2ce4ba19cad0100!2sSiddique%20Plaza!5e1!3m2!1sen!2sbd!4v1728036945388!5m2!1sen!2sbd"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            class="c5c-contact-map"
          ></iframe>
        </div>
      </section>
    </main>

<?php
// Load the footer
// get_footer();
include(plugin_dir_path(__FILE__) .'../template-parts/footer-custom.php');

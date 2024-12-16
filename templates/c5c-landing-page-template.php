<?php
// Ensure WordPress is loaded
if (!defined('ABSPATH')) exit;

// Load the header
//  get_header('custom');
 include(plugin_dir_path(__FILE__) .'../template-parts/header-custom.php');
 

$image_url = esc_url(plugin_dir_url(__FILE__) . 'assets/images/');


?>

<!-- C5C Custom Landing Page Content -->
<main class="c5c-main">
            <!-- Hero start -->
            <section class="c5c-container">
                <div class="c5c-home-hero">
                    <div class="group">
                        <div class="group-one">
                            <div class="top">
                                <p>
                                    Best construction <br />
                                    company in <span>Sydney</span>
                                </p>
                                <h1><span>Shaping</span> your vision</h1>
                            </div>
                            <div class="bottom">
                                <h1>With <span>precision</span></h1>
                                <p>
                                    Delivering construction solutions grounded
                                    in commitment, communication, collaboration,
                                    and...
                                </p>
                            </div>
                        </div>
                        <div class="group-two">
                            <button class="primary-btn">Free Quote</button>
                            <button class="secondary-btn">Our Services</button>
                        </div>
                    </div>
                    <div class="media">
                        <div class="bg-img">
                            <img
                                src="<?php echo plugin_dir_url(__FILE__) . '../assets/images/home-hero.svg'; ?>"
                                alt="Hero"
                            />
                        </div>
                        <div class="rt-usr">
                            <div class="ratings">
                                <span>Rating</span>
                                <div class="rating">
                                    <img
                                        src="<?php echo plugin_dir_url(__FILE__) . '../assets/images/star.svg'; ?>"
                                        alt="Star"
                                        width="16"
                                        height="16"
                                    />
                                    <span>4.8</span>
                                </div>
                            </div>
                            <div class="users">
                                
                            <img src="<?php echo plugin_dir_url(__FILE__) . '../assets/images/user1.jpeg'; ?>" alt="User" />
                            <img src="<?php echo plugin_dir_url(__FILE__) . '../assets/images/user2.jpeg'; ?>" alt="User" />
                            <img src="<?php echo plugin_dir_url(__FILE__) . '../assets/images/user3.jpeg'; ?>" alt="User" />
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Hero end -->
            <!-- About us start -->
            <section class="c5c-home-about">
                <div class="c5c-container">
                    <div class="c5c-aboutus">
                        <div class="left">
                            <div class="tag">About C5C</div>
                            <h2>What We Stand For</h2>
                            <p>
                                At C5C, we bring together
                                <span
                                    >Construction, Commitment, Communication,
                                    Collaboration, and Customer Success</span
                                >
                                to deliver high-quality projects. With a focus
                                on delivering end-to-end solutions, we ensure
                                each phase of construction is handled with
                                precision and professionalism.
                            </p>
                            <div class="signature-group">
                                <div class="founder">
                                    <img
                                        src="https://media.licdn.com/dms/image/v2/D5603AQG72pNgBqgojQ/profile-displayphoto-shrink_800_800/profile-displayphoto-shrink_800_800/0/1724598595246?e=1733356800&v=beta&t=RkCx3dWQpasVDgvxzFX7RY5Z05DQ_4vhYh8EZhwy7fo"
                                        alt="User"
                                        width="56"
                                        height="56"
                                    />
                                    <div class="info">
                                        <h4>Ukhang Marma</h4>
                                        <span>Engineer</span>
                                    </div>
                                </div>
                                <img
                                    src="<?php echo plugin_dir_url(__FILE__) . '../assets/images/signature.svg' ?>"
                                    alt="Signature"
                                    class=""
                                />
                            </div>
                        </div>
                        <div class="middle">
                            <img
                                src="https://s3-alpha-sig.figma.com/img/1d64/ce42/7e13b376db9700d0fe27efc315490987?Expires=1728864000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Qj6eMnryGzpTTiL5N1-29JiljLBjmzpLgtO2sSyxRf0RgXe-KAwteS047V7r8HylrUxwbCAUU~bf3c4KymRGhRJLN0VuHzP8Qp1T~G3mrbSAhctyH1O6ixcmPbwLH2gpJkMbX4TqgwnqFaCMI2PXz6igG47PsGhfXmrx1beN5vS2uL20LEw05U0ocaaZxJQkXc8-0eB~88o5YzqkXV5mFIVRfvglLQ6oOsUZzCTsXomaL~UiF~GuB4pG4hBBNO9WBHNEVvyK3XfJ8GAIuqf2B4V~Q~tgZi1IqTHCD3RrOJQrsxyII3AEoMn8Byyx35NQTcvybgZtimJn-AO4CRldcA__"
                                alt="About us"
                            />
                        </div>
                        <div class="right">
                            <div class="logo-circle">
                                <img
                                    src="https://www.adaptivewfs.com/wp-content/uploads/2020/07/logo-placeholder-image.png"
                                    alt="Logo"
                                />
                            </div>
                            <div class="top-content">
                                <h4>Our Mission</h4>
                                <p>
                                    To deliver top-quality construction services
                                    through trust, communication, and
                                    collaboration, always exceeding client
                                    expectations.
                                </p>
                            </div>
                            <div class="bottom-content">
                                <h4>Our Vision</h4>
                                <p>
                                    To be Sydney's leading construction partner
                                    by providing innovative, reliable, and
                                    customer-focused solutions.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About us end -->
            <!-- Services start -->
            <section class="c5c-home-services">
                <div class="c5c-container">
                    <div class="c5c-services-container">
                        <div class="heading-content">
                            <h2><span>Our</span> Services</h2>
                            <p>
                                We offer a comprehensive range of construction
                                services designed to meet your needs
                            </p>
                        </div>
                        <div class="c5c-services-slider">
                            <div class="service-card">
                                <div class="service-img">
                                    <img
                                        src="https://s3-alpha-sig.figma.com/img/88ac/2438/39d8d4722f5d730e35a50cc09311872e?Expires=1728864000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=bHykIo0kQH-aXFrzO5UsbqUPZK2rYDTlJD-SyKip-PEPDlY2VfWH7DOiV2u~V~yTqjp38fZTyVKavuH~OjR3tHTFiBgHj7PR5AX2OGACb~IHsnP0hkKuGcLuMDTlzHY3GrdCv2ym4hGA6A8kb9zfQld~vB5tShgy77WDHzuHVbgB-0OtHpMbtaxJIwtcZjb~kKE~T~~kVoEQbpSQEkD9~p2STtyY1t2GSR8wtuBDGSceEK~0JKZxkSiZfoEymyAGqlc6OVwvNr~IGewqbTQj0U-MKGXgLYqvYJe26WaZOZu1g-9zj-0OWH4QkTNt5jolLs-5jPcR9zXDLTGNEcL~0Q__"
                                        alt="Service"
                                    />
                                    <div class="info">Custom Builds</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Services end -->
        </main>

<?php
// Load the footer
//  get_footer('custom');
 include(plugin_dir_path(__FILE__) .'../template-parts/footer-custom.php');

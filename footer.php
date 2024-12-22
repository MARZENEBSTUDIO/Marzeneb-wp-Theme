<?php
/**
 * The footer for Marzeneb Theme by Bekalu
 *
 * Displays all of the footer content including widgets and footer info.
 *
 * @package Marzeneb_Theme
 */

?>
<div class="container">
<footer class="bg-dark text-light pt-5 pb-3">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-4">
                <h5>About Us</h5>
                <p>
                    Welcome to <?php echo get_bloginfo( 'name' ); ?></a> We provide the best services to cater to your needs. Connect with us for more.
                </p>
            </div>

            <!-- Links Section -->
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <nav class="footer-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'menu_class'     => 'footer-menu list-inline',
                'container'      => false,
            ));
            ?>
        </nav>
            </div>

            <!-- Contact Section -->
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <p>
                    <i class="bi bi-telephone"></i> +123 456 7890<br>
                    <i class="bi bi-envelope"></i> info@<?php echo get_site_url(); ?><br>
                    <i class="bi bi-geo-alt"></i> 123 Main Street, Anytown, USA
                </p>
            </div>
        </div>

        <hr class="bg-light">

        <div class="row">
            <div class="col text-center">
               <style>
    .site-footer {
        background-color: <?php echo get_theme_mod('marzeneb_footer_bg_color', '#000000'); ?>;
        color: <?php echo get_theme_mod('marzeneb_footer_text_color', '#ffffff'); ?>;
    }
    .footer-navigation {
    text-align: center;
    margin: 20px 0;
}

.footer-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-menu li {
    display: block;
    margin: 0 10px;
    list-style: none;
    text-align: left;
}

.footer-menu a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s;
}

.footer-menu a:hover {
    color: #f39c12; /* Example hover color */
}

        </style>
        <div class="site-footer text-center py-3">
        <p>&copy; <?php echo date('Y'); ?><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo( 'name' ); ?></a>. All Rights Reserved.</p>
        </div>
            </div>
        </div>
    </div>
</footer>

    </div>


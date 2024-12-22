<?php
function enqueue_bootstrap_styles() {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_styles');

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
function theme_register_menus() {
    register_nav_menu('primary', __('Primary Menu', 'theme-textdomain'));
}
add_action('after_setup_theme', 'theme_register_menus');
function customize_menu_styles($wp_customize) {
        // Add Setting for List Style
    $wp_customize->add_setting('menu_list_style', array(
        'default'           => 'none',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('menu_list_style', array(
        'label'   => __('Menu List Style', 'theme-textdomain'),
        'section' => 'nav_menu_style',
        'type'    => 'select',
        'choices' => array(
            'none'    => __('None', 'theme-textdomain'),
            'circle'  => __('Circle', 'theme-textdomain'),
            'square'  => __('Square', 'theme-textdomain'),
            'decimal' => __('Decimal', 'theme-textdomain'),
        ),
    ));

    // Add Setting for List Position
    $wp_customize->add_setting('menu_position', array(
        'default'           => 'flex-start',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('menu_position', array(
        'label'   => __('Menu Alignment', 'theme-textdomain'),
        'section' => 'nav_menu_style',
        'type'    => 'select',
        'choices' => array(
            'flex-start' => __('Left', 'theme-textdomain'),
            'center'     => __('Center', 'theme-textdomain'),
            'flex-end'   => __('Right', 'theme-textdomain'),
        ),
    ));



    // Add Section
    $wp_customize->add_section('menu_customization', array(
        'title'    => __('Menu Customization', 'theme-textdomain'),
        'priority' => 30,
    ));

    // Add Settings and Controls
    // Background color
    $wp_customize->add_setting('menu_bg_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_bg_color', array(
        'label'    => __('Background Color', 'theme-textdomain'),
        'section'  => 'menu_customization',
        'settings' => 'menu_bg_color',
    )));

    // Text color
    $wp_customize->add_setting('menu_text_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_text_color', array(
        'label'    => __('Text Color', 'theme-textdomain'),
        'section'  => 'menu_customization',
        'settings' => 'menu_text_color',
    )));

    // Hover color
    $wp_customize->add_setting('menu_hover_color', array(
        'default'           => '#ff0000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_hover_color', array(
        'label'    => __('Hover Color', 'theme-textdomain'),
        'section'  => 'menu_customization',
        'settings' => 'menu_hover_color',
    )));

    // Dropdown background color
    $wp_customize->add_setting('dropdown_bg_color', array(
        'default'           => '#f8f9fa',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropdown_bg_color', array(
        'label'    => __('Dropdown Background Color', 'theme-textdomain'),
        'section'  => 'menu_customization',
        'settings' => 'dropdown_bg_color',
    )));
     $wp_customize->add_setting('header_bg_image', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_bg_image_control', array(
        'label' => 'Header Background Image',
        'section' => 'title_tagline',
        'settings' => 'header_bg_image',
    )));
}
add_action('customize_register', 'customize_menu_styles');








function menu_custom_styles() {
    ?>
    <style type="text/css">
        .main-navigation .menu-list {
            list-style-type: <?php echo esc_attr(get_theme_mod('menu_list_style', 'none')); ?>;
            justify-content: <?php echo esc_attr(get_theme_mod('menu_position', 'flex-start')); ?>;
        }
        .main-navigation {
            background-color: <?php echo esc_attr(get_theme_mod('menu_bg_color', '#ffffff')); ?>;
        }
        .main-navigation .menu-list li a {
            color: <?php echo esc_attr(get_theme_mod('menu_text_color', '#000000')); ?>;
        }
        .main-navigation .menu-list li a:hover {
            color: <?php echo esc_attr(get_theme_mod('menu_hover_color', '#0080ff')); ?>;
        }
        .main-navigation .menu-list li ul {
            background-color: <?php echo esc_attr(get_theme_mod('dropdown_bg_color', '#f8f9fa')); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'menu_custom_styles');

function enqueue_menu_scripts() {
    // Include Bootstrap if needed
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_menu_scripts');






function marzeneb_enqueue_scripts() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css');
    
    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'marzeneb_enqueue_scripts');


function enqueue_bootstrap_assets() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', [], '5.3.0', 'all');
    
    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', ['jquery'], '5.3.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_assets');



// Register primary menu
function marzeneb_register_nav_menu() {
    register_nav_menu('primary', __('Primary Menu', 'marzeneb-theme'));
}
add_action('after_setup_theme', 'marzeneb_register_nav_menu');

// Enqueue Bootstrap JS in functions.php
function enqueue_bootstrap_scripts() {
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_scripts');


function marzeneb_customize_register($wp_customize) {
// Add section for Header Customization
    $wp_customize->add_section( 'header_background_section' , array(
        'title'      => __('Header Background', 'marzeneb'),
        'priority'   => 30,
    ));

    // Add setting for background color
    $wp_customize->add_setting( 'header_background_color', array(
        'default'           => '#007bff', // Default color
        'transport'         => 'refresh', // Refreshes the page when changed
    ));

    // Add control for background color
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color_control', array(
        'label'      => __('Background Color', 'marzeneb'),
        'section'    => 'header_background_section',
        'settings'   => 'header_background_color',
    )));

    // Add setting for background image
    $wp_customize->add_setting( 'header_background_image' , array(
        'default'           => '',
        'transport'         => 'refresh',
    ));
     // Add Setting for Nav Menu Hover Background Color
    $wp_customize->add_setting('nav_menu_hover_bg_color', array(
        'default'   => '#007bff', // Default hover color
        'transport' => 'refresh', // Refresh page to apply changes
    ));

    // Add Control for Nav Menu Hover Background Color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_menu_hover_bg_color', array(
        'label'   => __('Navigation Menu Hover Background Color', 'marzeneb'),
        'section' => 'nav_menu_customization_section',
        'settings' => 'nav_menu_hover_bg_color',
    )));
    // Add control for background image
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_background_image_control', array(
        'label'      => __('Background Image', 'marzeneb'),
        'section'    => 'header_background_section',
        'settings'   => 'header_background_image',
    )));
    // HEADER SETTINGS
    $wp_customize->add_section('marzeneb_header_section', [
        'title' => __('Header Settings', 'marzeneb'),
        'priority' => 10,
    ]);    

    // Header Font Size
    $wp_customize->add_setting('marzeneb_header_font_size', [
        'default' => '16px',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('marzeneb_header_font_size_control', [
        'label' => __('Header Font Size', 'marzeneb'),
        'section' => 'marzeneb_header_section',
        'type' => 'text',
    ]);

      // Add Navigation Section
    $wp_customize->add_section('marzeneb_navigation_section', [
        'title' => __('Navigation Settings', 'marzeneb'),
        'priority' => 20,
    ]);

    // Background Color
    $wp_customize->add_setting('marzeneb_nav_bg_color', [
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'marzeneb_nav_bg_color',
            [
                'label' => __('Navigation Background Color', 'marzeneb'),
                'section' => 'marzeneb_navigation_section',
                'settings' => 'marzeneb_nav_bg_color',
            ]
        )
    );
    // Add section for carousel images
    $wp_customize->add_section('carousel_section', array(
        'title'    => __('Carousel Images', 'marzeneb-theme'),
        'priority' => 30,
    ));

    // Image 1
    $wp_customize->add_setting('carousel_image_1', array(
        'default'   => get_template_directory_uri() . '/images/default-image-1.jpg',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'carousel_image_1_control', array(
        'label'    => __('Slide 1 Image', 'marzeneb-theme'),
        'section'  => 'carousel_section',
        'settings' => 'carousel_image_1',
    )));

    // Image 2
    $wp_customize->add_setting('carousel_image_2', array(
        'default'   => get_template_directory_uri() . '/images/default-image-2.jpg',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'carousel_image_2_control', array(
        'label'    => __('Slide 2 Image', 'marzeneb-theme'),
        'section'  => 'carousel_section',
        'settings' => 'carousel_image_2',
    )));

    // Image 3
    $wp_customize->add_setting('carousel_image_3', array(
        'default'   => get_template_directory_uri() . '/images/default-image-3.jpg',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'carousel_image_3_control', array(
        'label'    => __('Slide 3 Image', 'marzeneb-theme'),
        'section'  => 'carousel_section',
        'settings' => 'carousel_image_3',
    )));

    // Link Color
    $wp_customize->add_setting('marzeneb_nav_link_color', [
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'marzeneb_nav_link_color',
            [
                'label' => __('Navigation Link Color', 'marzeneb'),
                'section' => 'marzeneb_navigation_section',
                'settings' => 'marzeneb_nav_link_color',
            ]
        )
    );

    // Font Size
    $wp_customize->add_setting('marzeneb_nav_font_size', [
        'default' => '16px',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('marzeneb_nav_font_size_control', [
        'label' => __('Navigation Font Size', 'marzeneb'),
        'section' => 'marzeneb_navigation_section',
        'type' => 'text',
    ]);
}
//pagenation 
function set_posts_per_page($query) {
    if ($query->is_main_query() && !is_admin()) {
        $query->set('posts_per_page', 6); // Display 6 posts per page
    }
}
add_action('pre_get_posts', 'set_posts_per_page');
function marzeneb_pagination() {
    global $wp_query;

    $big = 999999999; // Large number unlikely to appear in the query string

    $pages = paginate_links(array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'type'      => 'array', // Return pagination as an array
        'prev_text' => '&laquo; Prev',
        'next_text' => 'Next &raquo;',
    ));

    if (is_array($pages)) {
        echo '<nav aria-label="Page navigation">';
        echo '<ul class="pagination justify-content-center">';
        foreach ($pages as $page) {
            echo '<li class="page-item">' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }
        echo '</ul>';
        echo '</nav>';
    }
}

function marzeneb_register_sidebars() {
    register_sidebar(array(
        'name'          => __('Single Post Sidebar', 'marzeneb-theme'),
        'id'            => 'single-post-sidebar',
        'description'   => __('Sidebar displayed on single posts', 'marzeneb-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'marzeneb_register_sidebars');
function marzeneb_customize_sidebar($wp_customize) {
    $wp_customize->add_section('sidebar_settings', array(
        'title'    => __('Sidebar Settings', 'marzeneb-theme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('sidebar_background_color', array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_background_color_control', array(
        'label'    => __('Sidebar Background Color', 'marzeneb-theme'),
        'section'  => 'sidebar_settings',
        'settings' => 'sidebar_background_color',
    )));
}
add_action('customize_register', 'marzeneb_customize_sidebar');
function marzeneb_sidebar_custom_styles() {
    ?>
    <style>
        .widget-area {
            background-color: <?php echo get_theme_mod('sidebar_background_color', '#ffffff'); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'marzeneb_sidebar_custom_styles');



// Enqueue live preview JavaScript
function enqueue_customizer_live_preview() {
    wp_enqueue_script('customizer-live-preview', get_template_directory_uri() . '/js/customizer-live-preview.js', array('jquery', 'customize-preview'), null, true);
}
add_action('customize_preview_init', 'enqueue_customizer_live_preview');

// Output custom CSS based on customizer settings
function navbar_customizer_css() {
    ?>
    <style type="text/css">
        .navbar {
            background-color: <?php echo esc_attr(get_theme_mod('navbar_bg_color', '#ffffff')); ?>;
            color: <?php echo esc_attr(get_theme_mod('navbar_text_color', '#000000')); ?>;
        }
        .navbar a {
            color: <?php echo esc_attr(get_theme_mod('navbar_text_color', '#000000')); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'navbar_customizer_css');


add_action('customize_register', 'marzeneb_customize_register');
function marzeneb_register_menus() {
    register_nav_menus([
        'primary' => __('Primary Menu', 'marzeneb'), 'footer-menu' => __('Footer Menu', 'marzeneb-theme'),
    ]);
}
add_action('init', 'marzeneb_register_menus');
//improve page speed
// Compress images on upload by reducing quality
function compress_images_on_upload($image) {
    add_filter('jpeg_quality', function() {
        return 70; // Adjust quality (0-100, 70 is recommended for balance between quality and size)
    });

    return $image;
}
add_filter('wp_handle_upload_prefilter', 'compress_images_on_upload');
// Generate WebP images upon upload
function generate_webp_image($metadata) {
    $uploads_dir = wp_upload_dir(); // Get the upload directory
    $file_path = $uploads_dir['basedir'] . '/' . $metadata['file']; // Path to the uploaded image

    $info = pathinfo($file_path);
    $extension = strtolower($info['extension']);

    // Only convert JPEG and PNG to WebP
    if (in_array($extension, ['jpeg', 'jpg', 'png'])) {
        $webp_file_path = $info['dirname'] . '/' . $info['filename'] . '.webp';

        if ($extension === 'png') {
            $image = imagecreatefrompng($file_path);
        } elseif (in_array($extension, ['jpeg', 'jpg'])) {
            $image = imagecreatefromjpeg($file_path);
        }

        if ($image) {
            imagewebp($image, $webp_file_path, 80); // Adjust quality (0-100, 80 is recommended)
            imagedestroy($image);
        }
    }

    return $metadata;
}
add_filter('wp_generate_attachment_metadata', 'generate_webp_image');
// Add lazy loading to images
function add_lazy_loading($content) {
    $content = str_replace('<img', '<img loading="lazy"', $content);
    return $content;
}
add_filter('the_content', 'add_lazy_loading');


?>
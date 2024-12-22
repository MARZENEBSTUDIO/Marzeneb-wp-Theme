<?php
/**
 * The header for Marzeneb Theme by Bekalu
 *
 * Displays all of the <head> section and everything up till <main>
 *
 * @package Marzeneb_Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php wp_head(); // Required for plugins and WP functionality    bg-white text-dark py-3 border-bottom ?>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="javascript" type="text/css" href="customizer-live-preview.js">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
    <title class="bi bi-fonts"><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?>
    </title>
 <div class="container">
    <header id="site-header" class="site-header" style="background-image: url('<?php echo esc_url(get_theme_mod('header_background_image')); ?>');">
        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
      <nav class="main-navigation">
        <button class="nav-toggle" aria-label="Toggle navigation">☰</button>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_class'     => 'menu-list',
        'fallback_cb'    => '__return_false',
        'depth'          => 2, // Allows dropdown support
    ));
    ?>
</nav>

    </header>
</div>
<div class="search">
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="search-form">
        <input type="text" class="search-input" placeholder="Search here..." name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'textdomain' ); ?>">
        <button type="submit" class="srchbtn">Search</button>
    </form>
</div>


<body>
 
</body>
<style>
    .site-header {
        padding-top: 2px;
        background-color: <?php echo get_theme_mod('marzeneb_header_bg_color', 'transparent'); ?>;
        font-size: <?php echo get_theme_mod('marzeneb_header_font_size', '16px'); ?>;
        padding: 0; /* Adjust padding as needed */
    }
    .main-navigation {
        background-color: <?php echo get_theme_mod('marzeneb_nav_bg_color', 'transparent'); ?>;
    }
    .main-navigation a {
        color: <?php echo get_theme_mod('marzeneb_nav_link_color', '#ffffff'); ?>;
    }
/* Navigation Bar Styling */
.main-navigation {
    background: transparent;
    color: white;
    font-family: Arial, sans-serif;
    padding: 1em;
    opacity: 1;
} /* Flex container for the menu */
.menu-list {
    display: flex;
    justify-content: flex-start;
    gap: 2em;
    align-items: center;
}
/* Style for each menu item */
.menu-list li {
    position: relative;
}
.menu-list a {
    color: white;
    padding: 0.5em 1em;
    display: block;
    transition: background-color 0.3s ease, color 0.3s ease;
}
/* Hover effect for the links */
.menu-list a:hover {
    background-color: #555;
    color: #fff;
}

/* Dropdown Menu Styles */
.menu-list .sub-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #444;
    padding: 0;
    border-radius: 5px;
    min-width: 180px;
}
.menu-list .sub-menu li a {
    color: white;
    padding: 0.5em 1em;
}
.menu-list .sub-menu li a:hover {
    background-color: #555;
}
/* Show dropdown on hover */
.menu-list li:hover .sub-menu {
    display: block;
}
/* Hamburger Button for Small Screens */
.nav-toggle {
    display: none;
    background: none;
    border: none;
    color: white;
    font-size: 2em;
    cursor: pointer;
}
/* Mobile View */
@media (max-width: 768px) {
    /* Make the menu vertical */
    .menu-list {
        display: none;
        flex-direction: column;
        width: 100%;
        background: transparent;
        opacity: 0.5;
        padding: 1px;
    }
    .menu-list  li a{
        width: 100%;
    }
    .menu-list  li a:hover {
    opacity: 0.25;
    width: 100%;
    }
     .menu-list ul li {
    width: 100%;
    opacity: 0.25;
    }
    .search-form {
        display: none;
    }
    /* Show the menu when 'active' class is added */
    .menu-list.active {
        display: flex;
    }
    /* Hamburger button visible on mobile */
    .nav-toggle {
        display: block;
    }
    /* Style for menu items on mobile */
    .menu-list li {
        width: 100%;
        text-align: left;
        padding: 5px 0;
        border-radius: 7px;
    }
    /* Mobile Dropdown */
    .menu-list .sub-menu {
        position: static;
        min-width: 100%;
        background-color: #444;
    }
    .menu-list .sub-menu li a {
        padding: 0.5em 2em;
    }
}
/* Make the navbar a flex container */
.navbar-nav {
    display: flex;
    flex-grow: 1; /* Allows the navbar items to take up available space */
}
/* Align the search form to the right */
.navbar-collapse {
    display: flex;
    justify-content: space-between; /* Ensures the items are spread out with space between them */
}
/* Optional: Adjust search bar margin */
.d-flex {
    margin-left: auto; /* Pushes the search bar to the far right */
}
/* Apply Google Font Poppins or fallback to sans-serif */
body {
    font-family: 'Poppins', sans-serif; /* Poppins font with fallback */
    font-weight: 400; /* Regular weight */
    font-size: 16px; /* Base font size */
    line-height: 1.6; /* Improve readability */
    color: #333; /* Default text color */
    background-color: #f8f9fa; /* Light background color */
    margin: 0;
    padding: 0;
}
/* Apply the same font family to headings */
h1, h2, h3, h4, h5, h6 {
    font-family: 'Poppins', sans-serif;
    font-weight: 600; /* Bold weight for headings */
}
/* Site Header Styling */
.site-header {
    background-image: url('/1.jpg'); /* Replace with the URL of your background image */
    background-size: cover; /* Ensures the image covers the entire header */
    background-position: center center; /* Centers the background image */
    background-attachment: fixed; /* Keeps the background fixed while scrolling */
    color: white; /* Text color for contrast */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Font family for the header text */
    position: relative; /* Ensures the header content is positioned correctly */
    z-index: 1; /* Ensures content is on top of background */
}
/* Adding a color overlay for better text visibility */
.site-header::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1; /* Places the overlay behind the content */
}
/* Site Title Styling */
.site-title {
    font-size: 3rem;
    font-weight: initial;
    letter-spacing: 2px;
    text-transform: uppercase;
    transition: color 0.3s ease; /* Smooth transition for color change */
}
.site-title a{
    font-size: 4rem;
    text-decoration: none;
    transition: color 0.3s ease; /* Smooth transition for color change */
    color: white;
}
/* Header Content Styling */
.header-content {
    position: relative;
    z-index: 2; /* Ensures content is above the overlay */
}

/* Responsive Design */
@media (max-width: 768px) {
    .site-header {
        padding: 30px 0; /* Adjust padding for smaller screens */
    }

    .site-title {
        font-size: 2.5rem; /* Reduce font size for mobile */
    }
}
/* Site Header Customization */
.site-header {
    background-color: <?php echo get_theme_mod('header_background_color', '#007bff'); ?>; /* Default color */
    background-image: url('<?php echo esc_url(get_theme_mod('header_background_image')); ?>');
    background-size: cover; /* Cover the entire header */
    background-position: center center;
    background-attachment: fixed;
    color: white;
    padding: 50px 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    position: relative;
    z-index: 1;

}

/* Adding overlay for better contrast */
.site-header::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Black overlay with 50% opacity */
    z-index: -1;
}

/* Site Title Styling */
.site-title {
    font-size: 3rem;
    font-weight: bold;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin: 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

/* Responsive Design */
@media (max-width: 768px) {
    .site-header {
        padding: 30px 0;
    }

    .site-title {
        font-size: 2.5rem;
    }
}
.main-navigation .menu-list{
    opacity: 100%;
    border-radius: 7px;
    border: 1px solid white;
}
/* Navigation Menu Styling */
.main-navigation .menu-list li a {
    color: #fff; /* Text color of the menu items */
    padding: 10px 20px;
    text-decoration: none;
    display: inline-block;
    border-radius: 7px;

}
/* Hover Effect Styling */

.main-navigation .menu-list li a:hover {
    background-color: <?php echo get_theme_mod('nav_menu_hover_bg_color', '#007bff'); ?>;
    border-radius: 7px;
}
/* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
/* Search Container */
.search {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    background-color: #ffffff;
}
/* Search Form */
.search-form {
    display: flex;
    align-items: center;
    border: 2px solid #007bff;
    border-radius: 30px;
    overflow: hidden;
    background-color: #fff;
    width: 100%;
    max-width: 500px;
    transition: box-shadow 0.3s ease;
}
.search-form:hover {
    box-shadow: 0px 4px 10px rgba(0, 123, 255, 0.3);
}
/* Search Input */
.search-input {
    flex: 1;
    padding: 10px 15px;
    font-size: 16px;
    border: none;
    outline: none;
    color: #333;
    border-radius: 30px 0 0 30px;
}
.search-input::placeholder {
    color: #aaa;
    font-style: italic;
}
/* Search Button */
.srchbtn {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    border-radius: 0 30px 30px 0;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.srchbtn:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

.srchbtn:active {
    transform: scale(0.95);
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    .search-form {
        max-width: 100%;
        border-radius: 20px;
    }

    .search-input {
        padding: 10px;
        font-size: 14px;
    }

    .srchbtn {
        padding: 8px 15px;
        font-size: 14px;
    }
}
.carousel-item img {
    height: 500px; /* Adjust as needed */
    object-fit: cover; /* Ensures images are cropped to fit */
}
.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.5); /* Add a dark background */
    border-radius: 50%; /* Round the controls */
    width: 50px;
    height: 50px;
}
.bg-image {
    background-attachment: fixed; /* Makes the background image stay fixed while scrolling */
    min-height: 400px; /* Sets a minimum height for the header */
}
@media (max-width: 768px) {
    .bg-image {
        background-position: top;
        background-size: contain;
    }
}
.carousel-item img {
    height: 500px; /* Adjust as needed */
    object-fit: cover; /* Ensures images are cropped to fit */
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.5); /* Add a dark background */
    border-radius: 50%; /* Round the controls */
    width: 50px;
    height: 50px;
}
</style>
<script type="text/javascript">document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.querySelector('.nav-toggle');
    const menuList = document.querySelector('.menu-list');
    toggleButton.addEventListener('click', () => {
        menuList.classList.toggle('active');
    });
});

// Enqueue Bootstrap JS in functions.php
function enqueue_bootstrap_scripts() {
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_scripts');






let slideIndex = 0;
showSlides();

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  const slides = document.getElementsByClassName("carousel-item");
  if (n >= slides.length) { slideIndex = 0; }
  if (n < 0) { slideIndex = slides.length - 1; }

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  slides[slideIndex].style.display = "block";
}

// Auto Slide
setInterval(() => {
  slideIndex++;
  showSlides(slideIndex);
}, 5000); // Change slide every 5 seconds



</script>



      
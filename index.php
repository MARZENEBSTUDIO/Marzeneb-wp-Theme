<?php get_header(); ?>
<!-- Add Bootstrap 5 CSS (if not included already) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Add Bootstrap 5 JavaScript (if not included already) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<body>
<div class="container text-center my-5">
    <div class="container">
        <div id="customCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo get_theme_mod('carousel_image_1', 'default-image-1.jpg'); ?>" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="animated-text">Welcome to Our Site!</h3>
                        <p class="animated-text">Explore our amazing products and services.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo get_theme_mod('carousel_image_2', 'default-image-2.jpg'); ?>" class="d-block w-100" alt="Slide 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="animated-text">Discover New Features</h3>
                        <p class="animated-text">Join us on an incredible journey.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo get_theme_mod('carousel_image_3', 'default-image-3.jpg'); ?>" class="d-block w-100" alt="Slide 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="animated-text">Your Success Starts Here</h3>
                        <p class="animated-text">We are here to help you grow.</p>
                    </div>
                </div>
            </div>
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#customCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#customCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>



<?php
// Pagination configuration
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Query to fetch posts
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 6, // Number of posts per page
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <div class="container">
        <div class="row">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card">


                         <a href="<?php the_permalink(); ?>" class="thumbnail-link">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/default-thumbnail.jpg" class="card-img-top" alt="Default Thumbnail">
                    <?php endif; ?>
                    </a>
                      <div class="card-body">
                         <a href="<?php the_permalink(); ?>" class="post-title-link"><?php the_title(); ?></a>
                            <p class="card-text"><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on <?php echo get_the_date(); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php
            echo paginate_links(array(
                'total' => $query->max_num_pages,
            ));
            ?>
        </div>

    </div>
<?php
wp_reset_postdata();
else : ?>
    <div class="alert alert-warning" role="alert">
        No posts found.
    </div>
<?php endif; ?>
<style type="text/css">
   /* Pagination Container */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 10px;
    height: 50%;
}

/* Pagination Links */
.pagination a,
.pagination span {

    display: inline-block;
    padding: 10px 15px;
    margin: 0 5px;
    border-radius: 5px;
    text-decoration: none;
    color: #007bff;
    font-size: 16px;
    background-color: #f8f9fa;
    border: 1px solid #ddd;
}

/* Hover State */
.pagination a:hover {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}

/* Active State */
.pagination .current,
.pagination .active {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}

/* Disabled State */
.pagination .disabled {
    background-color: #f8f9fa;
    color: #6c757d;
    border-color: #ddd;
}

/* Responsive Design */
@media (max-width: 576px) {
    .pagination a,
    .pagination span {
        padding: 8px 12px;
        font-size: 14px;
    }
}
/* Ensure the carousel text appears on top of the image */
.carousel-inner .carousel-item {
    position: relative;
}

.carousel-caption {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    color: #fff;
    text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7); /* Optional: shadow effect */
}

/* Animation for text */
.animated-text {
    opacity: 0;
    animation: slideInText 1s forwards, fadeOutText 1s 4s forwards;
}

/* Keyframe for sliding text in */
@keyframes slideInText {
    0% {
        opacity: 0;
        transform: translateY(50px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Keyframe for fading text out */
@keyframes fadeOutText {
    0% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}

/* Optional: Style for carousel control buttons */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
}
.post-title-link {
    color: #007bff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.post-title-link:hover {
    color: #0056b3;
    text-decoration: underline;
}
/* Default Font Sizes */
body {
    font-size: 18px;
}

h1 {
    font-size: 36px;
}

h2 {
    font-size: 30px;
}

h3 {
    font-size: 24px;
}

p {
    font-size: 16px;
}

/* Medium Screens (Tablets) */
@media (max-width: 768px) {
    body {
        font-size: 16px;
    }

    h1 {
        font-size: 32px;
    }

    h2 {
        font-size: 28px;
    }

    h3 {
        font-size: 22px;
    }

    p {
        font-size: 14px;
    }
}

/* Small Screens (Phones) */
@media (max-width: 480px) {
    body {
        font-size: 14px;
    }

    h1 {
        font-size: 28px;
    }

    h2 {
        font-size: 24px;
    }

    h3 {
        font-size: 20px;
    }

    p {
        font-size: 12px;
    }
}


</style>
.<script type="text/javascript">
    // Initialize the Bootstrap carousel
    var myCarousel = new bootstrap.Carousel(document.getElementById('customCarousel'), {
        interval: 5000, // Time between automatic slides (in milliseconds)
        ride: 'carousel' // Automatically start the carousel
    });
</script>
</body>
<?php get_footer(); ?>

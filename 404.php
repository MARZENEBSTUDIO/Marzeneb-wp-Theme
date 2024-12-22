<?php get_header(); ?>

<div class="container text-center my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="display-4 text-danger">404</h1>
            <h2 class="my-3">Page Not Found</h2>
            <p class="text-muted mb-4">
                Oops! The page you are looking for doesn't exist, or it might have been moved. Try navigating back to the homepage or using the search bar below.
            </p>

            <!-- Search Form -->
            <div class="mb-4">
                <?php get_search_form(); ?>
            </div>

            <!-- Navigation Buttons -->
            <div>
                <a href="<?php echo home_url(); ?>" class="btn btn-primary btn-lg mr-2">Go to Homepage</a>
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-secondary btn-lg">View Blog</a>
            </div>

            <!-- Optional Image -->
            <div class="mt-5">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/404-error.svg" alt="Error 404" class="img-fluid" style="max-width: 300px;">
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

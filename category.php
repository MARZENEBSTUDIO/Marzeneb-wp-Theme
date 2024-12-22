<?php get_header(); ?>

<div class="category-container">
    <div class="category-header">
        <h1><?php single_cat_title(); ?></h1>
        <p><?php echo category_description(); ?></p>
    </div>
    <div class="category-posts">
        <?php if (have_posts()) : ?>
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-md-4 category-post">
                        <div class="card">

                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php the_title(); ?></h5>
                                <p class="card-text"><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>No posts found in this category.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
<style type="text/css">/* Container for Category */
.category-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 50px 20px;
}

/* Category Header Styling */
.category-header h1 {
    font-size: 2.5rem;
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.category-header p {
    text-align: center;
    font-size: 1.1rem;
    color: #777;
}

/* Grid Layout for Category Posts */
.category-posts .row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-between;
}

/* Individual Post Card */
.category-post .card {
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.category-post .card:hover {
    transform: translateY(-10px); /* Hover effect */
}

/* Post Image */
.category-post .card-img-top {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

/* Card Body */
.category-post .card-body {
    padding: 15px;
}

.category-post .card-title {
    font-size: 1.5rem;
    color: #333;
}

.category-post .card-text {
    font-size: 1rem;
    color: #666;
}

/* Read More Button */
.category-post .btn-primary {
    background-color: #007bff;
    color: white;
    font-size: 1rem;
    text-transform: uppercase;
    padding: 10px 15px;
    border-radius: 5px;
}

.category-post .btn-primary:hover {
    background-color: #0056b3;
}

/* No Posts Found */
.category-posts p {
    text-align: center;
    font-size: 1.2rem;
    color: #999;
}
</style>
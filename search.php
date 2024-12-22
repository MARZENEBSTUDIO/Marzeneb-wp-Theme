<?php
/**
 * The template for displaying search results in Marzeneb Theme by Bekalu
 *
 * @package Marzeneb_Theme
 */

get_header(); ?>
<body>

<div class="search-results container py-5">
    <h1 class="search-title">
        Search Results for: "<?php echo get_search_query(); ?>"
    </h1>

    <?php if (have_posts()) : ?>
        <ul class="search-list list-unstyled">
            <?php while (have_posts()) : the_post(); ?>
                <li class="search-item mb-4">
                    <a href="<?php the_permalink(); ?>" class="search-link">
                        <h2 class="search-item-title"><?php the_title(); ?></h2>
                    </a>
                    <p class="search-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></p>
                </li>
            <?php endwhile; ?>
        </ul>

        <div class="pagination">
            <?php the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('« Previous', 'textdomain'),
                'next_text' => __('Next »', 'textdomain'),
            )); ?>
        </div>

    <?php else : ?>
        <div class="no-results">
            <h2>No Results Found</h2>
            <p>Sorry, but nothing matched your search terms. Please try again with different keywords.</p>
            <?php get_search_form(); ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
</body>
<style type="text/css">
    /* Search Results Page Styling */
    .site-header, .site-main, .site-footer {
    display: block;
    width: 100%;
}
.search-results {
    background-color: #f8f9fa;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.search-title {
    font-size: 2rem;
    font-weight: bold;
    color: #007bff;
    margin-bottom: 30px;
    text-align: center;
}

.search-list {
    padding: 0;
    margin: 0;
}

.search-item {
    padding: 20px;
    border: 1px solid #e3e3e3;
    border-radius: 10px;
    background-color: #ffffff;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.search-item:hover {
    transform: translateY(-5px);
    box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
}

.search-link {
    text-decoration: none;
    color: #007bff;
}

.search-link:hover {
    color: #0056b3;
    text-decoration: underline;
}

.search-item-title {
    margin-bottom: 10px;
    font-size: 1.5rem;
    font-weight: bold;
}

.search-excerpt {
    font-size: 1rem;
    color: #555555;
}

.pagination {
    display: flex;
    justify-content: center;
    margin-top: 30px;
}

.pagination a,
.pagination span {
    padding: 10px 15px;
    margin: 0 5px;
    border-radius: 5px;
    background-color: #ffffff;
    color: #007bff;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.pagination a:hover,
.pagination span.current {
    background-color: #007bff;
    color: #ffffff;
}

/* No Results Styling */
.no-results {
    text-align: center;
    padding: 50px 20px;
    background-color: #f8f9fa;
    border: 1px solid #e3e3e3;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.no-results h2 {
    color: #dc3545;
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 20px;
}

.no-results p {
    font-size: 1rem;
    color: #555555;
    margin-bottom: 20px;
}

.no-results form {
    max-width: 400px;
    margin: 0 auto;
}
</style>

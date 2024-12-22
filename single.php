<?php get_header(); ?>

<div class="container mt-5">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
                    <!-- Post Title -->
                    <h1 class="mb-3"><?php the_title(); ?></h1>

                    <!-- Post Meta -->
                    <div class="mb-3 text-muted">
                        <span class="me-3"><i class="bi bi-calendar"></i> <?php echo get_the_date(); ?></span>
                        <span class="me-3"><i class="bi bi-person"></i> <?php the_author(); ?></span>
                        <span class="me-3"><i class="bi bi-folder"></i> <?php the_category(', '); ?></span>
                    </div>

                    <!-- Post Content -->
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>



                    <!-- Social Media Share Buttons -->
                    <div class="social-share mt-4">
                        <h5>Share this post:</h5>
                        <div class="d-flex gap-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                               target="_blank" class="btn btn-primary">
                                <i class="bi bi-facebook"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>&url=<?php echo urlencode(get_permalink()); ?>" 
                               target="_blank" class="btn btn-info">
                                <i class="bi bi-twitter"></i> Twitter
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" 
                               target="_blank" class="btn btn-secondary">
                                <i class="bi bi-linkedin"></i> LinkedIn
                            </a>
                            <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>" 
                               target="_blank" class="btn btn-dark">
                                <i class="bi bi-envelope"></i> Email
                            </a>
                        </div>
                    </div>




                    <!-- Pagination for Multi-Page Posts -->
                    <div class="post-pagination mt-4">
                        <?php wp_link_pages([
                            'before' => '<nav aria-label="Page navigation"><ul class="pagination">',
                            'after' => '</ul></nav>',
                            'link_before' => '<li class="page-item"><span class="page-link">',
                            'link_after' => '</span></li>',
                            'next_or_number' => 'number',
                        ]); ?>
                    </div>
                </article>
            <?php endwhile; else : ?>
                <div class="alert alert-warning">
                    <p>No content found.</p>
                </div>
            <?php endif; ?>

            <!-- Comments Section -->
            <div class="comments-section">
                <?php comments_template(); ?>
            </div>
        </div>
<?php if (is_active_sidebar('main-sidebar')) : ?>
    <aside id="secondary" class="widget-area">
        <?php dynamic_sidebar('main-sidebar'); ?>
    </aside>
<?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>
<style type="text/css">
    /* Sidebar Styling */
.widget-area {
    background-color: #f9f9f9;
    padding: 20px;
    margin: 20px 0;
    border: 1px solid #ddd;
}

.widget {
    margin-bottom: 20px;
}

.widget-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

</style>

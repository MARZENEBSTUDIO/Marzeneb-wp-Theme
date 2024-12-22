<?php
/**
 * The template for displaying archive pages in Marzeneb Theme by Bekalu
 *
 * @package Marzeneb_Theme
 */

get_header(); ?>

<div class="content-wrapper">
    <main id="primary" class="site-main">
        <header class="archive-header">
            <?php
            if ( is_category() ) :
                single_cat_title( '<h1 class="archive-title">Category: ', '</h1>' );
            elseif ( is_tag() ) :
                single_tag_title( '<h1 class="archive-title">Tag: ', '</h1>' );
            elseif ( is_author() ) :
                the_archive_title( '<h1 class="archive-title">Author: ', '</h1>' );
            elseif ( is_day() ) :
                echo '<h1 class="archive-title">Daily Archives: ' . get_the_date() . '</h1>';
            elseif ( is_month() ) :
                echo '<h1 class="archive-title">Monthly Archives: ' . get_the_date( 'F Y' ) . '</h1>';
            elseif ( is_year() ) :
                echo '<h1 class="archive-title">Yearly Archives: ' . get_the_date( 'Y' ) . '</h1>';
            else :
                echo '<h1 class="archive-title">Archives</h1>';
            endif;
            ?>
        </header><!-- .archive-header -->

        <?php if ( have_posts() ) : ?>

            <div class="archive-posts">
                <?php
                // Start the Loop
                while ( have_posts() ) : the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-post' ); ?>>
                        <header class="entry-header">
                            <!-- Post Title -->
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        </header><!-- .entry-header -->

                        <div class="entry-summary">
                            <!-- Post Excerpt -->
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-summary -->

                        <footer class="entry-footer">
                            <!-- Post Categories and Tags -->
                            <div class="entry-meta">
                                <span class="posted-on">Posted on <?php the_date(); ?></span>
                                <span class="byline"> by <?php the_author(); ?></span>
                                <span class="categories"> | <?php the_category( ', ' ); ?></span>
                                <span class="tags"><?php the_tags( ' | Tags: ', ', ' ); ?></span>
                            </div><!-- .entry-meta -->
                        </footer><!-- .entry-footer -->
                    </article><!-- #post-<?php the_ID(); ?> -->

                <?php endwhile; ?>

                <!-- Pagination Links -->
                <div class="pagination">
                    <?php
                    the_posts_pagination( array(
                        'prev_text' => 'Previous',
                        'next_text' => 'Next',
                    ) );
                    ?>
                </div><!-- .pagination -->

            </div><!-- .archive-posts -->

        <?php else : ?>
            <p>No posts found in this archive.</p>
        <?php endif; ?>
    </main><!-- #primary -->
</div><!-- .content-wrapper -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

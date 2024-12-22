<?php
/* Template Name: Bootstrap Layout Pages */

get_header(); // Include the header
?>

<div class="container">
    <h1 class="text-center mb-4">
        <?php the_title(); ?></h1>
            <div class="col-md-8">
            <!-- Page Content -->
            <div class="page-content">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        the_content();
                    endwhile;
                else :
                    echo '<p>No content found.</p>';
                endif;
                ?>
            </div>
        </div>
       

            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            endif;
            ?>
        </div>

        <!-- Sidebar -->
      <?php if (is_active_sidebar('main-sidebar')) : ?>
    <aside id="secondary" class="widget-area">
        <?php dynamic_sidebar('main-sidebar'); ?>
    </aside>
<?php endif; ?>

    </div>
</div>
    </div>

<?php
wp_reset_postdata(); // Reset the query
get_footer(); // Include the footer
?>

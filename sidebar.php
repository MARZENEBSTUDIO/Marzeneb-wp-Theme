<?php
/**
 * The Sidebar containing the main widget area.
 */
?>

<div id="primary" class="sidebar-area">
    <aside class="widget-area">
        <?php if (is_active_sidebar('main-sidebar')) : ?>
            <?php dynamic_sidebar('main-sidebar'); ?>
        <?php else : ?>
            <p><?php _e('No widgets found! Add some from the Widgets area in the admin panel.', 'your-theme'); ?></p>
        <?php endif; ?>
    </aside>
</div>

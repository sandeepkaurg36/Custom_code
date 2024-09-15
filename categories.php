<?php
/* Template Name: Categories */
get_header(); ?>

<div class="content_cat">
    <h2>Portfolio Categories</h2>

    <?php
    // Get all categories associated with the 'portfolio' post type
    $categories = get_terms(array(
        'taxonomy'   => 'portfolio_category',
        'hide_empty' => false,
    ));

    if (!empty($categories) && !is_wp_error($categories)) { ?>
        <div class="tabs_post">
            <ul class="tab-links">
                <!-- Add an "All Categories" tab as the first tab -->
                <li><a href="#tab-all">All Categories</a></li>

                <?php
                // Create a tab for each category
                foreach ($categories as $index => $category) {
                    echo '<li><a href="#tab-' . esc_attr($index) . '">' . esc_html($category->name) . '</a></li>';
                }
                ?>
            </ul>

            <div class="tab-content">
                <!-- Content for "All Categories" -->
                <div id="tab-all" class="tab">
                    <?php
                    // WP_Query to get all posts in the 'portfolio' post type
                    $args = array(
                        'post_type' => 'portfolio',
                        'posts_per_page' => -1,
                    );

                    $all_posts_query = new WP_Query($args);

                    if ($all_posts_query->have_posts()) :
                        while ($all_posts_query->have_posts()) : $all_posts_query->the_post(); ?>
                            <div class="post_cat">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium');
                                }
                                ?>
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>No posts found.</p>';
                    endif;
                    ?>
                </div>

                <!-- Content for each individual category -->
                <?php
                foreach ($categories as $index => $category) {
                    echo '<div id="tab-' . esc_attr($index) . '" class="tab">';

                    // WP_Query to get posts from this specific category
                    $args = array(
                        'post_type' => 'portfolio',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'portfolio_category',
                                'field'    => 'term_id',
                                'terms'    => $category->term_id,
                            ),
                        ),
                        'posts_per_page' => -1,
                    );

                    $posts_query = new WP_Query($args);

                    if ($posts_query->have_posts()) :
                        while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
                            <div class="post">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium');
                                }
                                ?>
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>No posts found in this category.</p>';
                    endif;

                    echo '</div>'; // End of each tab content
                }
                ?>
            </div> <!-- End of tab-content -->
        </div> <!-- End of tabs_post -->

        <?php
    } else {
        echo 'No categories found.';
    }
    ?>
</div>

<?php get_footer(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
jQuery(document).ready(function($) {
    // Initially show the first tab (All Categories) and hide others
    $('.tab-content .tab').hide();
    $('.tab-content .tab:first').show();
    $('.tab-links li:first a').addClass('active');

    // When a tab link is clicked
    $('.tab-links a').click(function(e) {
        e.preventDefault();
        
        var tabID = $(this).attr('href');  // Get the tab ID from href
        
        // Remove active class from all tabs and hide all tabs
        $('.tab-links a').removeClass('active');
        $('.tab-content .tab').hide();

        // Add active class to clicked tab and show the corresponding content
        $(this).addClass('active');
        $(tabID).show();
    });
});
</script>


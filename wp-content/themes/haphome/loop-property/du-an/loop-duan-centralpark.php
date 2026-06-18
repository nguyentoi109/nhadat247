<?php
$query = new WP_Query(array(
    'post_type' => 'property',
    'tax_query' => array(
        array(
            'taxonomy' => 'property_developer',
            'field' => 'term_id',
            'terms' => 115,
        ),
    ),
    'post_status' => 'publish',
    'orderby' => 'ID',
    'order' => 'DESC',
    'paged' => get_query_var('paged'),
    'posts_per_page' => 20
));

if ($query->have_posts()) :

    $temp_query = $wp_query;
    $wp_query = $query;
?>
    <div class="breadcrumb-container">
        <?php
            set_query_var('breadcrumb_developer', 115);
            get_template_part('custom-breadcrumb-developer');
        ?>
    </div>
    <div class="list-style list-all container">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php set_query_var('is_ngop', true);?>
            <?php get_template_part('loop-property/item-property'); ?>

        <?php endwhile; ?>

    </div>

    <div class="pagination">
        <?php get_template_part('pagination'); ?>
    </div>

<?php
    $wp_query = $temp_query;

else :
?>

    <article>
        <h2><?php _e('Không có nội dung.', 'html5blank'); ?></h2>
    </article>

<?php
endif;

wp_reset_postdata();
?>
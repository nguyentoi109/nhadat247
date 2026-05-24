<?php
$query = new WP_Query(array(
    'post_type' => 'property',
    'tax_query' => array(
        array(
            'taxonomy' => 'property_status',
            'field' => 'term_id',
            'terms' => 7,
        ),
        array(
            'taxonomy' => 'property_type',
            'field' => 'term_id',
            'terms' => 9,
        ),
        array(
            'taxonomy' => 'property_location',
            'field' => 'term_id',
            'terms' => 12,
            'include_children' => true,
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
<?php
    set_query_var('breadcrumb_location', 12);
    set_query_var('breadcrumb_status', 7);
    set_query_var('breadcrumb_type', 9);

    get_template_part('custom-breadcrumb');
?>
    <div class="list-style">

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
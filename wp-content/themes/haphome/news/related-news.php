<?php
/**
 * Template: Tin tức cùng loại
 */
?>
<div class="related-posts-container">
    <h2 class="title-section"><span>Tin cùng loại</span></h2>
    <div class="list-related-horizontal">
        <?php
        $categories = get_the_category(get_the_ID());
        if ($categories) {
            $category_ids = array();
            foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

            $related_query = new WP_Query(array(
                'category__in'     => $category_ids,
                'post__not_in'     => array(get_the_ID()),
                'posts_per_page'   => 5,
                'orderby'          => 'date',
                'order'            => 'DESC'
            ));

            if ($related_query->have_posts()) :
                while ($related_query->have_posts()) : $related_query->the_post(); 
                    get_template_part('item-related-card'); 
                endwhile;
                wp_reset_postdata();
            endif;
        }
        ?>
    </div>
</div>
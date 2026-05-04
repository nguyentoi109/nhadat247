<?php
/**
 * Template part: Ô bài viết nằm ngang 
 */
?>

<article class="item-property-horizontal modern-card">
    <div class="card-thumb-left">
        <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) : ?>
                <?php 
                the_post_thumbnail('medium', [
                    'class' => 'card-img'
                ]); 
                ?>
            <?php else : ?>
                <img class="card-img" src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" alt="No image">
            <?php endif; ?>
        </a>
    </div>

    <div class="card-content-right">
        <h3 class="title-post">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <div class="card-date-time">
            <?php echo get_the_time('d/m/Y H:i'); ?>
        </div>

        <div class="card-excerpt">
            <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
        </div>
    </div>
</article>
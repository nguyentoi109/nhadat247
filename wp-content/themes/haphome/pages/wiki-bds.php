<?php 
/* Template Name: Wiki bds */ 
get_header();
?>
<section class="container mt-4 wrap-content">
    <h2 class="title-wiki">
        <span>Wiki BDS</span>
    </h2>
    <?php 
    include(locate_template('loop-property/wiki/wiki.php')); 
    
    include(locate_template('sidebar-popular.php')); 
    ?>
</section>

<?php get_footer(); ?>
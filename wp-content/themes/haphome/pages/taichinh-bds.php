<?php 
/* Template Name: Tài chính bds */ 
get_header();
?>
<section class="container mt-4 wrap-content">
    <h2 class="title-wiki"><span>Tài chính bất động sản</span></h2>
    <?php 
    include(locate_template('loop-property/wiki/tai-chinh.php')); 
    
    include(locate_template('sidebar-popular.php')); 
    ?>
</section>

<?php get_footer(); ?>
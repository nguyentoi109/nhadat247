<?php 
/* Template Name: Phong tục */ 
get_header();
?>
<section class="container mt-4 wrap-content">
    <h2 class="title-wiki"><span>Phong tục</span></h2>
    <?php 
    include(locate_template('loop-property/wiki/phong-tuc.php')); 
    
    include(locate_template('sidebar-popular.php')); 
    ?>
</section>

<?php get_footer(); ?>
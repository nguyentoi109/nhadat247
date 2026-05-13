<?php 
/* Template Name: Quy hoạch */ 
get_header();
?>
<section class="container mt-4 wrap-content">
    <h2 class="title-wiki"><span>Thông tin quy hoạch pháp lý</span></h2>
    <?php 
    include(locate_template('loop-property/wiki/quy-hoach.php')); 
    
    include(locate_template('sidebar-popular.php')); 
    ?>
</section>

<?php get_footer(); ?>
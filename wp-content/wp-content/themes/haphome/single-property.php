<?php get_header(); ?>
<!--breadcrumbs-->

<!--End breadcrumbs-->
<!-- section container-->
<section class="breadcrumbs">
	<?php 
		if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs" class="container">','</p>');} 
	 ?>
</section>

<section class="container detail-page">
	<main role="main">
	<?php 
		if (have_posts()): while (have_posts()) : the_post(); 
		$price = rwmb_meta( 'prefix-price' );
		$unit = rwmb_meta( 'prefix-unit' );
		$area = rwmb_meta( 'prefix-area' );
		$address = rwmb_meta( 'prefix-address' );
		$video = rwmb_meta( 'prefix-video' );
		$id_video = explode('?v=', $video);
		$name_custom = rwmb_meta('prefix-name-custom');
    $phone_custom = rwmb_meta('prefix-phone-custom');
    $email_custom = rwmb_meta('prefix-email-custom');
	?>

		<article <?php post_class(); ?> class="detail-content">
			
			<?php
				$delete_post_link = get_delete_post_link( $post->ID, '' );
				if ( ! empty( $delete_post_link ) ) { ?>
				<a style="color: red;" class="master-del" href="<?php echo esc_url( $delete_post_link ); ?>"><i class="ti-trash"></i></a> | 
			<?php edit_post_link('<i class="ti-pencil"></i>'); }// Always handy to have Edit Post Links available ?>
			
			<?php if ( has_post_thumbnail()) :  ?>
        <div class="featured-image">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>
			<h1><?php the_title(); ?></h1>
			
			<p class="price">
				<strong><span class="ti-tag"></span> Giá: </strong><span><?php echo number_format($price, 0,'','.'); ?></span>
				<?php 
          if($unit){
            if($unit == 'trieu'){
              echo 'Triệu';
            }
            if($unit == 'ty'){
              echo 'Tỷ';
            }
          }else{
            echo 'đ';
          }
        ?>
			</p>
      <?php //echo $unit == 'ty' ? ' selected' : ''?>
      
      <h2 class="title-box-detail">Mô tả</h2>
			<div class="description block-detail">
			  <?php the_content(); ?>
			</div>
			
			<h2 class="title-box-detail">Thông tin Bất động sản</h2>
			<ul class="list-detail-real">
				<li>
					<span class="label"><span class="ti-location-pin"></span> Khu vực:</span>
					<?php
						$status_terms = get_the_terms( $post->ID,"property_location" );
						if(!empty( $status_terms )){
							$status_count = 0;
							foreach( $status_terms as $term ){
								if( $status_count > 0 ){
									echo ', ';
								}
								echo $term->name;
							}
						}
					?>
				</li>
				<li><span class="label"><span class="ti-map-alt"></span> Địa chỉ:</span><?php echo $address; ?></li>
				<li>
					<span class="label"><span class="ti-direction-alt"></span> Hướng:</span>
					<?php
						$status_terms = get_the_terms( $post->ID,"property_direction" );
						if(!empty( $status_terms )){
							$status_count = 0;
							foreach( $status_terms as $term ){
								if( $status_count > 0 ){
									echo ', ';
								}
								echo $term->name;
							}
						}
					?>
				</li>
				<li>
					<span class="label"><span class="ti-menu-alt"></span> Loại tin:</span>
					<?php
						$status_terms = get_the_terms( $post->ID,"property_status" );
						if(!empty( $status_terms )){
							$status_count = 0;
							foreach( $status_terms as $term ){
								if( $status_count > 0 ){
									echo ', ';
								}
								echo $term->name;
							}
						}
					?>
				</li>
				<li>
					<span class="label"><span class="ti-menu-alt"></span> Loại BĐS:</span>
					<?php
						$status_terms = get_the_terms( $post->ID,"property_type" );
						if(!empty( $status_terms )){
							$status_count = 0;
							foreach( $status_terms as $term ){
								if( $status_count > 0 ){
									echo ', ';
								}
								echo $term->name;
							}
						}
					?>
				</li>
				<li><span class="label"><span class="ti-ruler"></span> Diện tích:</span><?php echo $area; ?> m <sup>2</sup></li>
			</ul>
			
			<?php if ( $video ) : ?>
			<h2 class="title-box-detail">Video</h2>
			<div class="list-detail-real box-media">
        <div class="wrap-video">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $id_video[1]; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
			</div>
			<?php endif; ?>
			
			<?php
        $gavatar = get_the_author_meta('user_email');
      ?>
      <h2 class="title-box-detail">Thông tin liên hệ</h2>
			<div class="info-contact width-common flexbox">
			  <div class="avata-user">
			    <a href="" class="thumb thumb-1x1"><?php echo get_avatar($gavatar, 300); ?></a>
			  </div>
			  <div class="info-user">
			    <p><strong>Họ tên: <span class="name"><?php if($name_custom){echo $name_custom; }else{echo get_the_author_meta('nickname');} ?></span> </strong></p>
          <p><strong><span class="ti-email"></span>:&nbsp;</strong> <a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php if($email_custom){echo $email_custom;}else{echo get_the_author_meta('user_email');} ?>" title="<?php if($email_custom){echo $email_custom;}else{echo get_the_author_meta('user_email');} ?>"><?php if($email_custom){echo $email_custom;}else{echo get_the_author_meta('user_email');} ?></a> </p>
          <p><strong><span class="ti-mobile"></span>:&nbsp;</strong> <?php if($phone_custom){echo $phone_custom;}else{echo get_the_author_meta('phone');} ?> </p>
          <p><strong><span class="ti-direction"></span>:&nbsp;</strong> <?php echo get_the_author_meta('address'); ?> </p>
			  </div>
			</div>
			
			<p class="date">
				<span class="ti-calendar"></span> <?php the_time('d/m/Y'); ?> | <?php the_time('G:i'); ?>
				<span class="count-view"><span class="ti-eye"></span> <?php echo count_post_views(get_the_ID()); ?></span>
			</p>
			<!--<span class="author"><?php// _e( 'Bởi', 'html5blank' ); ?> <?php// the_author_posts_link(); ?></span>-->
			<!--<button class="view-pic">Xem hình</button>-->
			<?php 
          $p = get_adjacent_post(false, '', true);
          if(!empty($p)) echo '<a class="btn-next-prev-detail prev" href="' . get_permalink($p->ID) . '" title="' . $p->post_title . '"><span class="title">' . $p->post_title . '<span></a>';

          $n = get_adjacent_post(false, '', false);
          if(!empty($n)) echo '<a class="btn-next-prev-detail next" href="' . get_permalink($n->ID) . '" title="' . $n->post_title . '"><span class="title">' . $n->post_title . '</span></a></div>'; 
      ?>
		</article>
		<!-- /article -->
	<?php
				$delete_post_link = get_delete_post_link( $post->ID, '' );
				if ( ! empty( $delete_post_link ) ) { ?>
				<a style="color: red;" class="master-del" href="<?php echo esc_url( $delete_post_link ); ?>"><i class="ti-trash"></i></a> | 
			<?php edit_post_link('<i class="ti-pencil"></i>'); }// Always handy to have Edit Post Links available ?>
	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Chưa có nội dung.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>
	
	</main>
<!-- /section container-->
</section>


<?php get_template_part('related-area'); ?>
<?php get_template_part('related-type'); ?>

<?php 
	get_template_part('footer-contact-mobile-detail');	
	get_footer(); 
?>

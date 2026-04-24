<article id="post-<?php the_ID(); ?>" class="list-news swiper-slide wow fadeInUp">

<?php
$post_id = get_the_ID();

$price = rwmb_meta('prefix-price');
$unit = rwmb_meta('prefix-unit');
$area = rwmb_meta('prefix-area');
$address = rwmb_meta('prefix-address');
$post_link = rwmb_meta('prefix-post');
$phone_custom = rwmb_meta('prefix-phone-custom');

$status_terms = get_the_terms($post_id, "property_status");
$price = (float)$price;
?>

<div class="header-list-news">
    <span class="price">
        <strong><span class="ti-tag"></span>Giá: </strong>

        <span class="num">
            <?php echo $price > 0 ? number_format($price, 0, ",", ".") : 'Liên hệ'; ?>
        </span>

        <?php
        if ($price > 0) {
            if ($unit == 'trieu') echo ' triệu';
            elseif ($unit == 'ty') echo ' tỷ';
            else echo ' đ';
        }
        ?>
    </span>
</div>
		<?php if (has_post_thumbnail()) : ?>
<div class="thumb-list">
    <a class="thumb-4x3" href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('thumb5x3'); ?>
    </a>

    <span class="status">
        <?php
        if (!empty($status_terms) && !is_wp_error($status_terms)) {
            $names = [];
            foreach ($status_terms as $term) {
                $names[] = $term->name;
            }
            echo implode(', ', $names);
        }
        ?>
    </span>
</div>
<?php endif; ?>
		<!-- /post thumbnail -->

		<div class="content">
			<h3 class="title-post">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>
      		<?php html5wp_excerpt('html5wp_index');?>
			<div class="meta">
				<span class="area">
					<strong><span class="ti-ruler"></span>:</strong> <?php echo $area; ?> m<sup>2<sup>
				</span> |
				<span class="location">
					<strong><span class="ti-location-pin"></span>:</strong>
					<?php
						$direction_terms = get_the_terms( $post->ID,"property_location" );
						if(!empty( $direction_terms )){
							$direction_count = 0;
							foreach( $direction_terms as $term ){
								if( $direction_count > 0 ){
									echo ', ';
								}
								echo $term->name;
							}
						}else{
							echo '&nbsp;';
						}
					?>					 
				</span> | 
				<span class="direction">
					<strong><span class="ti-direction-alt"></span>:</strong>					
					<?php
						$direction_terms = get_the_terms( $post->ID,"property_direction" );
						if(!empty( $direction_terms )){
							$direction_count = 0;
							foreach( $direction_terms as $term ){
								if( $direction_count > 0 ){
									echo ', ';
								}
								echo $term->name;
							}
						}else{
							echo '&nbsp;';
						}
					?>	
				</span>
			</div>
			<div class="footer-content">
			  <div class="author">
            	<?php 
				//get_template_part("meta-user")
						if($phone_custom){
							echo '<a class="phone" href="tel:'.$phone_custom.'"><span class="ti-mobile"></span> '.$phone_custom .'</a>';
						}
				?>

			  </div>
			  <div class="date"><span class="ti-calendar"></span> <?php //the_time('d/m/Y'); ?>Hôm nay</div>
			</div>
		</div>
		<div class="side-content">
			<span class="price">
				<strong><span class="ti-tag"></span>Giá: </strong>
				<span class="num">
				<?php echo number_format($price, 0,",","."); ?>
				</span>
				<?php
					if($unit){
					if($unit == 'trieu'){
						echo ' triệu';
					}
					if($unit == 'ty'){
						echo ' tỷ';
					}
					}else{
					echo ' đ';
					}
				?>
			</span>

		<?php if($post_link): ?>
		<div class="wrap-news">
			<div class="title">Tin tức liên quan</div>
			<a href="<?php echo $post_link[1]?>" target="_blank" title="<?php echo $post_link[0]?>"><?php echo $post_link[0]?></a>
		</div>
		<?php endif; ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn">Xem chi tiết</a>
		</div>
	</article>
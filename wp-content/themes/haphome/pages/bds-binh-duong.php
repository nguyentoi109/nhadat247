<?php
/*
Template Name: Trang Bình Dương
*/
get_header();
?>
<section class="container wrap-content">
	<main role="main" class="full-page">

		<div class="list-style list-all">

			<?php
			$paged = max(1, get_query_var('paged'));

			$query = new WP_Query(array(
				'post_type'      => 'property',
                'post_status'    => 'publish',
                'orderby'        => 'ID',
                'order'          => 'DESC',
                'paged'          => $paged,
                'posts_per_page' => 20,

                'tax_query' => array(
                    array(
                        'taxonomy' => 'property_location',
                        'field'    => 'term_id',
                        'terms'    => 12 
                    )
                )
			));
			?>

			<?php if ($query->have_posts()) : ?>

				<?php while ($query->have_posts()) : $query->the_post(); ?>

					<?php
						$price   = rwmb_meta('prefix-price');
						$unit    = rwmb_meta('prefix-unit');
						$area    = rwmb_meta('prefix-area');
						$address = rwmb_meta('prefix-address');

						$status_terms = get_the_terms(get_the_ID(), "property_status");
					?>

					<!-- article -->
					<!-- <article id="post-<?php //the_ID(); ?>" <?php //post_class('list-news wow fadeInUp'); ?>> -->
					<article id="post-<?php the_ID(); ?>" <?php post_class('list-news'); ?>>


						<!-- PRICE -->
						<div class="header-list-news">
							<span class="price">
								<strong>
									<span class="ti-tag"></span> Giá:
									<span class="num">
										<?php 
										if (!empty($price)) {
											echo number_format($price, 0, ",", ".");
										} else {
											echo 'Liên hệ';
										}
										?>
									</span>
									<span class="unit"><?php echo $unit; ?></span>
								</strong>
							</span>
						</div>

						<!-- IMAGE -->
						<?php if (has_post_thumbnail()) : ?>
							<div class="thumb-list">
								<a class="thumb-4x3" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('thumb5x3'); ?>
								</a>

								<span class="status">
									<?php
									if (!empty($status_terms)) {
										$i = 0;
										foreach ($status_terms as $term) {
											if ($i++ > 0) echo ', ';
											echo $term->name;
										}
									}
									?>
								</span>
							</div>
						<?php endif; ?>

						<!-- CONTENT -->
						<div class="content">
							<h3 class="title-post">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>

							<?php html5wp_excerpt('html5wp_index'); ?>

							<div class="meta">
								<span class="area">
									<strong><span class="ti-ruler"></span>:</strong>
									<?php echo $area ? $area : '0'; ?> m<sup>2</sup>
								</span> |

								<span class="location">
									<strong><span class="ti-location-pin"></span>:</strong>
									<?php
									$loc = get_the_terms(get_the_ID(), "property_location");
									if (!empty($loc)) {
										$i = 0;
										foreach ($loc as $t) {
											if ($i++ > 0) echo ', ';
											echo $t->name;
										}
									} else {
										echo '---';
									}
									?>
								</span>
							</div>

							<div class="footer-content">
								<div class="author"><?php get_template_part("meta-user"); ?></div>
								<div class="date">
									<span class="ti-calendar"></span> <?php the_time('d/m/Y'); ?>
								</div>
							</div>
						</div>

						<!-- RIGHT -->
						<div class="side-content">

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

							<a href="<?php the_permalink(); ?>" class="btn">Xem chi tiết</a>
						</div>

					</article>
					<!-- /article -->

				<?php endwhile; ?>

				<!-- PAGINATION -->
				<div class="pagination">
					<?php
					echo paginate_links(array(
						'total'   => $query->max_num_pages,
						'current' => $paged,
						'mid_size'=> 2,
						'prev_text' => '« Trước',
						'next_text' => 'Sau »'
					));
					?>
				</div>

			<?php else : ?>
				<h2>Không có bất động sản nào</h2>
			<?php endif; ?>

			<?php wp_reset_postdata(); ?>

		</div>

	</main>
</section>

<?php get_footer(); ?>
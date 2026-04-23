<?php
/* Template Name: Quản lý tin đăng */
get_header();

if ( is_user_logged_in() ) {
	$current_user = wp_get_current_user();
	$current_user->user_login;
	$userid = $current_user->ID;
	
	$check_key_times_up = get_user_meta($userid, 'key_times_up', true);
	$left_times = 20 - $check_key_times_up;
?>
	<!-- section -->

	<section class="container detail-page user-page width-sidebar sidebar-left">
		<main role="main">
			<div style="width: 100%; float: left;margin-bottom: 10px">
				<a style="margin:10px 0;" href="<?php bloginfo(" url ");?>/dang-tin" class="btn btn-primary" role="button">+ Đăng tin </a> | <p style="display: inline">Bạn còn <strong><?php echo $left_times ?></strong> lượt up tin hôm nay</p>
			</div>
			<div class="wrap-table">
				<table class="table-list">
					<thead>
						<tr class="">
							<th class="htitle">Tiêu đề</th>
							<th class="hstatus">Trạng thái</th>
							<th class="hedit">Chỉnh sửa</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$happosts = new WP_Query( array(
							'post_type'        => 'property',
							'post_status' => array( 'publish', 'pending' ),
							//'orderby' => 'date',
							'orderby' => 'modified',
							'order' => 'DESC',
							'author' => $userid,
							'paged' => get_query_var( 'paged' ),
							'posts_per_page' => 20 ) );
						?>
						<?php 
							while ($happosts->have_posts()) : $happosts->the_post();
							$i += 1;
						?>
						<?php $postid = get_the_ID(); ?>
						<tr class="">
							<td class="title-post">
								<?php echo '<strong>'.$i.'.</strong>&nbsp;';?>
								<a target="_blank" href="<?php the_permalink() ;?>">
									<?php the_title() ;?>
								</a>
							</td>
							<td class="status-post">
								
									<?php $stt = get_post_status($postid); if($stt=="publish"){ echo "<span style='color: #0cc14c;'>Hiển thị</span>"; } else {echo "<span style='color: #FFC107;'>Chờ duyệt</span>";  } ?>
								
							</td>
							<td class="edit">
								<a target="_blank"href="<?php bloginfo('url');?>/sua-tin?id=<?php echo $postid;?>" title="Sửa tin"> <i class="ti-pencil"></i> </a> 
								<?php
									if ( current_user_can('delete_posts') ) {
										$delete_post_link = get_delete_post_link( $post->ID, '' );
										if ( ! empty( $delete_post_link ) ) {
											?>| <a href="<?php echo esc_url( $delete_post_link ); ?>" title="Xóa tin"> <i class="ti-trash"></i> </a><?php
										}
									}
								?> | <button <?php if($check_key_times_up >= 20){echo 'disabled';} ?> class="uptin" title="Làm mới tin" value="<?php echo $post->ID; ?>" id="uptin-<?php echo $post->ID; ?>"><span class="ti-upload"></span></button>
							</td>
						</tr>
						<?php endwhile; wp_reset_query();?>
					</tbody>
				</table>
			</div>
			<?php if (function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $happosts ) ); } ?>
			
		</main>
		<?php get_sidebar('myuser'); ?>
	</section>
	<?php } else { ?>
	<section class="container">
		<div class="formdangnhap clear">
			<p class="alert alert-warning"><strong>Bạn</strong> cần đăng nhập để quản lý bài của mình!</p>
			<?php wp_login_form(); ?>
		</div>
	</section>
	
	<?php } ?>
	<!-- /section -->

<script type="text/javascript">
	(function($){
		$(document).ready(function(){
			$('.uptin').click(function(){
				$.ajax({
					type : "post", //Phương thức truyền post hoặc get
					//dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
					url : '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
					data : {
						action: "loadpost", //Tên action
						post_id: $(this).val(),
						id_user: '<?php echo $userid; ?>',
					},
					context: this,
					beforeSend: function(){
						//Làm gì đó trước khi gửi dữ liệu vào xử lý
					},
					success: function(response) {
						//Làm gì đó khi dữ liệu đã được xử lý
						//var e = $(this).attr('id');
						alert('Làm mới tin thành công!');
						$(this).prop("disabled",true);
						$(this).text("Đã up tin");
					},
					error: function( jqXHR, textStatus, errorThrown ){
						//Làm gì đó khi có lỗi xảy ra
						//console.log( 'The following error occured: ' + textStatus, errorThrown );
						console.log( 'not ok ');
					}
				})
				return false;
			})
		})
	})(jQuery)
</script>
	<?php get_footer(); ?>
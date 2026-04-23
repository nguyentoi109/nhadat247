<?php
	$query = new WP_Query(array(
		'post_type'=>'post',		
		'meta_key' => 'prefix-recommend',
		'meta_value' => 1,
		'orderby' => 'ID',
		'orderby' => 'modified',
		'order' => 'DESC',
		'posts_per_page' => 1,
	));
	if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();

?>

<div id="ac-wrapper" style='display:none' onClick="hideNow(event)">
    <div id="popup">
		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<div class="thumb-list">
				<a class="thumb-5x3" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('thumb5x3'); ?>
				</a>
				<?php if ( wp_is_mobile() ){ ?>
					<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
				<?php } ?>
			</div>
		<?php endif; ?>
		<!-- /post thumbnail -->
		<?php if ( !wp_is_mobile() ){ ?>
		<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
		<?php } ?>
		<div class="des">
			<?php html5wp_excerpt('html5wp_index');?>
		</div>
    </div>
	<button type="submit" name="submit" value="Submit" onClick="PopUp('hide')">&times;</button>
</div>
<?php endwhile; wp_reset_query();?>

<script>
	
/*POPUP*/	
	function PopUp(hideOrshow) {
	if (hideOrshow === 'hide') {
		document.getElementById('ac-wrapper').style.display = "none";
	}
	else if(localStorage.getItem("popupWasShown") !== "1" && hideOrshow === 'show') {
		document.getElementById('ac-wrapper').removeAttribute('style');
		localStorage.setItem("popupWasShown", "1");
	}
}
window.onload = function () {
	setTimeout(function () {
		PopUp('show');
	}, 5000);
}


function hideNow(e) {
	if (e.target.id == 'ac-wrapper') {
		document.getElementById('ac-wrapper').style.display = 'none';
		localStorage.setItem("popupWasShown", "3");
	}
}

/*END POPUP	*/
</script>

<?php endif; ?>
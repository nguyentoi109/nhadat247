<?php
$args = array(
    'taxonomy'           => 'property_location',
    'hide_empty'         => 0,
    'depth'         	 => 1,
    'orderby'            => 'name',
    'order'              => 'ASC',
    'show_count'         => 0,
    'use_desc_for_title' => 0,
    'title_li'           => 0
);
?>

<section class="block">
<h2 class="title-block">Tin theo khu vực</h2>
<ul class="list-location">
	<?php wp_list_categories($args); ?>	
</ul>
	<!--<a href="javascript:;" class="show-more">
		<span class="txt-show">Xem tất cả</span>
		<span class="txt-hidden">Ẩn bớt</span>
	</a>-->
</section>
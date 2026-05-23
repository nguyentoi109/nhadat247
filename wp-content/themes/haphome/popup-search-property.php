<style> 
.close-popup{
	position: absolute;
	top: 0;
	right: 0;
	height: 32px;
	border: none;
	border-radius: 40%;
	background: #f3f4f6;
	color: #999;
	font-size: 24px;
	line-height: 1;
	cursor: pointer;
	z-index: 99;
}

.popup-search-property{
	z-index: 99;
}
</style>

<section class="popup-search-property">
	<button class="close-popup" type="button"> × </button>
	<?php get_template_part('searchformproperty'); ?>
</section>
<div class="mask-popup"></div>
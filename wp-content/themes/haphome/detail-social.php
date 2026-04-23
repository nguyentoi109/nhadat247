<div class="social">
	<span class="ti-share"></span>
	<div class="fb">
		<span class="ti-facebook"></span>
		<div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button" data-size="small"><a target="_blank" href="<?php the_permalink(); ?>" class="fb-xfbml-parse-ignore"></a></div>
	</div>
	<div class="tw">
		<a target="_blank" title="Chia sẽ Twitter" href="https://twitter.com/share?text=<?php echo urlencode(the_title()); ?>&url=<?php the_permalink(); ?>
"><span class="ti-twitter-alt"></span></a>
	</div>
	<div class="zalo">
		<div class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=false></div>
	</div>
</div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2"></script>
<script src="https://sp.zalo.me/plugins/sdk.js"></script>
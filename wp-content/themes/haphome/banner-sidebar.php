<div class="item item-banner">
    
    <a href="https://muadatgiacao.net/"
       target="_blank"
       rel="noopener noreferrer"
       referrerpolicy="no-referrer">

        <img src="<?php echo get_template_directory_uri(); ?>/img/ad_banner_top.webp"
             alt="Banner">

    </a>

</div>

<style>
.item-banner{
    position:relative;
    width:100%;
    height:0;
    padding-top:141.4286%;
    padding-bottom:48px;
    overflow:hidden;
    border-radius:8px;
    z-index:1;
}

.item-banner a{
    position:absolute;
    inset:0;
    display:block;
    z-index:1 !important;
}

.item-banner img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
    position:relative;
    z-index:1;
}

@media(max-width:768px){
    .item-banner{
        display:none !important;
    }
}
</style>
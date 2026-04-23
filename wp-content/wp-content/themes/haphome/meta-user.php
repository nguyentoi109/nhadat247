<!--
<a href="<?php// echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php// echo get_avatar( get_the_author_meta( 'ID' ), 32 );?>"><?php //echo get_avatar( get_the_author_meta( 'ID' ), 32 );?></a>
<a href="<?php //echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php// echo get_avatar( get_the_author_meta( 'ID' ), 32 );?>"><?php //$vnkings_name = the_author_meta( 'nickname', $user_id ); if(isset($vnkings_name)){echo $vnkings_name;} ?></a>
-->


<?php 
  $name_custom = rwmb_meta('prefix-name-custom');
  if($name_custom){
    echo '<span>'.$name_custom.'</span>';
  }
?>
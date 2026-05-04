<!-- Property search -->
<form action="<?php bloginfo('url');?>" method="get" class="search-advance" id="form-search">
	<div class="form-group input-search">
		<label for="">
			<input type="text" class="form-control" name="s" placeholder="Nhập từ khóa...">
		</label>
	</div>
	<div class="form-group">
		<label for="" class="select-style">
			<select name="property_status" class="form-control" id="">
			<option value="0">--- Loại BĐS ---</option>
			<?php
			$property_status = get_terms('property_status');
			foreach ($property_status AS $term_status) :
				echo "<option value='".$term_status->slug."'".($_GET['property_status'] == $term_status->slug ? ' selected="selected"' : '').">".$term_status->name."</option>\n";
			endforeach;
			?>
			</select>
		</label>
	</div>
	<div class="form-group">
		<label for="" class="select-style">
			<select name="property_type" class="form-control" id="">
			<option value="0">--- Loại BĐS ---</option>
			<?php
			$property_type = get_terms('property_type');
			foreach ($property_type AS $term_type) :
				echo "<option value='".$term_type->slug."'".($_GET['property_type'] == $term_type->slug ? ' selected="selected"' : '').">".$term_type->name."</option>\n";
			endforeach;
			?>
			</select>
		</label>
	</div>
	<div class="form-group">
	  <label for="" class="select-style">
			<select name="property_direction" class="form-control" id="">
			<option value="0">--- Hướng ---</option>
			<?php
			$property_direction = get_terms('property_direction');
			foreach ($property_direction AS $term_direction) :
				echo "<option value='".$term_direction->slug."'".($_GET['property_direction'] == $term_direction->slug ? ' selected="selected"' : '').">".$term_direction->name."</option>\n";
			endforeach;
			?>
			</select>
		</label>
  </div>
  
  <?php get_template_part('location/location_search'); ?>
	
	<input type="hidden" name="post_type" value="property">
	<input type="hidden" name="property_location" id="property_location">
	
  
	<button type="submit" class="btn"><span class="ti-search"></span> Tìm kiếm</button>
</form>
<!-- end Property search -->

	<script>
    /*$(document).ready(function(){
      $('button[type="submit"]').click(function(e){
        e.preventDefault();
        var property_location = $('#parent_location').val();
        var child_location = $('#child_location').val();
        if(child_location != ''){
          property_location = child_location;
        }

        $('#property_location').val(property_location);
        $('#form-search').submit();
      });
    });*/
    
    /*$(document).ready(function(){
		$('button[type="submit"]').click(function(e){
			e.preventDefault();
			var category = $('#quan-huyen').val();
			var phuong_xa = $('#xa-phuong').val();
			if(phuong_xa != ''){
				category = phuong_xa;
			}
			
			$('#category').val(category);
			$('#form-search').submit();
		});
	});*/
	</script>
	
<script>
(function ($, root, undefined) {

$(function () {

    $('.form-control').each(function () {
        if ($(this).val() === "" || $(this).val() === "0") {
            $(this).css('color', '#999');
        } else {
            $(this).css('color', '#000');
        }
    });

    $('.form-control').change(function () {
        if ($(this).val() === "" || $(this).val() === "0") {
            $(this).css('color', '#999');
        } else {
            $(this).css('color', '#000');
        }
    });

    $('button[type="submit"]').click(function(e){
        e.preventDefault();
        var property_location = $('#parent_location').val();
        var child_location = $('#child_location').val();
        if(child_location != ''){
            property_location = child_location;
        }

        $('#property_location').val(property_location);
        $('#form-search').submit();
    });

});

})(jQuery, this);
</script>
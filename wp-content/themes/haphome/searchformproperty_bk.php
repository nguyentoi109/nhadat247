<!-- Property search -->
<form id="search_form" action="<?php bloginfo('url');?>" method="get" class="search-advance">
	<div class="form-group">
		<label for="">
			<input type="text" class="form-control" name="s" placeholder="Nhập từ khóa...">
		</label>
	</div>
	<div class="form-group form50">
		<label for="" class="select-style">
			<select name="property_status" class="form-control" id="">
			<option value="0">--- Loại tin ---</option>
			<?php
			$property_status = get_terms('property_status');
			foreach ($property_status AS $term_status) :
				echo "<option value='".$term_status->slug."'".($_GET['property_status'] == $term_status->slug ? ' selected="selected"' : '').">".$term_status->name."</option>\n";
			endforeach;
			?>
			</select>
		</label>
		
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
	<div class="form-group form50">
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
	<!--<div class="form-group form50">
		<?php// echo do_shortcode("[ajax-dropdown]"); ?>
	</div>-->
	<input type="hidden" name="post_type" value="property">
	<input type="hidden" name="status" value="property_status">
	<input type="hidden" name="type" value="property_type">
	<input type="hidden" name="direction" value="property_direction">
	<input type="hidden" name="location" value="property_location">
	<?php
		/*$location = get_terms('property_location');
		foreach ($location AS $term_location) :
		if(isset($_GET['child_location']) && $_GET['child_location'] != -1)
			echo '<input type="hidden" name="location_child" value="'.$term_location->slug.'">';
		endforeach;*/
	?>
	<button type="submit" class="btn"><span class="ti-search"></span> Tìm kiếm</button>
</form>

<!-- end Property search -->

<?php 
if ( ! class_exists( 'frontendAjaxDropdown' ) ): class frontendAjaxDropdown { /** * Loading WordPress hooks */ function __construct(){
	/** * Add shortcode function */ 
	add_shortcode( 'ajax-dropdown', array($this, 'init_shortocde') ); 
	
	/** * Register ajax action */ 
	add_action( 'wp_ajax_get_subcat', array($this, 'getChildLocation') ); 
	
	/** * Register ajax action for non loged in user */ 
	add_action( 'wp_ajax_nopriv_get_subcat', array($this, 'getChildLocation') ); 
} 

/** * Show parent dropdown for wordpress category and loaded necessarry javascripts */ 
																			 

function init_shortocde() {
	
	$categories = wp_dropdown_categories("echo=0&hide_empty=0&hierarchical=1&depth=1&selected=0&taxonomy=property_location");
	preg_match_all('/\s*<option class="(\S*)" value="(\S*)">(.*)<\/option>\s*/', $categories, $matches, PREG_SET_ORDER);
	echo "<label for='parent_location'><span class='text'>Tỉnh/Thành</span><select id='parent_location' class='' name='property_location'>";
	echo "<option value='0'>---Tỉnh/Thành---</option>";
	foreach ($matches as $match){
		echo "<option value='{$match[2]}'>{$match[3]}</option>";
	}
	echo "</select></label>\n";
	
?>
<script type="text/javascript">
    (function($) {
        $("#parent_location").change(function() {
            $("#child_location").empty();
            $.ajax({
                type: "post",
                url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
                data: {
                    action: 'get_subcat',
                    cat_id: $("#parent_location option:selected").val(),
                },
                success: function(data) {
					//console.log('The server responded');
                    $("#child_location").append(data);
                }
            });
        });

    })(jQuery);
</script>
<label for="property_location">
	<span class="text">Quận/Huyện</span>						
	
	<?php
		//$categories = wp_dropdown_categories("echo=0&hide_empty=0&hierarchical=1&depth=1&selected=0&taxonomy=property_location&value_field=slug");
//		preg_match_all('/\s*<option class="(\S*)" value="(\S*)">(.*)<\/option>\s*/', $categories, $matches, PREG_SET_ORDER);
//		echo "<select id='child_location' class='' name='child_location'>";
//		echo "<option value='0'>---Quận/Huyện---</option>";
//		foreach ($matches as $match){
//			echo '<option class="'.$match[1].'" value="'.$match[2].'" '.($_GET['property_location'] == $match[2] ? ' selected="selected"' : '').'>'.$match[3].'</option>';
//		}
//		echo "</select>\n";
	?>
	<select name='child_location' id='child_location'>
		<option value='-1'>---Quận/Huyện---</option>
	</select>
</label>

<?php } /** * AJAX action: Shows dropdown for selected parent */ 

	function getChildLocation(){
		//$term = get_term_by('slug', $_POST['cat_id'], 'property_location');
		$child_locations = wp_dropdown_categories(
			"hide_empty=0&hierarchical=1&depth=1&selected=-1&taxonomy=property_location&child_of={$_POST['cat_id']}");
		preg_match_all('/\s*<option class="(\S*)" value="(\S*)">(.*)<\/option>\s*/', $child_locations, $matches, PREG_SET_ORDER);
		
		//echo "<option value='0'>---Quận/Huyện---</option>";
		foreach ($matches as $match){
			echo "<option value='{$match[2]}'>{$match[3]}</option>";
		}
		
		
		die();
	}
} endif; 
new frontendAjaxDropdown(); 
?>
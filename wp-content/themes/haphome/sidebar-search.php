<!-- sidebar -->
<aside class="sidebar" role="complementary">
	<form action="<?php bloginfo('url');?>" method="get">
		<div class="form-group">
			<label for="">Từ khóa</label>
			<input type="text" class="form-control" name="s" placeholder="Nhập từ khóa...">
		</div>
		<div class="form-group">
			<label for="">Danh Mục</label>
			<select name="term" class="form-control" id="vnkings_cat">
			<option value="0">--- Chọn danh thành phố ---</option>
			<?php
			$vnkings_terms = get_terms('property_location', 'orderby=name');
			foreach ($vnkings_terms AS $term) :
				echo "<option value='".$term->slug."'".($_GET['publication_categories'] == $term->slug ? ' selected="selected"' : '').">".$term->name."</option>\n";
			endforeach;
			?>
			</select>
		</div>
		<div class="form-group">
			<label for="">Danh Mục</label>
			<select name="term" class="form-control" id="vnkings_cat">
			<option value="0">--- Loại BĐS ---</option>
			<?php
			$vnkings_terms = get_terms('property_type', 'orderby=name');
			foreach ($vnkings_terms AS $term) :
				echo "<option value='".$term->slug."'".($_GET['publication_categories'] == $term->slug ? ' selected="selected"' : '').">".$term->name."</option>\n";
			endforeach;
			?>
			</select>
		</div>
		<div class="form-group">
			<label for="">Sắp xếp</label>
			<select name="orderby" class="form-control" id="vnkings_cat">
			<option value="menu_order">--- Sắp xếp theo ---</option>
			<option value="popularity">Mức độ phổ biến</option>
			<option value="rating">Điểm đánh giá</option>
			<option value="date">Theo sản phẩm mới</option>
			<option value="price">Giá Thấp đến Cao</option>
			<option value="price-desc">Giá Cao đến Thấp</option>
			</select>
		</div>
		<input type="hidden" name="post_type" value="property">
		<input type="hidden" name="taxonomy" value="property_location">
		<input type="hidden" name="taxonomy" value="property_type">
		<button type="submit" class="btn btn-default">Tìm kiếm</button>
	</form>

</aside>
<!-- /sidebar -->

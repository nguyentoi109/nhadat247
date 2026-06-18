<style>
.filter-wrap{
	position:relative;
	width: auto !important;
}
.filter-wrap .search-filter-btn{
	width: 90px;
}

.search-filter-btn{
	display: flex;
	align-items:center;
	gap:3px;
	height:48px;
	border:none;
	border-radius:4px;
	background: var(--btn);
	color: var(--text);
	cursor:pointer;
	width: 60px;
}

.filter-icon{
	width:18px;
	height:18px;
	object-fit:contain;
}

.filter-count{
	min-width:20px;
	height:20px;
	padding:0 5px;
	border-radius:999px;
	background:#ef4444;
	color:#fff;
	font-size:12px;
	font-weight:700;
	display:flex;
	align-items:center;
	justify-content:center;
}

/* POPUP */
.filter-popup{
	position: fixed;
	inset: 0;
	width: 100%;
	height: 100vh;
	display:flex;
	align-items:center;
	justify-content:center;
	background: rgba(0,0,0,.45);
	z-index:100;
	opacity:0;
	visibility:hidden;
	transition:.25s;
	padding:20px;
}

.filter-popup.active{
	opacity:1;
	visibility:visible;
}

.filter-popup-inner{
	width:100%;
	max-width:520px;
	max-height:90vh;
	background:#fff;
	border-radius:4px;
	box-shadow:0 20px 60px rgba(0,0,0,.2);
	overflow-y:auto;
	position:relative;
}

.filter-popup .form-group{
    width: 100% !important;
    max-width: 490px !important;
}

.filter-popup .filter-popup-inner .form-group{
	border-radius:4px;
	border:1px solid #ddd;
	/* padding:0 14px; */
	background:#fff;
}

.filter-popup-close{
	position:absolute;
	top:16px;
	right:16px;
	width:36px;
	height:36px;
	border:none;
	border-radius:50%;
	color: #999;
	background:#f3f4f6;
	cursor:pointer;
	font-size:20px;
	font-weight:700;
	z-index: 100;
}

.filter-popup-inner .lable-filter{
	color: #2c2c2c;
	font-size: 26px;
	border-bottom: 2px solid #e5e7eb;
    padding-bottom: 10px;
}

.filter-popup-inner .filter-title{
	font-size: 18px;
	color: #2c2c2c;
    padding: 5px;
	font-weight: normal !important;
}

.filter-popup .form-group{
	border-bottom:1px solid #e5e7eb;
}

.filter-popup-footer{
	display:flex;
	justify-content:flex-end;
	margin-top:auto;
}

.tag-group{
    display:flex;
	flex-wrap: wrap;
	gap: 8px;
    padding: 4px;
	margin-top: 10px;
}
.tag-group .tag-btn{
	background: #f2f2f2;
    color: #2c2c2c;
	min-width: 67px;
    height: 38px;
	border-radius: 999px;
}

.tag-btn:hover{
	background:#e5e7eb;
}

.tag-btn.active{
	background:#e53935;
	color:#fff;
}

.range-filter-wrap{
	margin-bottom:20px;
}

.range-box{
	padding:12px 0 20px;
}

.range-inputs{
	width: 100%;
	display:flex;
	align-items:end;
	gap:12px;
	padding: 0 20px;
}

.range-col{
	flex:1;
}

.range-col label{
	display:block;
	font-size:14px;
	font-weight:normal;
	margin-bottom:8px;
	color:#2c2c2c;
}

.range-col input{
	width:100%;
	height:44px;
	border:1px solid #ddd;
	border-radius:4px;
	text-align:center;
	font-size:14px;
	font-weight:normal;
	background:#fff;
}

.range-arrow{
	font-size:24px;
	padding-bottom:8px;
	color:#666;
}

.slider-wrap{
	position:relative;
	height:40px;
}

.slider-wrap input[type="range"]{
	position:absolute;
	width:100%;
	left:0;
	top:0;
	pointer-events:none;
	background:none;
	appearance:none;
}

.slider-wrap input[type="range"]::-webkit-slider-thumb{
	appearance:none;
	width:24px;
	height:24px;
	border-radius:50%;
	background:#00a7b5;
	cursor:pointer;
	pointer-events:auto;
	border:none;
}

.slider-wrap input[type="range"]::-webkit-slider-runnable-track{
	height:6px;
	background:#00a7b5;
	border-radius:999px;
}

.range-box .range-inputs .range-col .slider-input-min-value{
	border: 1px solid #ddd;
}

.range-box .range-inputs .range-col .slider-input-max-value{
	border: 1px solid #ddd;
}

.re__slider-bar{
	position: relative;
	height: 6px;
	background: #dfe3e8;
	border-radius: 999px;
	margin-top: 20px;
	border: none !important;
}

.re__slider-bar .ui-slider-range{
	position: absolute;
	height: 100%;
	background: #00b6c7;
	border-radius: 999px;
}

.re__slider-bar .ui-slider-handle{
	position: absolute;
	top: 50%;
	transform: translate(-50%, -50%);
	width: 30px;
	height: 30px;
	border-radius: 50%;
	background: #00b6c7 !important;
	border: 4px solid #fff !important;
	box-shadow: 0 2px 10px rgba(0,0,0,.18);
	cursor: pointer;
	outline: none;
	transition: .2s;
}

.re__slider-bar .ui-slider-handle:hover{
	transform: translate(-50%, -50%) scale(1.08);
}

.re__slider-bar .ui-slider-handle:focus{
	outline: none;
	box-shadow: 0 0 0 4px rgba(0,182,199,.2);
}

.re__slider-bar{
	width:100%;
	max-width:430px;
	margin-left:auto;
	margin-right:auto;
}

.lable-filter{
	display:block;
	text-align:center;
	width:100%;
	margin-bottom:20px;
}

.filter-section{
	border-bottom:1px solid #e5e7eb;
	padding-bottom:10px;
	padding:24px;
}

.filter-line{
	padding-bottom:70px;
}

.filter-section:last-child{
	border-bottom:none;
	margin-bottom:10px;
	/* padding-bottom:0; */
}

.re__slider-bar .ui-slider-handle{
	will-change:left;
	transition:none !important;
}

body.dragging{
	cursor:grabbing;
	user-select:none;
}

.re__slider-bar{
	touch-action:pan-y;
}

.ui-slider-handle{
	touch-action:none;
}

.filter-popup-header{
    position: sticky;
    top: 0;
    z-index: 20;

    display:flex;
    align-items:center;
    justify-content:center;

    background:#fff;
    padding:16px 20px;
    border-bottom:1px solid #e5e7eb;
}

.filter-popup-header .lable-filter{
    margin:0;
    padding:0;
    border:none;
    font-size:24px;
    font-weight:600;
}

.filter-popup-header .filter-popup-close{
    position:absolute;
    right:16px;
    top:50%;
    transform:translateY(-50%);
}

body.popup-open{
	overflow:hidden !important;
	height:100vh;
	touch-action:none;
	overscroll-behavior:none;
}

.search-action-group{
	display:flex;
	align-items:center;
	gap:10px;
}

.search-submit-btn{
	margin-top:0 !important;
	width:auto !important;
	flex:1;
	height:48px;
}

.search-container{
	width: 100%;
}

.search-advance{
	width: 1260px;
    margin-left: auto;
    margin-right: auto;
}
@media (max-width: 768px){
	.search-action-group{
		width:100%;
	}

	.search-filter-btn{
		width:70px;
		flex-shrink:0;
		justify-content:center;
	}

	.search-submit-btn{
		width:100% !important;
	}

	.btn{
		width: 100%;
	}

    .filter-popup{
        position: fixed;
		inset: 0;
		display: flex ;
		align-items: center;
		justify-content: center;
		height: 100%;
    }

    .filter-popup-inner{
        width: 100%;
        max-width: 100%;
        max-height: 70vh;
        margin: 0 auto;
        border-radius: 4px;
        overflow-y: auto;
    }

	.re__slider-bar{
		width:100%;
		max-width:320px;
		margin-left:auto;
		margin-right:auto;
	}
}
</style>
<!-- Property search -->
<div class="search-container">
<form action="<?php bloginfo('url');?>" method="get" class="search-advance" id="form-search">
	<div class="form-group input-search">
		<label for="">
			<input type="text" class="form-control" name="s" placeholder="Nhập từ khóa...">
		</label>
	</div>

	<div class="filter-wrap">
		<!-- POPUP DESKTOP-->
		<div class="filter-popup" id="filterPopup">
			<div class="filter-popup-inner">
			
			<div class="filter-popup-header">
				<label class="lable-filter" > Bộ lọc </label>
				<button type="button" class="filter-popup-close" id="closeFilterPopup"> × </button>
			</div>


				<div class="filter-section filter-line">
					<div class="filter-tag-lable"> 
						<label class="filter-title"> Diện tích </label>
					</div>

					<div class="range-box">
						<div class="range-inputs">
							<div class="range-col">
								<label>Diện tích nhỏ nhất</label>
								<input class="slider-input-min-value" type="text" id="areaMinText" value="Từ">
							</div>
							<div class="range-arrow">→</div>
							<div class="range-col">
								<label>Diện tích lớn nhất</label>
								<input class="slider-input-max-value" type="text" id="areaMaxText" value="Đến">
							</div>
						</div>

						<input type="hidden" name="area_min" id="area_min">
						<input type="hidden" name="area_max" id="area_max">

						<div id="area-slider"
							class="re__slider-bar js__slider-bar ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
							<div class="ui-slider-range ui-corner-all ui-widget-header"></div>
							<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
							<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
						</div>
					</div>

					<div class="form-group tag-option-item">
						<label class="select-style">
							<select name="area_range" class="form-control">
								<option value="0">--- Diện tích ---</option>
								<option value="0-50">Dưới 50 m²</option>
								<option value="50-100">50 - 100 m²</option>
								<option value="100-150">100 - 150 m²</option>
								<option value="150-200">150 - 200 m²</option>
								<option value="200-300">200 - 300 m²</option>
								<option value="300-500">300 - 500 m²</option>
								<option value="500-max">Trên 500 m²</option>
							</select>
						</label>
					</div>
				</div>


				<div class="filter-section filter-line">
					<div class="filter-tag-lable"> 
						<label class="filter-title">Khoảng giá </label>
					</div>
					<div class="range-box">
						<div class="range-inputs">
							<div class="range-col">
								<label id="priceMinLabel">Giá thấp nhất</label>
								<input class="slider-input-min-value" type="text" id="priceMinText" placeholder="Từ ...">
							</div>
							<div class="range-arrow">→</div>
							<div class="range-col">
								<label id="priceMaxLabel">Giá cao nhất</label>
								<input class="slider-input-max-value" type="text" id="priceMaxText" placeholder="Đến ...">
							</div>
						</div>
						<input type="hidden" name="price_min" id="price_min">
						<input type="hidden" name="price_max" id="price_max">

						<div id="price-slider" class="re__slider-bar js__slider-bar ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
							<div class="ui-slider-range ui-corner-all ui-widget-header"></div>
							<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"> </span>
							<span tabindex="0"class="ui-slider-handle ui-corner-all ui-state-default"> </span>
						</div>
					</div>

					<div class="form-group">
						<label class="select-style">
							<select name="price_range" class="form-control">
								<option value="0">--- Mức giá ---</option>
								<option value="0-550">Dưới 550 triệu</option>
								<option value="550-800">550 - 800 triệu</option>
								<option value="800-1000">800 triệu - 1 tỷ</option>
								<option value="1000-2000">1 - 2 tỷ</option>
								<option value="2000-3000">2 - 3 tỷ</option>
								<option value="3000-5000">3 - 5 tỷ</option>
								<option value="5000-10000">5 - 10 tỷ</option>
								<option value="10000-20000">10 - 20 tỷ</option>
								<option value="20000-40000">20 - 40 tỷ</option>
								<option value="40000-60000">40 - 60 tỷ</option>
								<option value="60000-max">Trên 60 tỷ</option>
							</select>
						</label>
					</div>
				</div>

				<div class="filter-section">
					<div class="filter-tag-lable"> 
						<label class="filter-title"> Số phòng ngủ </label>
					</div>
					<div class="tag-group bedroom-group">
						<button type="button" class="tag-btn bedroom-btn" data-name="bedroom[]" data-value="6">Studio</button>
						<button type="button" class="tag-btn bedroom-btn" data-name="bedroom[]" data-value="1">1</button>
						<button type="button" class="tag-btn bedroom-btn" data-name="bedroom[]" data-value="7">1+</button>
						<button type="button" class="tag-btn bedroom-btn" data-name="bedroom[]" data-value="2">2</button>
						<button type="button" class="tag-btn bedroom-btn" data-name="bedroom[]" data-value="8">2+</button>
						<button type="button" class="tag-btn bedroom-btn" data-name="bedroom[]" data-value="3">3</button>
						<button type="button" class="tag-btn bedroom-btn" data-name="bedroom[]" data-value="4">4</button>
						<button type="button" class="tag-btn bedroom-btn" data-name="bedroom[]" data-value="5">5+</button>
					</div>
					<div id="bedroom-hidden-inputs"></div>
				</div>

				<div class="filter-section">
					<div class="filter-tag-lable"> 
						<label class="filter-title"> Số nhà vệ sinh </label>
					</div>
					<div class="tag-group bathroom-group">
						<button type="button" class="tag-btn bathroom-btn" data-name="bathroom[]" data-value="1">1</button>
						<button type="button" class="tag-btn bathroom-btn" data-name="bathroom[]" data-value="2">2</button>
						<button type="button" class="tag-btn bathroom-btn" data-name="bathroom[]" data-value="3">3</button>
						<button type="button" class="tag-btn bathroom-btn" data-name="bathroom[]" data-value="4">4</button>
						<button type="button" class="tag-btn bathroom-btn" data-name="bathroom[]" data-value="5">5+</button>
					</div>
					<div id="bathroom-hidden-inputs"></div>
				</div>

				<div class="filter-section">
					<div class="filter-tag-lable"> 
						<label class="filter-title"> Hướng nhà </label>
					</div>
					<div class="tag-group direction-group">
						<?php
							$property_direction = get_terms('property_direction');
							foreach ($property_direction as $term_direction) :
							?>
								<button type="button" class="tag-btn direction-btn" 
										data-name="direction_filter[]" 
										data-value="<?php echo $term_direction->term_id; ?>">
									<?php echo $term_direction->name; ?>
								</button>
							<?php endforeach; 
						?>
					</div>
					<div id="direction-hidden-inputs"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="" class="select-style">
			<select name="property_status" class="form-control" id="">
			<option value="0">-- Loại tin --</option>
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
			<option value="0">-- Loại BĐS --</option>
			<?php
			$property_type = get_terms('property_type');
			foreach ($property_type AS $term_type) :
				echo "<option value='".$term_type->slug."'".($_GET['property_type'] == $term_type->slug ? ' selected="selected"' : '').">".$term_type->name."</option>\n";
			endforeach;
			?>
			</select>
		</label>
	</div>
		<?php get_template_part('location/location_search'); ?>
			<input type="hidden" name="post_type" value="property">
			<input type="hidden" name="property_location" id="property_location">

		<div class="search-action-group">
			<button type="button" class="search-filter-btn" id="openFilter">
				<img src="<?php echo get_template_directory_uri(); ?>/img/filter.png" alt="filter" class="filter-icon">
				<span class="filter-count" id="filterCount">0</span>
			</button>

			<button type="submit" class="btn"><span class="ti-search"></span> Tìm kiếm</button>
		</div>
</form>
</div>
<!-- end Property search -->
 <script>
document.addEventListener('DOMContentLoaded', function(){
	const openBtn = document.getElementById('openFilter');
	const popup = document.getElementById('filterPopup');
	const countEl = document.getElementById('filterCount');
	const popupInner = document.querySelector('.filter-popup-inner');
	const closeBtn = document.getElementById('closeFilterPopup');

	function openPopup(){
		popup.classList.add('active');
		document.body.classList.add('popup-open');
		document.documentElement.classList.add('popup-open');
	}

	function closePopup(){
		popup.classList.remove('active');

		document.body.classList.remove('popup-open');
		document.documentElement.classList.remove('popup-open');
	}
	
	openBtn.addEventListener('click', function(e){
		e.stopPropagation();
		openPopup();
	});

	closeBtn.addEventListener('click', closePopup);

	['click', 'touchstart'].forEach(function(eventType){
		popup.addEventListener(eventType, function(e){
			if(e.target === popup){
				closePopup();
				e.stopPropagation();
			}
		});
	});
	function updateFilterCount(){
		let count = 0;
		const areaMin = parseInt(document.getElementById('area_min').value || 0);
		const areaMax = parseInt(document.getElementById('area_max').value || 500);
		const areaSelect = document.querySelector('select[name="area_range"]');
		const hasAreaFilter = (areaSelect.value !== '0') || (areaMin !== 0 || areaMax !== 500);
			if(hasAreaFilter){
				count++;
			}
		const priceMin = parseInt(document.getElementById('price_min').value || 0);
		const priceMax = parseInt(document.getElementById('price_max').value || 60000);
		const priceSelect = document.querySelector('select[name="price_range"]');
		const hasPriceFilter = (priceSelect.value !== '0') || (priceMin !== 0 || priceMax !== 60000);

			if(hasPriceFilter){
				count++;
			}
		const propertyStatus = document.querySelector('select[name="property_status"]');
			if(propertyStatus.value !== '0'){
				count++;
			}
		
		const propertyType = document.querySelector('select[name="property_type"]');

		
			if(propertyType.value !== '0'){
				count++;
			}
		

		const parentLocation = document.querySelector('#parent_location');
			if(parentLocation && parentLocation.value !== ''){
				count++;
			}

		const childLocation = document.querySelector('#child_location');
			if(childLocation && childLocation.value !== ''){
				count++;
			}
			if(document.querySelector('.bedroom-btn.active')){
				count++;
			}
			if(document.querySelector('.bathroom-btn.active')){
				count++;
			}
			if(document.querySelector('.direction-btn.active')){
				count++;
			}
			countEl.innerText = count;
		}

			
		window.updateFilterCount = updateFilterCount;
		document.querySelectorAll('#filterPopup select').forEach(function(select){

		const parentLocation = document.getElementById('parent_location');
		const childLocation = document.getElementById('child_location');

		if(parentLocation){
			parentLocation.addEventListener('change', updateFilterCount);
		}

		if(childLocation){
			childLocation.addEventListener('change', updateFilterCount);
		}

		document.querySelectorAll('select[name="property_status"], select[name="property_type"]').forEach(function(select){
			select.addEventListener('change', updateFilterCount);
		});

		select.addEventListener('change', function(){
		updateFilterCount();
	});
});
updateFilterCount();});
</script>

<script>
document.querySelectorAll('.bedroom-btn').forEach(function(btn){
	btn.addEventListener('click', function(){
		this.classList.toggle('active');
		renderHiddenInputs();
		updateFilterCount();
	});
});
function renderHiddenInputs(){
	const container = document.getElementById('bedroom-hidden-inputs');
		container.innerHTML = '';
		document .querySelectorAll('.bedroom-btn.active').forEach(function(btn){
			const input = document.createElement('input');
				input.type = 'hidden';
				input.name = btn.dataset.name;
				input.value = btn.dataset.value;
				container.appendChild(input);
		});
}
</script>

<script>
document.querySelectorAll('.bathroom-btn').forEach(function(btn){
	btn.addEventListener('click', function(){
		this.classList.toggle('active');
		renderBathroomInputs();
		updateFilterCount();
	});
});

function renderBathroomInputs(){
	const container = document.getElementById('bathroom-hidden-inputs');
	container.innerHTML = '';
	document.querySelectorAll('.bathroom-btn.active').forEach(function(btn){
		const input = document.createElement('input');
		input.type = 'hidden';
		input.name = btn.dataset.name;
		input.value = btn.dataset.value;
		container.appendChild(input);
	});
}
</script>

<script>
document.querySelectorAll('.direction-btn').forEach(function(btn){
	btn.addEventListener('click', function(){
		this.classList.toggle('active');
		renderDirectionInputs();
		updateFilterCount();
	});
});
function renderDirectionInputs(){
	const container =document.getElementById('direction-hidden-inputs');
	container.innerHTML = '';
	document.querySelectorAll('.direction-btn.active').forEach(function(btn){
		const input = document.createElement('input');
		input.type = 'hidden';
		input.name = btn.dataset.name;
		input.value = btn.dataset.value;
		container.appendChild(input);
	});
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
	const areaSlider = document.getElementById('area-slider');
	const areaHandles = areaSlider.querySelectorAll('.ui-slider-handle');
	const areaRange = areaSlider.querySelector('.ui-slider-range');
	const areaMinInput = document.getElementById('areaMinText');
	const areaMaxInput = document.getElementById('areaMaxText');
	const areaHiddenMin = document.getElementById('area_min');
	const areaHiddenMax = document.getElementById('area_max');
	const areaSelect = document.querySelector('select[name="area_range"]');
	const AREA_MAX = 500;
	let currentAreaMin = 0;
	let currentAreaMax = 500;
	let areaChanged = false;
	let isAreaMaxSelected = false;

	function formatArea(value){
		return value + ' m²';
	}

	function updateAreaSlider(firstLoad = false){
		const minPercent = (currentAreaMin / AREA_MAX) * 100;
		const maxPercent = (currentAreaMax / AREA_MAX) * 100;
		areaHandles[0].style.left = minPercent + '%';
		areaHandles[1].style.left = maxPercent + '%';
		areaRange.style.left = minPercent + '%';
		areaRange.style.width = (maxPercent - minPercent) + '%';

		if (!areaChanged) {
			areaMinInput.placeholder = 'Từ ...';
			areaMaxInput.placeholder = 'Đến ...';
			areaMinInput.value = '';
			areaMaxInput.value = '';
		} else {
			areaMinInput.value = currentAreaMin;
			areaMaxInput.value = currentAreaMax;
		}
		areaHiddenMin.value = currentAreaMin;
		areaHiddenMax.value = currentAreaMax;

		updateAreaLabels();
		updateFilterCount();
	}

	function updateAreaLabels(){
		const labelMin = document.querySelector('label[for="areaMinText"]') || areaMinInput.previousElementSibling;
		const labelMax = document.querySelector('label[for="areaMaxText"]') || areaMaxInput.previousElementSibling;

		if(!areaChanged){
			if(labelMin) labelMin.innerText = 'Diện tích nhỏ nhất';
			if(labelMax) labelMax.innerText = 'Diện tích lớn nhất';
			return;
		}
		if(labelMin){
			labelMin.innerText = 'Từ: ' + currentAreaMin + ' m²';
		}
		if(labelMax){
			labelMax.innerText = 'Đến: ' + currentAreaMax + ' m²';
		}
	}

	function dragAreaHandle(index){
		let isDragging = false;

		function move(clientX){
			const rect = areaSlider.getBoundingClientRect();
			let percent = (clientX - rect.left) / rect.width;
			percent = Math.max(0, Math.min(1, percent));
			let value = Math.round(percent * AREA_MAX);
			value = Math.round(value / 10) * 10;
			if(index === 0){
				currentAreaMin = Math.min(value, currentAreaMax - 10);
			}else{
				currentAreaMax = Math.max(value, currentAreaMin + 10);
			}
			areaChanged = true;
			updateAreaSlider();
		}

		function onMouseMove(e){
			if(!isDragging) return;
			move(e.clientX);
		}

		function onTouchMove(e){
			if(!isDragging) return;
			move(e.touches[0].clientX);
			e.preventDefault();
		}

		function stopDrag(){
			isDragging = false;
			document.removeEventListener('mousemove', onMouseMove);
			document.removeEventListener('mouseup', stopDrag);
			document.removeEventListener('touchmove', onTouchMove);
			document.removeEventListener('touchend', stopDrag);
			document.body.style.userSelect = '';
			document.body.style.cursor = '';
		}

		function startDrag(){
			isDragging = true;
			document.body.style.userSelect = 'none';
			document.addEventListener('mousemove', onMouseMove);
			document.addEventListener('mouseup', stopDrag);

			document.addEventListener('touchmove', onTouchMove, { passive:false });
			document.addEventListener('touchend', stopDrag);
		}
		areaHandles[index].addEventListener('mousedown', startDrag);
		areaHandles[index].addEventListener('touchstart', function(e){
			startDrag();
			e.preventDefault();
		}, { passive:false });
	}
	dragAreaHandle(0);
	dragAreaHandle(1);

	areaSelect.addEventListener('change', function(){
		const value = this.value;
			if(value === '0'){
				currentAreaMin = 0;
				currentAreaMax = AREA_MAX;
				areaChanged = false;
				isAreaMaxSelected = false;
				updateAreaSlider(true);
				updateFilterCount();
				return;
			}
		const arr = value.split('-');
		currentAreaMin = parseInt(arr[0]);
			if(arr[1] === 'max'){
				currentAreaMax = AREA_MAX;
				isAreaMaxSelected = true;

			}else{
				currentAreaMax = parseInt(arr[1]);
				isAreaMaxSelected = false;
			}
		areaChanged = true;
		updateAreaSlider();
		updateFilterCount();
	});
	updateAreaSlider(true);

	areaMinInput.addEventListener('input', function(){
		let value = this.value.replace(/\D/g, '');

		if(value === ''){
			currentAreaMin = 0;
			updateAreaSlider();
			updateFilterCount();
			return;
		}
		value = parseInt(value);

		if(value < 0){
			value = 0;
		}
		if(value > 500){
			value = 500;
		}
		if(value >= currentAreaMax){
			value = currentAreaMax - 5;
		}
		currentAreaMin = value;
		areaChanged = true;
		updateAreaSlider();
		updateFilterCount();
	});

	areaMaxInput.addEventListener('input', function(){
		let value = this.value.replace(/\D/g, '');

		if(value === ''){
			currentAreaMax = AREA_MAX;
			updateAreaSlider();
			updateFilterCount();
			return;
		}
		value = parseInt(value);
		if(value < 0){
			value = 0;
		}
		if(value > 500){
			value = 500;
		}
		if(value <= currentAreaMin){
			value = currentAreaMin + 5;	
		}
		currentAreaMax = value;
		areaChanged = true;
		updateAreaSlider();
		updateFilterCount();
	});

	const priceSlider = document.getElementById('price-slider');
	const priceHandles = priceSlider.querySelectorAll('.ui-slider-handle');
	const priceRange = priceSlider.querySelector('.ui-slider-range');
	const priceMinInput = document.getElementById('priceMinText');
	const priceMaxInput = document.getElementById('priceMaxText');
	const priceMinLabel = document.getElementById('priceMinLabel');
	const priceMaxLabel = document.getElementById('priceMaxLabel');
	const priceHiddenMin = document.getElementById('price_min');
	const priceHiddenMax = document.getElementById('price_max');
	const priceSelect = document.querySelector('select[name="price_range"]');
	const PRICE_MAX = 60000;
	let currentPriceMin = 0;
	let currentPriceMax = 60000;
	let priceChanged = false;
	let isPriceMaxSelected = false;
	let priceTouched = false;

	function formatPrice(value){
		if(value == 0){
			return '0 VNĐ';
		}
		if(value >= 1000){
			if(value % 1000 === 0){
				return (value / 1000) + ' Tỷ';
			}
			return (value / 1000).toFixed(1) + ' Tỷ';
		}
		return value + ' Triệu';
	}

	function formatLabelPrice(value){

	value = parseInt(value);

	if(!value || value <= 0){
		return '';
	}

	if(value < 1000){
		return value + ' triệu';
	}

	if(value % 1000 === 0){
		return (value / 1000) + ' tỷ';
	}

	return (value / 1000).toFixed(1) + ' tỷ';
}

	function updatePriceLabels() {
		if (!priceTouched) {
			priceMinLabel.innerText = 'Giá thấp nhất';
			priceMaxLabel.innerText = 'Giá cao nhất';
			return;
		}

		if (currentPriceMin === 0) {
			priceMinLabel.innerText = 'Từ: 0';
		} else {
			priceMinLabel.innerText = 'Từ: ' + formatLabelPrice(currentPriceMin);
		}
		if (currentPriceMax === PRICE_MAX) {
			priceMaxLabel.innerText = 'Đến: 60 tỷ';
		} else {
			priceMaxLabel.innerText = 'Đến: ' + formatLabelPrice(currentPriceMax);
		}
	}

	function updatePriceSlider(firstLoad = false){
		const minPercent = (currentPriceMin / PRICE_MAX) * 100;
		const maxPercent = (currentPriceMax / PRICE_MAX) * 100;

		priceHandles[0].style.left = minPercent + '%';
		priceHandles[1].style.left = maxPercent + '%';
		priceRange.style.left = minPercent + '%';
		priceRange.style.width = (maxPercent - minPercent) + '%';

		if (!priceTouched) {
			priceMinInput.placeholder = 'Từ ...';
			priceMinInput.value = '';
		} else {
			priceMinInput.value = currentPriceMin;
		}

		if (!priceTouched) {
			priceMaxInput.placeholder = 'Đến ...';
			priceMaxInput.value = '';
		} else {
			priceMaxInput.value = currentPriceMax;
		}

		priceHiddenMin.value = currentPriceMin;
		priceHiddenMax.value = currentPriceMax;

		updatePriceLabels();
		updateFilterCount();
	}

	function dragPriceHandle(index){
		let isDragging = false;

			function move(clientX){
				const rect = priceSlider.getBoundingClientRect();
				let percent = (clientX - rect.left) / rect.width;
				percent = Math.max(0, Math.min(1, percent));
				let value = Math.round(percent * PRICE_MAX);
				value = Math.round(value / 50) * 50;
				if(index === 0){
					currentPriceMin = Math.min(value, currentPriceMax - 50);
				}else{
					currentPriceMax = Math.max(value, currentPriceMin + 50);
				}
				priceTouched = true;
				updatePriceSlider();
			}

			function onMouseMove(e){
				if(!isDragging) return;
				move(e.clientX);
			}

			function onTouchMove(e){
				if(!isDragging) return;

				move(e.touches[0].clientX);

				e.preventDefault();
			}

			function stopDrag(){
				isDragging = false;
				document.removeEventListener('mousemove', onMouseMove);
				document.removeEventListener('mouseup', stopDrag);
				document.removeEventListener('touchmove', onTouchMove);
				document.removeEventListener('touchend', stopDrag);
				document.body.style.userSelect = '';
				document.body.style.cursor = '';
			}

			function startDrag(){
				isDragging = true;
				document.body.style.userSelect = 'none';
				document.addEventListener('mousemove', onMouseMove);
				document.addEventListener('mouseup', stopDrag);
				document.addEventListener('touchmove', onTouchMove, { passive:false });
				document.addEventListener('touchend', stopDrag);
			}
			priceHandles[index].addEventListener('mousedown', startDrag);
			priceHandles[index].addEventListener('touchstart', function(e){
				startDrag();
				e.preventDefault();
			}, { passive:false });
		}

		dragPriceHandle(0);
		dragPriceHandle(1);

	priceSelect.addEventListener('change', function(){

		priceTouched = true;
		const value = this.value;
		if(value === '0'){
			priceTouched = false;
			currentPriceMin = 0;
			currentPriceMax = PRICE_MAX;
			priceChanged = false;
			isPriceMaxSelected = false;
			updatePriceSlider(true);
			updateFilterCount();
			return;
		}

		const arr = value.split('-');
		currentPriceMin = parseInt(arr[0]);

		if(arr[1] === 'max'){
			currentPriceMax = PRICE_MAX;
			isPriceMaxSelected = true;
		}else{
			currentPriceMax = parseInt(arr[1]);
			isPriceMaxSelected = false;
		}
		priceChanged = true;
		updatePriceSlider();
		updateFilterCount();
	});

	updatePriceSlider(true);

	priceMinInput.addEventListener('input', function(){

		let value = this.value.replace(/\D/g, '');

		priceTouched = true;

		if(value === ''){

			currentPriceMin = 0;

			updatePriceSlider();
			updateFilterCount();

			return;
		}

		if(parseInt(value) > 60000){
			value = 60000;
		}
		currentPriceMin = parseInt(value);

		updatePriceSlider();
		updateFilterCount();
	});

	priceMaxInput.addEventListener('input', function(){

		let value = this.value.replace(/\D/g, '');
		priceTouched = true;

		if(value === ''){

			currentPriceMax = PRICE_MAX;

			updatePriceSlider();
			updateFilterCount();

			return;
		}

		if(parseInt(value) > 60000){
			value = 60000;
		}
		currentPriceMax = parseInt(value);

		updatePriceSlider();
		updateFilterCount();
	});
});
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

    $('#form-search .btn').click(function(e){
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
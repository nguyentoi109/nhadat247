<?php if ( wp_is_mobile() ){ ?>
<div class="clear" style="margin-top: 20px;"></div>
<?php } ?>
<h2 class="title-block">Tính lãi suất Ngân hàng</h2>
<div class="form-tinh-lai clear">
	<div class="row">
		<input type="text" id="devvn_money" value="" placeholder="Số tiền vay">
	</div>
	<div class="row">
		<div class="left">
			<input type="text" id="devvn_interest" maxlength="5" value="" placeholder="Lãi suất (0%)">
		</div>
		<div class="right">
			<select id="devvn_time">
			  <option value="1" selected="selected">Tháng</option>
			  <option value="2">Năm</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="left">
			<input type="text" id="devvn_deadline" maxlength="2" value="" placeholder="Thời hạn vay">
		</div>
		<div class="right">
			<select id="devvn_time2">
			  <option value="1" selected="selected">Tháng</option>
			  <option value="2">Năm</option>
			</select>
		</div>		
	</div>
	<div class="row">
		<select id="devvn_type">
			<option value="3" select="select" selected="selected">Trả góp theo dư nợ giảm dần</option>
			<!--<option value="1">Trả góp đều hàng tháng theo lãi suất kép</option>-->
			<option value="2">Trả góp đều hàng tháng</option>
		</select>
	</div>
	<div class="row"><button type="button" id="devvn_pc_interest">Tính ngay</button></div>	
</div>

<!--Tính-->
<div id="devvn_caculated" class="devvn_modal" style="display: none; left: 249.5px; position: absolute; top: -854px; z-index: 10000001; opacity: 1;">
  <div class="devvn_caculated_box">
    <div class="devvn_caculated_header">
      <h3 style="text-align: center;"><span style="color: #0f7a65;"><strong>SỐ TIỀN THANH TOÁN HÀNG THÁNG</strong></span></h3>
    </div>
    <div class="devvn_caculated_body">
      <div class="devvn_caculated_body_left">
        <div class="devvn_caculated_body_col"> <span>TỔNG TIỀN PHẢI TRẢ<br>
          (GỐC + LÃI)</span>
          <p class="all-money"></p>
        </div>
        <div class="devvn_caculated_body_col"> <span>TỔNG TIỀN GỐC PHẢI TRẢ</span>
          <p class="before-money"></p>
        </div>
        <div class="devvn_caculated_body_col"> <span>TỔNG TIỀN LÃI PHẢI TRẢ</span>
          <p class="all-interest"></p>
        </div>
      </div>
      <div class="devvn_content_table">
        <table>
          <thead>
            <tr>
              <td>Tháng</td>
              <td>Tiền gốc còn lại</td>
              <td>Tiền gốc trả hàng tháng</td>
              <td>Lãi trả hàng tháng</td>
              <td>Tổng tiền trả hàng tháng</td>
            </tr>
          </thead>
          <tbody id="devvn_content_value">
            <tr class="number-total-money">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="devvn_caculated_footer">
      <button type="button" class="devvn_caculated_close">Close</button>
    </div>
  </div>
</div>

<link rel="stylesheet" id="devvn-laivay-style-css" href="<?php echo get_template_directory_uri(); ?>/js/tinh_lai_suat/devvn-laivay.css" type="text/css" media="all">
<!--<link rel="stylesheet" id="twentytwelve-style-css" href="<?php echo get_template_directory_uri(); ?>/js/tinh_lai_suat/style_003.css" type="text/css" media="all">-->
<!--<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/tinh_lai_suat/jquery.js"></script>-->

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/tinh_lai_suat/wp-util.js"></script> 

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/tinh_lai_suat/jquery_004.js"></script> 

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/tinh_lai_suat/devvn-laivay.js"></script>  


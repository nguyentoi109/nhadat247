<style>
  /* =========================
   STYLE CHO FORM TÍNH LÃI SUẤT
   ========================= */

.form-tinh-lai {
    max-width: 1100px;
    margin: 40px auto;
    background: #fff;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    box-sizing: border-box;
}

.form-tinh-lai .title-block {
    text-align: center;
    font-size: 24px;
    font-weight: normal;
    font-family: 'Lexend', Roboto, Arial !important;
    color: #e03c31;
    margin-bottom: 30px;
}

.form-tinh-lai .row {
    margin-bottom: 20px;
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.form-tinh-lai .left,
.form-tinh-lai .right {
    flex: 1;
}

.form-tinh-lai input,
.form-tinh-lai select {
    width: 100% !important;
    height: 50px !important;
    border: 1px solid #ddd !important;
    border-radius: 12px !important;
    padding: 0 16px !important;
    font-size: 15px !important;
    background: #fff !important;
    box-sizing: border-box;
    transition: all 0.3s ease;
}

.form-tinh-lai input:focus,
.form-tinh-lai select:focus {
    border-color: #e03c31 !important;
    box-shadow: 0 0 0 3px rgba(224, 60, 49, 0.1);
    outline: none;
}

#devvn_pc_interest {
    width: 100%;
    height: 52px;
    background: #e03c31;
    color: #fff;
    border: none;
    border-radius: 12px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    transition: 0.3s;
}

#devvn_pc_interest:hover {
    background: #c12a22;
}

/* =========================
   MODAL RESULT
   ========================= */

.devvn_modal {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.6);
    overflow-y: auto;
    padding: 40px 15px;
    box-sizing: border-box;
}

.devvn_caculated_box {
    max-width: 1200px;
    margin: auto;
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.devvn_caculated_header {
    padding: 25px;
    border-bottom: 1px solid #eee;
    background: #fff;
}

.devvn_caculated_header h3 {
    margin: 0;
    font-size: 28px;
}

.devvn_caculated_body {
    padding: 30px;
}

.devvn_caculated_body_left {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.devvn_caculated_body_col {
    flex: 1;
    min-width: 220px;
    background: #f8f9fa;
    border-radius: 16px;
    padding: 25px;
    text-align: center;
    border: 1px solid #eee;
}

.devvn_caculated_body_col span {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #666;
    margin-bottom: 12px;
}

.devvn_caculated_body_col p {
    margin: 0;
    font-size: 24px;
    font-weight: 700;
    color: #e03c31;
}

/* =========================
   TABLE
   ========================= */

.devvn_content_table {
    overflow-x: auto;
}

.devvn_content_table table {
    width: 100%;
    border-collapse: collapse;
    min-width: 900px;
}

.devvn_content_table thead {
    background: #e03c31;
    color: #fff;
}

.devvn_content_table thead td {
    padding: 15px;
    font-weight: 700;
    text-align: center;
}

.devvn_content_table tbody td {
    padding: 14px;
    border-bottom: 1px solid #eee;
    text-align: center;
    font-size: 14px;
}

.devvn_content_table tbody tr:hover {
    background: #f9f9f9;
}

/* =========================
   FOOTER BUTTON
   ========================= */

.devvn_caculated_footer {
    padding: 25px;
    text-align: center;
    border-top: 1px solid #eee;
}

.devvn_caculated_close {
    background: #e03c31;
    color: #fff;
    border: none;
    padding: 12px 28px;
    border-radius: 10px;
    font-weight: 700;
    cursor: pointer;
    transition: 0.3s;
}

.devvn_caculated_close:hover {
    background: #c12a22;
}

/* =========================
   MOBILE
   ========================= */

@media (max-width: 768px) {

    .form-tinh-lai {
        padding: 25px;
    }

    .form-tinh-lai .row .left,
    .form-tinh-lai .row .right {
        flex: 1;
    }

    .form-tinh-lai .row {
        flex-direction: row !important;
    }

    .devvn_caculated_body_left {
        flex-direction: column;
    }

    .devvn_caculated_header h3 {
        font-size: 22px;
    }

    .devvn_caculated_body_col p {
        font-size: 20px;
    }
}
</style>
<?php if ( wp_is_mobile() ){ ?>
<div class="clear" style="margin-top: 20px;"></div>
<?php } ?>
<div class="form-tinh-lai clear">
  <h2 class="title-block">Tính lãi suất Ngân hàng</h2>
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


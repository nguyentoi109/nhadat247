<?php
if (!defined('ABSPATH')) exit;
?>

<div class="ql-panel-header">
  <h2 class="ql-panel-title">Quản lý khách hàng</h2>
</div>

<div class="ql-panel-body">

  <div style="display:flex;gap:8px;margin-bottom:16px;flex-wrap:wrap;align-items:center;">
    <div style="position:relative;">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2"
           style="position:absolute;left:10px;top:50%;transform:translateY(-50%);">
        <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35" stroke-linecap="round"/>
      </svg>
      <input class="ql-form-input" style="padding-left:32px;width:220px;"
             type="text" placeholder="Tìm theo tên, số điện thoại...">
    </div>
    <select class="ql-form-input" style="width:140px;">
      <option value="">Tất cả trạng thái</option>
      <option value="new">Khách mới</option>
      <option value="contacted">Đã liên hệ</option>
      <option value="closed">Đã chốt</option>
    </select>
  </div>

  <div style="overflow-x:auto;">
    <table class="ql-table">
      <thead>
        <tr>
          <th>Khách hàng</th>
          <th>Số điện thoại</th>
          <th>Quan tâm đến</th>
          <th>Ngày liên hệ</th>
          <th>Trạng thái</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td colspan="6">
            <div class="ql-empty" style="padding:40px 0;">
              <svg class="ql-empty-icon" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8z" stroke-linecap="round"/>
              </svg>
              <div class="ql-empty-title">Chưa có khách hàng nào</div>
              <div class="ql-empty-desc">Khách hàng quan tâm đến tin của bạn sẽ hiển thị ở đây.</div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>  
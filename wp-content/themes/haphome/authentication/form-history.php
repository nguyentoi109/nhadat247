<style>
.history-list {
  max-height: 320px;
  overflow-y: auto;
  margin: 12px 0;
  text-align: left;
}
.history-item {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 4px;
  border-bottom: 1px solid #f3f4f6;
}
.history-item:last-child {
  border-bottom: none;
}
.history-icon {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.history-icon.created {
  background: #eff6ff;
  color: #2563eb;
}
.history-icon.vip {
  background: #fef3c7;
  color: #b45309;
}
.history-icon.repost {
  background: #ecfdf5;
  color: #059669;
}
.history-info {
  flex: 1;
  min-width: 0;
}
.history-label {
  font-size: 13px;
  font-weight: 600;
  color: #111827;
}
.history-date {
  font-size: 12px;
  color: #9ca3af;
  margin-top: 1px;
}
.history-extra {
  font-size: 12px;
  font-weight: 700;
  color: #e84118;
  white-space: nowrap;
}
.history-loading,
.history-empty {
  text-align: center;
  color: #9ca3af;
  font-size: 13px;
  padding: 20px 0;
}

</style>
<section class="section-form-history">
    <div class="vip-icon">
        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3" stroke-linecap="round"/>
        </svg>
    </div>

    <div class="vip-title">
        Lịch sử tin đăng
    </div>

    <div class="vip-error" id="history-popup-error"></div>

    <div class="history-list" id="history-popup-list">
        <div class="history-loading">Đang tải...</div>
    </div>

    <input type="hidden" id="history-popup-post-id" value="">

    <div class="vip-actions">
        <button type="button" class="btn-vip-cancel close-history-popup">Đóng</button>
    </div>
</section>
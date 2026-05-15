<?php
/*
Template Name: Trang Chuyển Đổi Địa Chỉ
*/
get_header(); ?>

<style>
    .converter-section { 
        background: rgb(203 174 123 / 1%) 0%;
        padding: 50px 10px; 
        clear: both; 
        display: block;
        width: 100%;
        box-sizing: border-box;
    }
    
    .cv-wrapper { 
        max-width: 1100px; 
        margin: 0 auto; 
        background: #fff; 
        padding: 40px; 
        border-radius: 20px; 
        border: 2px solid rgb(222, 190, 32);
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        box-sizing: border-box;
        box-shadow: 0 0 0 4px rgba(222, 190, 32, 0.12),
            0 10px 30px rgba(0,0,0,0.08);
    }

    .cv-title { 
        font-weight: normal; 
        margin-bottom: 25px; 
        font-size: 24px; 
        color: var(--title-post); 
        text-align: center;
    }

    .cv-grid-row { 
        display: flex; 
        flex-wrap: wrap; 
        margin: 0 -10px; 
    }

    .cv-col-12 { width: 100%; padding: 0 10px; margin-bottom: 20px; box-sizing: border-box; }
    .cv-col-4 { width: 33.333%; padding: 0 10px; margin-bottom: 20px; box-sizing: border-box; }

    .cv-group label { 
        display: block; 
        margin-bottom: 10px; 
        font-weight: 600; 
        font-size: 15px;
        color: #444;
    }

    .cv-input { 
        width: 100% !important; 
        height: 48px !important; 
        padding: 0 15px !important; 
        border: 1px solid #ddd !important; 
        border-radius: 10px !important; 
        background: #fff !important;
        box-sizing: border-box !important;
        font-size: 15px !important;
        color: #333 !important;
        display: block !important;
        float: none !important;
    }

    textarea.cv-input { 
        height: 45px !important; 
        line-height: 2.8;
    }

    .cv-btn-area { 
        display: flex;
        justify-content: flex-end; 
        gap: 15px; 
        margin-top: 20px; 
        clear: both;
    }

    .btn-main { 
        background: var(--btn) !important; 
        color: var(--btn-text) !important; 
        border: none !important; 
        padding: 12px 25px !important; 
        border-radius: 10px !important; 
        cursor: pointer !important; 
        font-weight: 600 !important; 
        transition: 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
  .btn-main:hover { 
    background: var(--btn) !important; 
    opacity: 0.9; 
}

    .btn-sub { 
        background: #ffffff !important; 
        color: #333333 !important; 
        border: 1px solid #cccccc !important; 
        padding: 12px 25px !important; 
        border-radius: 10px !important; 
        cursor: pointer !important; 
        font-weight: 500 !important;
        display: inline-flex !important; 
        align-items: center;
        gap: 8px;
        transition: 0.3s;
    }
    .btn-sub:hover { 
        background: #f8f9fa !important; 
        border-color: #999999 !important; 
    }

    .result-box { 
        margin-top: 40px; 
        display: none; 
        border-top: 2px dashed #eee; 
        padding-top: 30px; 
    }
    
    .res-title {
        text-align: center;
        font-weight: normal;
        font-size: 24px;
        margin-bottom: 25px;
        color: var(--title-post);
    }

.res-grid { 
    display: flex !important; 
    gap: 20px; 
    align-items: stretch; 
    margin-top: 25px;
}

.res-card { 
    flex: 1; 
    padding: 25px; 
    border-radius: 15px; 
    position: relative; 
    border: 1px solid #eee; 
    box-sizing: border-box;
    display: flex;
    flex-direction: column; 
}

.card-old { 
    background: #fff5f5 !important;
    border-color: #f5c2c7 !important; 
}

.card-old h4 { 
    color: #e03c31 !important;
    margin: 0 0 15px 0; 
    font-weight: 700; 
    font-size: 19px;
    border-bottom: 2px solid rgba(224, 60, 49, 0.1); 
    padding-bottom: 10px;
}

#old_p, #old_d, #old_w { 
    color: #e03c31 !important; 
    font-weight: 600; 
}
.card-new { 
    background: #f8fff9; 
    border-color: #d1e7dd; 
}

#new_p { 
    color: #157347 !important; 
    font-weight: 700;
}

#new_w { 
    color: #157347; 
    font-weight: 800; 
    font-size: 1.1em; 
}

.res-card h4 { 
    margin: 0 0 15px 0; 
    font-weight: 700; 
    font-size: 19px;
    border-bottom: 2px solid rgba(0,0,0,0.05); 
    padding-bottom: 10px;
}

.res-card p b {
    color: #555;
    font-weight: 600;
}

#old_p, #old_d, #old_w { color: #666; font-weight: 500; }

#new_p { color: #2c3e50; }
#new_w { color: #157347; font-size: 1.1em; }

.cv-badge {
    display: inline-block;
    padding: 5px 12px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 600;
    margin: 2px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}
.badge-province { background: #e7f1ff; color: #0d6efd; border: 1px solid #cfe2ff; }
.badge-ward { background: #fff3cd; color: #856404; border: 1px solid #ffeeba; }

.mapping-label {
    display: block;
    margin: 15px 0 8px 0;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #888;
}
    .res-card h4 { 
        margin: 0 0 15px 0; 
        font-weight: 700; 
        border-bottom: 1px solid rgba(0,0,0,0.05); 
        padding-bottom: 10px;
    }
    .res-card p { margin: 10px 0; font-size: 15px; line-height: 1.6; }
    
    .tag-date { 
        position: absolute; 
        top: 15px; 
        right: 20px; 
        font-size: 11px; 
        opacity: 0.7; 
        font-weight: 600;
    }
    .cv-grid-row { 
        display: flex !important; 
        flex-wrap: nowrap !important; 
        margin: 0 -10px; 
        gap: 0; 
        margin-top: 20px !important;
    }

    .cv-col-4 { 
        width: 33.333% !important; 
        padding: 0 10px; 
        margin-bottom: 20px; 
        box-sizing: border-box !important;
        flex-shrink: 0; 
    }

    .cv-group {
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .cv-input { 
        width: 100% !important; 
        box-sizing: border-box !important;
    }

    .cv-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }
    .badge-province { background: #e8f5e9; color: #2e7d32; border: 1px solid #c8e6c9; }
    .badge-ward { background: #fff3e0; color: #ef6c00; border: 1px solid #ffe0b2; }

    @media (max-width: 600px) {
        .cv-grid-row { 
            flex-wrap: wrap !important; 
        }
        .cv-col-4 { 
            width: 100% !important; 
        }
        .res-grid {
        flex-direction: column !important;
        gap: 15px;
        }
    }
    
</style>

<div class="converter-section">
    <div class="cv-wrapper">
        <h2 class="cv-title">Nhập thông tin địa chỉ</h2>
        
        <div class="cv-main-form">
            <!-- <div class="cv-row">
                <div class="cv-group full-width">
                    <label>Địa chỉ đường phố</label>
                    <textarea id="street_input" class="cv-input" rows="2" placeholder="Nhập hoặc dán vào địa chỉ chi tiết"></textarea>
                </div>
            </div> -->

            <div class="cv-grid-row">
                <div class="cv-col-4">
                    <label>Tỉnh/Thành phố *</label>
                    <select id="province" class="cv-input">
                        <option value="">Chọn Tỉnh</option>
                    </select>
                </div>
                <div class="cv-col-4">
                    <label>Quận/Huyện *</label>
                    <select id="district" class="cv-input" disabled>
                        <option value="">Chọn Quận/Huyện</option>
                    </select>
                </div>
                <div class="cv-col-4">
                    <label>Phường/Xã *</label>
                    <select id="ward" class="cv-input" disabled>
                        <option value="">Chọn Phường/Xã</option>
                    </select>
                </div>
            </div>

            <div class="cv-btn-area">
                <button class="btn-main" onclick="processConvert()">
                    <i class="ti-exchange-vertical"></i> Chuyển đổi địa chỉ
                </button>
                <button class="btn-sub" onclick="location.reload()">
                    <i class="ti-reload"></i> Đặt lại
                </button>
            </div>
        </div>

       <div id="result_box" class="result-box">
            <h3 class="res-title">Kết quả chuyển đổi</h3>
            <div class="res-grid">
                <div class="res-card card-old">
                    <h4 style="color: #6c757d;">Địa chỉ cũ</h4>
                    <p>
                        <b>Địa chỉ:</b> 
                        <span id="old_w"></span>, 
                        <span id="old_d"></span>, 
                        <span id="old_p"></span>
                    </p>
                </div>

                <div class="res-card card-new">
                    <!-- <span class="tag-date">Sau 01/07/2025</span> -->
                    <h4 style="color: #198754;">Địa chỉ mới</h4> 
                    <p>
                        <b>Địa chỉ:</b> 
                        <span id="new_w" style="font-weight: 800;"></span>, 
                        <span id="new_p" style="font-weight: 700;"></span>
                    </p>
                    
                    <div id="mapping_details">
                        <span class="mapping-label">Nguồn gốc gộp tỉnh</span>
                        <div id="merged_p_list"></div>
                        
                        <span class="mapping-label">Các đơn vị cũ sát nhập</span>
                        <div id="merged_w_list"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const jsonPath = "<?php echo get_template_directory_uri(); ?>/data/apivn.json";
const mappingPath = "<?php echo get_template_directory_uri(); ?>/data/address_mapping_final.json";

let fullData = [];    
let mappingData = [];

async function initData() {
    try {
        const [resStandard, resMapping] = await Promise.all([
            fetch(jsonPath),
            fetch(mappingPath)
        ]);
        
        fullData = await resStandard.json();
        mappingData = await resMapping.json();
        
        let row = `<option value="">Chọn Tỉnh/Thành phố</option>`;
        fullData.forEach(province => {
            row += `<option value="${province.code}">${province.name}</option>`;
        });
        document.getElementById("province").innerHTML = row;
        
        console.log("Hệ thống đã sẵn sàng!");
    } catch (error) {
        console.error("Lỗi khi tải dữ liệu:", error);
        alert("Không thể tải dữ liệu địa chỉ. Vui lòng kiểm tra lại đường dẫn file JSON.");
    }
}
initData();

document.getElementById("province").addEventListener("change", function() {
    const provinceCode = parseInt(this.value);
    const districtSelect = document.getElementById("district");
    const wardSelect = document.getElementById("ward");

    districtSelect.innerHTML = `<option value="">Chọn Quận/Huyện</option>`;
    wardSelect.innerHTML = `<option value="">Chọn Phường/Xã</option>`;
    districtSelect.disabled = true;
    wardSelect.disabled = true;

    if (provinceCode) {
        const selectedProvince = fullData.find(p => p.code === provinceCode);
        if (selectedProvince && selectedProvince.districts) {
            let row = `<option value="">Chọn Quận/Huyện</option>`;
            selectedProvince.districts.forEach(d => {
                row += `<option value="${d.code}">${d.name}</option>`;
            });
            districtSelect.innerHTML = row;
            districtSelect.disabled = false;
        }
    }
});

document.getElementById("district").addEventListener("change", function() {
    const provinceCode = parseInt(document.getElementById("province").value);
    const districtCode = parseInt(this.value);
    const wardSelect = document.getElementById("ward");

    wardSelect.innerHTML = `<option value="">Chọn Phường/Xã</option>`;
    wardSelect.disabled = true;

    if (districtCode) {
        const selectedProvince = fullData.find(p => p.code === provinceCode);
        const selectedDistrict = selectedProvince.districts.find(d => d.code === districtCode);

        if (selectedDistrict && selectedDistrict.wards) {
            let row = `<option value="">Chọn Phường/Xã</option>`;
            selectedDistrict.wards.forEach(w => {
                row += `<option value="${w.code}">${w.name}</option>`;
            });
            wardSelect.innerHTML = row;
            wardSelect.disabled = false;
        }
    }
});

function processConvert() {
    const pSelect = document.getElementById("province");
    const dSelect = document.getElementById("district");
    const wSelect = document.getElementById("ward");

    if (!pSelect.value || !dSelect.value || !wSelect.value) {
        alert("Vui lòng chọn đầy đủ thông tin!");
        return;
    }

    const oldProvinceName = pSelect.options[pSelect.selectedIndex].text.trim();
    const oldWardName = wSelect.options[wSelect.selectedIndex].text.trim();

    const match = mappingData.find(item => {
        const provinceMatch = item.provinces_merged_from.some(p => p.trim() === oldProvinceName);
        const wardMatch = item.old_wards_list.some(w => {
            let cleanOldWard = w.split('(')[0].trim();
            return cleanOldWard === oldWardName || w.trim() === oldWardName;
        });
        return provinceMatch && wardMatch;
    });

    document.getElementById("result_box").style.display = "block";
    
    document.getElementById("old_p").innerText = oldProvinceName;
    document.getElementById("old_d").innerText = dSelect.options[dSelect.selectedIndex].text;
    document.getElementById("old_w").innerText = oldWardName;

    const mergedPContainer = document.getElementById("merged_p_list");
    const mergedWContainer = document.getElementById("merged_w_list");
    mergedPContainer.innerHTML = ""; 
    mergedWContainer.innerHTML = ""; 

    if (match) {
        document.getElementById("new_p").innerText = match.new_province;
        document.getElementById("new_w").innerText = match.new_ward;

        match.provinces_merged_from.forEach(p => {
            mergedPContainer.innerHTML += `<span class="cv-badge badge-province">${p.trim()}</span>`;
        });

        match.old_wards_list.forEach(w => {
            mergedWContainer.innerHTML += `<span class="cv-badge badge-ward">${w.trim()}</span>`;
        });
        
        document.getElementById("mapping_details").style.display = "block";
    } else {
        document.getElementById("new_p").innerText = oldProvinceName;
        document.getElementById("new_w").innerText = oldWardName + " (Không đổi)";
        document.getElementById("mapping_details").style.display = "none";
    }

    document.getElementById("result_box").scrollIntoView({ behavior: 'smooth', block: 'start' });
}
</script>

<?php get_footer(); ?>
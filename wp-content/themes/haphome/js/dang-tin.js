var dtST = {};
var BLOCKS = 7;
var unlocked = [1];
var completed = [];
var dtMainImg = null;
var _dtMap = null;

function isUnlocked(n) {
	return unlocked.indexOf(n) !== -1;
}

function dtToggle(n) {
	if (!isUnlocked(n)) return;
	var body = document.getElementById('body-' + n);
	var arr = document.getElementById('arr-' + n);
	var open = body.classList.contains('open');
	for (var i = 1; i <= BLOCKS; i++) {
		var b = document.getElementById('body-' + i);
		if (b) b.classList.remove('open');
		var a = document.getElementById('arr-' + i);
		if (a) a.classList.remove('open');
	}
	if (!open) {
		body.classList.add('open');
		arr.classList.add('open');
		setTimeout(function() {
			document.getElementById('block-' + n).scrollIntoView({
				behavior: 'smooth',
				block: 'start'
			});
		}, 50);
	}
}

function dtUnlock(n) {
	if (isUnlocked(n)) return;
	unlocked.push(n);
	var card = document.getElementById('block-' + n);
	if (card) {
		card.classList.remove('is-locked');
		card.classList.add('is-active');
	}
	var nav = document.getElementById('step-' + n + '-nav');
	if (nav) nav.classList.remove('locked');
}

function dtMarkDone(n) {
	var nav = document.getElementById('step-' + n + '-nav');
	if (nav) {
		nav.classList.remove('s-active');
		nav.classList.add('s-done');
		var num = nav.querySelector('.dt-prog-num');
		if (num) num.innerHTML = '✓';
	}
	if (completed.indexOf(n) === -1) completed.push(n);
}

function dtNext(n) {
	dtMarkDone(n);
	dtUnlock(n + 1);

	var cb = document.getElementById('body-' + n);
	if (cb) cb.classList.remove('open');
	var ca = document.getElementById('arr-' + n);
	if (ca) ca.classList.remove('open');

	if (n + 1 <= BLOCKS) {
		var nb = document.getElementById('body-' + (n + 1));
		if (nb) nb.classList.add('open');
		var na = document.getElementById('arr-' + (n + 1));
		if (na) na.classList.add('open');
		var nn = document.getElementById('step-' + (n + 1) + '-nav');
		if (nn) {
			nn.classList.remove('locked');
			nn.classList.add('s-active');
		}
		var nc = document.getElementById('block-' + (n + 1));
		if (nc) setTimeout(function() {
			nc.scrollIntoView({
				behavior: 'smooth',
				block: 'start'
			});
		}, 100);
	}

	if (n === 1) _initDtMap();
}

function _initDtMap() {
	if (_dtMap) return;

	_dtMap = window.HereMapbox.initEdit({
		mapEl: 'dt-map',
		searchEl: 'map-search',
		suggestEl: 'map-suggest',
		latEl: 'map-lat',
		lngEl: 'map-lng',
		addressEl: 'map-addr',
		iconUrl: window.dtLocationIconUrl || '',
		hereKey: window.dtHereKey || '',
		mapboxToken: window.dtMapboxToken || '',
		mapboxStyle: window.dtMapboxStyle || 'mapbox://styles/mapbox/streets-v12',
		existingLat: 0,
		existingLng: 0,
	});
}

function dtSetMode(mode) {
	document.getElementById('dt-mode-val').value = mode;
	document.getElementById('tab-bds').classList.toggle('active', mode === 'bds');
	document.getElementById('tab-duan').classList.toggle('active', mode === 'du_an');
	document.getElementById('sec-bds').style.display = (mode === 'bds') ? '' : 'none';
	document.getElementById('sec-duan').style.display = (mode === 'du_an') ? '' : 'none';
	document.getElementById('pt-val').value = '';
	document.getElementById('dev-val').value = '';
	document.getElementById('sum-1').textContent = '';
}

function dtSelectType(el) {
	document.querySelectorAll('[data-g="property_type"]').forEach(function(c) {
		c.classList.remove('sel');
	});
	el.classList.add('sel');
	var tid = el.dataset.v;
	document.getElementById('pt-val').value = tid;
	var wrap = document.getElementById('pt-sub');
	var chips = document.getElementById('pt-sub-chips');
	if (dtST[tid] && dtST[tid].length) {
		chips.innerHTML = '';
		dtST[tid].forEach(function(s) {
			var d = document.createElement('div');
			d.className = 'dt-chip';
			d.dataset.g = 'pt_sub';
			d.dataset.v = s.id;
			d.textContent = s.name;
			d.onclick = function() {
				document.querySelectorAll('[data-g="pt_sub"]').forEach(function(c) {
					c.classList.remove('sel');
				});
				d.classList.add('sel');
				document.getElementById('pt-val').value = s.id;
				document.getElementById('sum-1').textContent = s.name;
			};
			chips.appendChild(d);
		});
		wrap.style.display = '';
	} else {
		wrap.style.display = 'none';
	}
	document.getElementById('sum-1').textContent = el.textContent.trim();
}

function dtDev1(el) {
	document.querySelectorAll('[data-g="dev1"]').forEach(function(c) {
		c.classList.remove('sel');
	});
	document.getElementById('dev2-wrap').style.display = 'none';
	document.getElementById('dev2-chips').innerHTML = '';
	document.getElementById('dev-val').value = '';
	el.classList.add('sel');

	var devId = parseInt(el.dataset.v);
	var devName = el.dataset.name || el.textContent.trim();
	var found = null;
	for (var i = 0; i < (window.dtDevTree || []).length; i++) {
		if (window.dtDevTree[i].id === devId) {
			found = window.dtDevTree[i];
			break;
		}
	}
	if (!found || !found.children || !found.children.length) {
		document.getElementById('dev-val').value = devId;
		document.getElementById('sum-1').textContent = devName;
		return;
	}
	document.getElementById('dev2-label').textContent = devName;
	var c2 = document.getElementById('dev2-chips');
	found.children.forEach(function(sub) {
		var d = document.createElement('div');
		d.className = 'dt-chip';
		d.dataset.g = 'dev2';
		d.dataset.v = sub.id;
		d.dataset.name = sub.name;
		d.textContent = sub.name;
		d.onclick = function() {
			document.querySelectorAll('[data-g="dev2"]').forEach(function(c) {
				c.classList.remove('sel');
			});
			d.classList.add('sel');
			document.getElementById('dev-val').value = sub.id;
			document.getElementById('sum-1').textContent = sub.name;
		};
		c2.appendChild(d);
	});
	document.getElementById('dev2-wrap').style.display = '';
	document.getElementById('sum-1').textContent = devName;
}

function dtLoadL2(tinhId) {
	var s2 = document.getElementById('sel-quan');
	var s3 = document.getElementById('sel-phuong');
	s2.innerHTML = '<option value="">-- Chọn --</option>';
	s3.innerHTML = '<option value="">-- Chọn --</option>';
	(window.dtLocL2[tinhId] || []).forEach(function(q) {
		var o = document.createElement('option');
		o.value = q.id;
		o.textContent = q.name;
		s2.appendChild(o);
	});
	dtUpdateLoc();
}

function dtLoadL3(quanId) {
	var s3 = document.getElementById('sel-phuong');
	s3.innerHTML = '<option value="">-- Chọn --</option>';
	(window.dtLocL3[quanId] || []).forEach(function(p) {
		var o = document.createElement('option');
		o.value = p.id;
		o.textContent = p.name;
		s3.appendChild(o);
	});
	dtUpdateLoc();
}

function dtUpdateLoc() {
	var s1 = document.getElementById('sel-tinh');
	var s2 = document.getElementById('sel-quan');
	var s3 = document.getElementById('sel-phuong');
	document.getElementById('loc-val').value = s3.value || s2.value || s1.value;
	var parts = [
		s3.selectedIndex > 0 ? s3.options[s3.selectedIndex].text : '',
		s2.selectedIndex > 0 ? s2.options[s2.selectedIndex].text : '',
		s1.selectedIndex > 0 ? s1.options[s1.selectedIndex].text : '',
	].filter(Boolean);
	document.getElementById('sum-2').textContent = parts.join(', ');
}

function dtChip(el, group) {
	document.querySelectorAll('[data-g="' + group + '"]').forEach(function(c) {
		c.classList.remove('sel');
	});
	el.classList.add('sel');
	var hid = group + '_val';
	if (document.getElementById(hid)) document.getElementById(hid).value = el.dataset.v;
}

function dtChipSingle(el, group, hiddenId) {
	document.querySelectorAll('[data-g="' + group + '"]').forEach(function(c) {
		c.classList.remove('sel');
	});
	el.classList.add('sel');
	document.getElementById(hiddenId).value = el.dataset.v;
	var phl = (document.getElementById('phap-ly-val') || {}).value || '';
	var ntl = (document.getElementById('noi-that-val') || {}).value || '';
	document.getElementById('sum-5').textContent = [phl, ntl].filter(Boolean).join(' · ');
}

function fmtPrice(inp) {
	var raw = inp.value.replace(/\./g, '').replace(/[^0-9]/g, '');
	if (!raw) {
		document.getElementById('price-hint').textContent = 'Nhập giá → tự động hiển thị bằng chữ';
		document.getElementById('sum-3').textContent = '';
		inp.value = '';
		return;
	}
	inp.value = raw.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
	var n = parseInt(raw);
	var txt = n >= 1e9 ? (+(n / 1e9).toFixed(2)) + ' tỷ đồng' :
		n >= 1e6 ? (+(n / 1e6).toFixed(1)) + ' triệu đồng' :
		n.toLocaleString('vi-VN') + ' đồng';
	document.getElementById('price-hint').textContent = '→ ' + txt;
	document.getElementById('sum-3').textContent = txt;
}

function cntChars(el, cid, max) {
	var n = el.value.length;
	var counter = document.getElementById(cid);
	counter.textContent = n;
	counter.style.color = n > max * 0.9 ? 'var(--c-red)' : '';
	if (cid === 'cnt-title' && el.value.trim()) {
		document.getElementById('sum-6').textContent = el.value.trim().substring(0, 35) + (el.value.length > 35 ? '...' : '');
	}
}

function dtPreviewMain(inp) {
	if (!inp.files || !inp.files[0]) return;
	var file = inp.files[0];
	if (file.size > 10 * 1024 * 1024) {
		alert('Ảnh quá 10MB.');
		inp.value = '';
		dtMainImg = null;
		return;
	}
	dtMainImg = file;
	var reader = new FileReader();
	reader.onload = function(e) {
		document.getElementById('main-preview-img').src = e.target.result;
		document.getElementById('main-preview').style.display = 'block';
		document.getElementById('sum-4').textContent = '1 ảnh chính';
	};
	reader.readAsDataURL(file);
}

function dtPreviewSubs(inp) {
	if (!inp.files || !inp.files.length) return;
	var files = Array.from(inp.files);
	if (files.length > 5) alert('Tối đa 5 ảnh phụ. ' + (files.length - 5) + ' ảnh bị bỏ qua.');
	var grid = document.getElementById('sub-previews');
	grid.innerHTML = '';
	files.slice(0, 5).forEach(function(file, i) {
		var reader = new FileReader();
		reader.onload = function(e) {
			var slot = document.createElement('div');
			slot.className = 'dt-sub-slot';
			slot.innerHTML = '<img src="' + e.target.result + '" alt="Ảnh phụ ' + (i + 1) + '">';
			grid.appendChild(slot);
		};
		reader.readAsDataURL(file);
	});
	var mainTxt = document.getElementById('main-preview').style.display !== 'none' ? '1 ảnh chính, ' : '';
	document.getElementById('sum-4').textContent = mainTxt + Math.min(files.length, 5) + ' ảnh phụ';
}

document.addEventListener('DOMContentLoaded', function() {
	var form = document.getElementById('dt-form');
	if (!form) return;

	form.addEventListener('submit', function(e) {
		var mode = document.getElementById('dt-mode-val').value;
		if (mode === 'bds' && !document.getElementById('pt-val').value) {
			e.preventDefault();
			alert('Vui lòng chọn loại bất động sản.');
			return;
		}
		if (mode === 'du_an' && !document.getElementById('dev-val').value) {
			e.preventDefault();
			alert('Vui lòng chọn dự án.');
			return;
		}
		if (!document.getElementById('title-inp').value.trim()) {
			e.preventDefault();
			document.getElementById('title-inp').focus();
			alert('Vui lòng nhập tiêu đề.');
			return;
		}
		var mainInp = document.getElementById('main-file-input');
		if (!dtMainImg && !(mainInp && mainInp.files && mainInp.files.length)) {
			e.preventDefault();
			alert('Vui lòng chọn ảnh chính.');
			return;
		}

		var btn = document.getElementById('btn-submit');
		if (btn) {
			btn.disabled = true;
			btn.textContent = 'Đang gửi...';
		}
	});
});
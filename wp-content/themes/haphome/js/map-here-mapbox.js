(function(global) {
	'use strict';

	var _mbLoading = false;
	var _mbCallbacks = [];

	function _loadMapbox(cb) {
		if (typeof mapboxgl !== 'undefined') {
			cb();
			return;
		}
		_mbCallbacks.push(cb);
		if (_mbLoading) return;
		_mbLoading = true;

		var link = document.createElement('link');
		link.rel = 'stylesheet';
		link.href = 'https://api.mapbox.com/mapbox-gl-js/v3.6.0/mapbox-gl.css';
		document.head.appendChild(link);

		var s = document.createElement('script');
		s.src = 'https://api.mapbox.com/mapbox-gl-js/v3.6.0/mapbox-gl.js';
		s.defer = false;
		s.onload = function() {
			_mbCallbacks.forEach(function(fn) {
				fn();
			});
			_mbCallbacks = [];
		};
		s.onerror = function() {
			console.error('[HereMapbox] Không load được Mapbox GL JS');
		};
		document.head.appendChild(s);
	}

	function _makeMarkerEl(iconUrl) {
		var el = document.createElement('div');
		el.style.cssText = 'width:32px;height:32px;background-image:url(' + iconUrl + ');background-size:contain;background-repeat:no-repeat;cursor:pointer;';
		return el;
	}

	function _savePos(latEl, lngEl, latlngEl, lat, lng) {
		if (latEl) latEl.value = parseFloat(lat).toFixed(7);
		if (lngEl) lngEl.value = parseFloat(lng).toFixed(7);
		if (latlngEl) latlngEl.value = parseFloat(lat).toFixed(7) + ', ' + parseFloat(lng).toFixed(7);
	}

	function _revGeo(hereKey, lat, lng, cb) {
		fetch(
				'https://revgeocode.search.hereapi.com/v1/revgeocode' +
				'?at=' + parseFloat(lat).toFixed(6) + ',' + parseFloat(lng).toFixed(6) +
				'&lang=vi&apikey=' + hereKey
			)
			.then(function(r) {
				return r.json();
			})
			.then(function(d) {
				if (d.items && d.items.length) cb(d.items[0].address.label);
			})
			.catch(function() {});
	}

	function _autoFormatLatLng(raw) {
		var digits = raw.replace(/[^0-9]/g, '');
		if (digits.length < 9) return null; 
		var latDigits = digits.slice(0, 8);
		var lngDigits = digits.slice(8);

		if (latDigits.length < 8 || lngDigits.length < 4) return null;

		var latInt = latDigits.slice(0, 2);
		var latDec = latDigits.slice(2);
		var lat = parseFloat(latInt + '.' + latDec);
		var lngIntLen = lngDigits.length - 6;
		if (lngIntLen < 1) return null;
		var lngInt = lngDigits.slice(0, lngIntLen);
		var lngDec = lngDigits.slice(lngIntLen);
		var lng = parseFloat(lngInt + '.' + lngDec);

		if (isNaN(lat) || isNaN(lng)) return null;
		if (lat < 5 || lat > 25) return null;  
		if (lng < 100 || lng > 112) return null;

		return { lat: lat, lng: lng };
	}

	function _parseLatLng(str) {
		if (!str) return null;
		str = str.trim();

		if (str.indexOf(',') === -1 && /^[0-9.]+$/.test(str)) {
			var digitsOnly = str.replace(/\./g, '');
			if (digitsOnly.length >= 9) {
				return _autoFormatLatLng(digitsOnly);
			}
		}

		var parts = str.split(',').map(function(s) { return parseFloat(s.trim()); });
		if (parts.length !== 2 || isNaN(parts[0]) || isNaN(parts[1])) return null;
		var a = parts[0], b = parts[1];
		var aIsLat = (Math.abs(a) >= 10 && Math.abs(a) <= 100);
		var bIsLat = (Math.abs(b) >= 10 && Math.abs(b) <= 100);
		var aIsLng = Math.abs(a) > 100;
		var bIsLng = Math.abs(b) > 100;

		if (aIsLat && bIsLng) return { lat: a, lng: b };
		if (aIsLng && bIsLat) return { lat: b, lng: a };

		return { lat: a, lng: b };
	}

	function initEdit(opts) {
		var mapEl = document.getElementById(opts.mapEl);
		var searchEl = document.getElementById(opts.searchEl);
		var suggestEl = document.getElementById(opts.suggestEl);
		var latEl = opts.latEl ? document.getElementById(opts.latEl) : null;
		var lngEl = opts.lngEl ? document.getElementById(opts.lngEl) : null;
		var latlngEl = opts.latlngEl ? document.getElementById(opts.latlngEl) : null;
		var addrEls = (function() {
			var ids = Array.isArray(opts.addressEl) ? opts.addressEl : [opts.addressEl];
			return ids.map(function(id) {
				return document.getElementById(id);
			}).filter(Boolean);
		})();

		if (!mapEl) return {
			flyTo: function() {}
		};

		var hasExisting = (opts.existingLat !== 0 || opts.existingLng !== 0);
		var center = hasExisting ?
			[opts.existingLng, opts.existingLat] :
			[106.7009, 10.7769];

		var _map = null,
			_marker = null,
			_searchTimer = null;

		function _setAddress(addr) {
			if (searchEl) searchEl.value = addr;
			addrEls.forEach(function(el) {
				el.value = addr;
			});
		}

		function _goTo(lat, lng, label) {
			if (!_map || !_marker) {
				setTimeout(function() {
					_goTo(lat, lng, label);
				}, 400);
				return;
			}
			var ll = [parseFloat(lng), parseFloat(lat)];
			_map.flyTo({
				center: ll,
				zoom: 17
			});
			_marker.setLngLat(ll);
			_savePos(latEl, lngEl, latlngEl, lat, lng);

			if (label) {
				_setAddress(label);
			} else {
				_revGeo(opts.hereKey, lat, lng, _setAddress);
			}

			if (suggestEl) suggestEl.style.display = 'none';
		}

		function _createMap() {
			mapboxgl.accessToken = opts.mapboxToken;

			_map = new mapboxgl.Map({
				container: mapEl,
				style: opts.mapboxStyle,
				center: center,
				zoom: hasExisting ? 17 : 13
			});

			_map.addControl(new mapboxgl.NavigationControl(), 'top-right');

			_marker = new mapboxgl.Marker({
				element: _makeMarkerEl(opts.iconUrl),
				draggable: true,
				anchor: 'bottom'
			}).setLngLat(center).addTo(_map);

			if (hasExisting) _savePos(latEl, lngEl, latlngEl, opts.existingLat, opts.existingLng);

			_marker.on('dragend', function() {
				var pos = _marker.getLngLat();
				_savePos(latEl, lngEl, latlngEl, pos.lat, pos.lng);
				_revGeo(opts.hereKey, pos.lat, pos.lng, _setAddress);
			});

			_map.on('click', function(e) {
				var c = e.lngLat;
				_marker.setLngLat(c);
				_savePos(latEl, lngEl, latlngEl, c.lat, c.lng);
				_revGeo(opts.hereKey, c.lat, c.lng, _setAddress);
			});

			_map.resize();
		}

		function _initAutocomplete() {
			if (!searchEl || !suggestEl) return;

			searchEl.addEventListener('input', function() {
				clearTimeout(_searchTimer);
				var q = this.value.trim();
				if (q.length < 2) {
					suggestEl.style.display = 'none';
					return;
				}

				_searchTimer = setTimeout(function() {
					fetch(
							'https://autocomplete.search.hereapi.com/v1/autocomplete' +
							'?q=' + encodeURIComponent(q) +
							'&in=countryCode:VNM&lang=vi&limit=7' +
							'&apikey=' + opts.hereKey
						)
						.then(function(r) {
							return r.json();
						})
						.then(function(res) {
							suggestEl.innerHTML = '';
							if (!res.items || !res.items.length) {
								suggestEl.style.display = 'none';
								return;
							}
							res.items.forEach(function(item) {
								var d = document.createElement('div');
								d.className = 'dt-suggest-item';
								d.textContent = item.address.label;
								d.style.cssText = 'padding:9px 12px;cursor:pointer;border-bottom:1px solid #f0f0f0;font-size:13px;line-height:1.4;';
								d.addEventListener('mouseover', function() {
									d.style.background = '#f5f5f5';
								});
								d.addEventListener('mouseout', function() {
									d.style.background = '';
								});
								d.addEventListener('mousedown', function(e) {
									e.preventDefault();
									suggestEl.style.display = 'none';
									fetch(
											'https://lookup.search.hereapi.com/v1/lookup' +
											'?id=' + encodeURIComponent(item.id) +
											'&lang=vi&apikey=' + opts.hereKey
										)
										.then(function(r) {
											return r.json();
										})
										.then(function(detail) {
											var pos = detail.position || item.position || null;
											if (pos) _goTo(pos.lat, pos.lng, item.address.label);
										})
										.catch(function() {
											if (item.position) _goTo(item.position.lat, item.position.lng, item.address.label);
										});
								});
								suggestEl.appendChild(d);
							});
							suggestEl.style.display = 'block';
						})
						.catch(function() {});
				}, 350);
			});

			searchEl.addEventListener('blur', function() {
				setTimeout(function() {
					suggestEl.style.display = 'none';
				}, 200);
			});

			searchEl.addEventListener('keydown', function(e) {
				if (e.key === 'Enter') {
					e.preventDefault();
					var first = suggestEl.querySelector('.dt-suggest-item');
					if (first) first.dispatchEvent(new MouseEvent('mousedown', {
						bubbles: true
					}));
				}
			});
		}

		 _loadMapbox(function() {
        	_createMap();
			_initAutocomplete();
		});

		return {
			flyTo: function(lat, lng, label) {
				_goTo(lat, lng, label || '');
			},
			search: function(query) {
				if (!query) return;
				fetch(
					'https://geocode.search.hereapi.com/v1/geocode' +
					'?q=' + encodeURIComponent(query) +
					'&in=countryCode:VNM&lang=vi&limit=1' +
					'&apikey=' + opts.hereKey
				)
				.then(function(r) { return r.json(); })
				.then(function(res) {
					if (res.items && res.items.length) {
						var item = res.items[0];
						_goTo(item.position.lat, item.position.lng, item.address.label);
					}
				})
				.catch(function() {});
			}
		};
	}

	function initView(opts) {
		var _map = null;
		var _inited = false;

		function _init() {
			if (_inited) return;
			var el = document.getElementById(opts.mapEl);
			if (!el) return;
			if (el.offsetWidth === 0) {
				setTimeout(_init, 60);
				return;
			}
			_inited = true;

			mapboxgl.accessToken = opts.mapboxToken;

			_map = new mapboxgl.Map({
				container: el,
				style: opts.mapboxStyle,
				center: [opts.lng, opts.lat],
				zoom: 17
			});

			_map.addControl(new mapboxgl.NavigationControl(), 'top-right');
			_map.scrollZoom.disable();

			new mapboxgl.Marker({
					element: _makeMarkerEl(opts.iconUrl),
					anchor: 'bottom'
				})
				.setLngLat([opts.lng, opts.lat])
				.addTo(_map);

			setTimeout(function() {
				_map.resize();
			}, 50);
			if (typeof opts.onReady === 'function') opts.onReady(_map);
		}

		function tryInit() {
			if (!_inited) {
				_loadMapbox(function() {
					setTimeout(_init, 30);
				});
			} else if (_map) {
				setTimeout(function() {
					_map.resize();
				}, 50);
			}
		}

		global.__dtTryInitMap = tryInit;
		_loadMapbox(function() {
			/* preload SDK, chờ tryInit() */ });
	}
	global.HereMapbox = {
		initEdit: initEdit,
		initView: initView,
		parseLatLng: _parseLatLng,
		autoFormatLatLng: _autoFormatLatLng
	};

})(window);
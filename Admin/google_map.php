<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.el-input__inner {
    -webkit-appearance: none;
    background-color: #fff;
    background-image: none;
    border-radius: 4px;
    border: 1px solid #dcdfe6;
    box-sizing: border-box;
    color: #606266;
    display: inline-block;
    font-size: inherit;
    height: 40px;
    line-height: 40px;
    outline: 0;
    padding: 0 15px;
    -webkit-transition: border-color .2s cubic-bezier(.645,.045,.355,1);
    transition: border-color .2s cubic-bezier(.645,.045,.355,1);
    width: 200px;
}

.el-button:hover {
    color: #fff;
    background-color: #409eff;
    border-color: #409eff;
}

.el-button {
    display: inline-block;
    line-height: 1;
    white-space: nowrap;
    cursor: pointer;
    background: #fff;
    border: 1px solid #dcdfe6;
    color: #606266;
    -webkit-appearance: none;
    text-align: center;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    outline: 0;
    margin: 0;
    -webkit-transition: .1s;
    transition: .1s;
    font-weight: 500;
    padding: 12px 20px;
    font-size: 14px;
    border-radius: 4px;
    width: 100px;
}

.active {
    background-image: linear-gradient(45deg,#6859ea,#6acbe0);
    color: #fff;
    cursor: default;
}

.the_map_body {
    border-radius: 5px;
    background-color: #fff;
    -webkit-box-shadow: 0 0 7px 0 rgba(0,0,0,.2);
    box-shadow: 0 0 7px 0 rgba(0,0,0,.2);
    min-height: 300px;
    text-align: center;
    padding: 10px 10pxpx;
    margin-bottom: 20px;
    -webkit-transition: all .5s;
    transition: all .5s;
    cursor: pointer;
    position: relative;
}
</style>
<!-- 仮想 -->
<!-- <script type="text/javascript"src="http://maps.google.com/maps/api/js?sensor=false&callback=initialize"async defer></script>  -->

<!-- 本番 -->
 <script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfikko__ocg8BtkOjrtgzTAR_xIA8mu-I&callback=initialize"async defer></script> 

<script type="text/javascript">
	var company ='REイニシアチブ株式会社';
	// 35.6723446,139.7749372
	// ログインする時、地図の経度緯度を取得し、sessionに格納する
	// sessionのデータ中で取得し、設定する
	var initLatLng = {
		lat : 35.6723446,
		lng : 139.7749372,
		zoom : 15
	}

	/**
	*地図の情報更新
	*@param {latLng} 経度緯度
	*@param {zoom} ズーム
	*/
	function updateMarkerPosition(latLng, zoom) {

	    document.getElementById('lat').value = fomatFloat(latLng.lat(),6);
		document.getElementById('lng').value = fomatFloat(latLng.lng(),6);
		document.getElementById('zoom').value = zoom;
		// TODO: sessionの値も更新するように
	}

	/**
	 *地図の初期化
	 *@param {latLng} 経度緯度
	 *@param {zoom} ズーム
	 */
	function initialize() {
		var latLng = new google.maps.LatLng(initLatLng.lat, initLatLng.lng);
		var map = new google.maps.Map(document.getElementById('mapCanvas'), {
			zoom : initLatLng.zoom,
			center : latLng,
			mapTypeId : google.maps.MapTypeId.ROADMAP
		});
		var marker = new google.maps.Marker({
			position : latLng,
			title : company,
			map : map,
			draggable : true
		});

		// 現在地情報を更新する
		updateMarkerPosition(latLng, initLatLng.zoom);

		// ドラッグスタートベントを追加する
		google.maps.event.addListener(marker, 'dragstart', function() {
			updateMarkerPosition(marker.getPosition(), marker.map.zoom);
		});

		// ドラッグイベントを追加する
		google.maps.event.addListener(marker, 'drag', function() {
			// 現在地情報を更新する
			updateMarkerPosition(marker.getPosition(), marker.map.zoom);
		});

		// ドラッグエンドイベントを追加する
		google.maps.event.addListener(marker, 'dragend', function() {
			updateMarkerPosition(marker.getPosition(), marker.map.zoom);
		});

		// ズーム変更イベントを追加する
		map.addListener('zoom_changed', function() {
			updateMarkerPosition(marker.getPosition(), marker.map.zoom);
		});
	}

	/**
	 *ユーザ設定の値を反映する
	 *@param {latLng} 経度緯度
	 *@param {zoom} ズーム
	 */
	function setMapInfo() {
		initLatLng = {
			lat : Number(document.getElementById('lat').value) || 35.6723446,
			lng : Number(document.getElementById('lng').value) || 139.7749372,
			zoom : Number(document.getElementById('zoom').value) || 15
		};
		initialize();
	}

	//

	/**
	 *小数点以下n桁を残して、出力をフォーマットします（欠落部分は0です）
	 *@param {value} 経度緯度
	 *@param {n} n桁
	 */
	var fomatFloat = function(value, n) {
		var f = Math.round(value * Math.pow(10, n)) / Math.pow(10, n);
		var s = f.toString();
		var rs = s.indexOf('.');
		if (rs < 0) {
			s += '.';
		}
		for (var i = s.length - s.indexOf('.'); i <= n; i++) {
			s += "0";
		}
		return s;
	}
</script>
</head>
<body>
	<div class="the_map_body">
	   <div id="mapCanvas" style="height: 600px" ></div>
	</div>
	<div id="info"></div>
	<div id="data">
	  緯度 <input type="text" autocomplete="off" placeholder="35.6723446" class="el-input__inner" id="lat">
	  経度 <input type="text" autocomplete="off" placeholder="139.7749372" class="el-input__inner" id="lng">
	  ズーム <input type="text" autocomplete="off" placeholder="15" class="el-input__inner"id="zoom">
	</div>
	<div>
	   <br/>
	   <button  type="button" class="el-button active" onclick="setMapInfo()"><span onclick="setMapInfo()">設定</span></button>

	   <button type="button" class="el-button active" onclick="alert('DBに保存してください')"><span>保存</span></button>
	</div>
</body>
</html>
<?php
require 'logged_check.php';
require 'util.php';
$re = get_map_set();
require 'common/header.php';
?>
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
	-webkit-transition: border-color .2s cubic-bezier(.645, .045, .355, 1);
	transition: border-color .2s cubic-bezier(.645, .045, .355, 1);
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
	background-image: linear-gradient(45deg, #6859ea, #6acbe0);
	color: #fff;
	cursor: default;
}

.the_map_body {
	border-radius: 5px;
	background-color: #fff;
	-webkit-box-shadow: 0 0 7px 0 rgba(0, 0, 0, .2);
	box-shadow: 0 0 7px 0 rgba(0, 0, 0, .2);
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
<!-- <script type="text/javascript"src="http://maps.google.com/maps/api/js?sensor=false&callback=initialize"></script> -->

<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=<?php echo $re["MAP_API_KEY"]; ?>&callback=initialize"
	type="text/javascript"></script>

<script type="text/javascript">
		var company ='REイニシアチブ株式会社';
	// 35.6723446,139.7749372
	// ログインする時、地図の経度緯度を取得し、sessionに格納する
	// sessionのデータ中で取得し、設定する
	var initLatLng = {
		lat : <?php echo $re["LATITUDE"]; ?>,
		lng : <?php echo $re["LONGITUDE"]; ?>,
		zoom : <?php echo $re["ZOOM"]; ?>
	}

	/**
	*地図の情報更新
	*@param {latLng} 経度緯度
	*@param {zoom} ズーム
	*/
	function updateMarkerPosition(latLng, zoom) {

	    document.getElementById('LATITUDE').value = fomatFloat(latLng.lat(),6);
		document.getElementById('LONGITUDE').value = fomatFloat(latLng.lng(),6);
		document.getElementById('ZOOM').value = zoom;
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
			lat : Number(document.getElementById('LATITUDE').value) || <?php echo $re["LATITUDE"]; ?>,
			lng : Number(document.getElementById('LONGITUDE').value) || <?php echo $re["LONGITUDE"]; ?>,
			zoom : Number(document.getElementById('ZOOM').value) || <?php echo $re["ZOOM"]; ?>
		};
		initialize();
		return false;
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
<div class="wrapper wrapper-content">

	<div class="the_map_body">
		<div id="mapCanvas" style="height: 600px"></div>
	</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<form method="post" class="form-horizontal" action="">
				<div class="ibox float-e-margins">
					<div class="ibox-content re-editor">

						<div class="form-group">
							<label class="col-sm-12">経度</label>
							<div class="col-sm-12">
								<input id="LONGITUDE" name="LONGITUDE" type="text"
									class="form-control" value="<?php echo $re["LONGITUDE"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">緯度</label>
							<div class="col-sm-12">
								<input id="LATITUDE" name="LATITUDE" type="text"
									class="form-control" value="<?php echo $re["LATITUDE"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">ズーム</label>
							<div class="col-sm-12">
								<input id="ZOOM" name="ZOOM" type="text" class="form-control"
									value="<?php echo $re["ZOOM"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">GOOGLE MAP KEY</label>
							<div class="col-sm-12">
								<input name="MAP_API_KEY" type="text" class="form-control"
									value="<?php echo $re["MAP_API_KEY"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">アクセス方法</label>
							<div class="col-sm-12">
								<input name="ACCESS" type="text" class="form-control"
									value="<?php echo $re["ACCESS"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">GOOGLE MAP URL</label>
							<div class="col-sm-12">
								<input name="URL" type="text" class="form-control"
									value="<?php echo $re["URL"]; ?>">
							</div>
						</div>
						<div class="re-editor-post-btn-body">
							<button type="button" class="btn btn-w-m btn-primary" onclick="setMapInfo();">設定</button>
							<button class="btn btn-w-m btn-primary" id="submit" type="submit" name="update-submit">保存</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function() {
		$("[name=update-submit]").click(function() {
				$.post("map_update.php", {
					LONGITUDE: $("[name=LONGITUDE]").val(),
					LATITUDE: $("[name=LATITUDE]").val(),
					ZOOM: $("[name=ZOOM]").val(),
					MAP_API_KEY: $("[name=MAP_API_KEY]").val(),
					ACCESS: $("[name=ACCESS]").val(),
					URL: $("[name=URL]").val(),
					},
					function(data) {
						if (data.status == false) {
							layer.msg("更新失敗");
						} else {
							layer.msg("更新しました");
						}
					},
					"json");
			return false;
		});
	})
</script>

<?php  require 'common/footer.php';?>
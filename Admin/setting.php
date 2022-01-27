<?php
require 'logged_check.php';
require 'util.php';
$info = get_setting();
require 'common/header.php';
?>


<div class="wrapper wrapper-content">

	<div class="row">
		<div class="col-sm-12">
			<form method="post" class="form-horizontal" action="">
				<div class="ibox float-e-margins">
					<div class="ibox-content re-editor">
						<div class="form-group">
							<label class="col-sm-12">会社名</label>
							<div class="col-sm-12">
								<input name="COMPANY_NAME" type="text" class="form-control"
									value="<?php echo $info["COMPANY_NAME"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">会社名英語</label>
							<div class="col-sm-12">
								<input name="COMPANY_NO" type="text" class="form-control"
									value="<?php echo $info["COMPANY_NO"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">略称</label>
							<div class="col-sm-12">
								<input name="ABBREVIATION" type="text" class="form-control"
									value="<?php echo $info["ABBREVIATION"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">住所</label>
							<div class="col-sm-12">
								<input name="RESIDENCE" type="text" class="form-control"
									value="<?php echo $info["RESIDENCE"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">郵便番号</label>
							<div class="col-sm-12">
								<input name="POST_CODE" type="text" class="form-control"
									value="<?php echo $info["POST_CODE"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">代表者名</label>
							<div class="col-sm-12">
								<input name="DELEGATE" type="text" class="form-control"
									value="<?php echo $info["DELEGATE"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">代表者名カタカナ</label>
							<div class="col-sm-12">
								<input name="KATAKANA" type="text" class="form-control"
									value="<?php echo $info["KATAKANA"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">電話番号</label>
							<div class="col-sm-12">
								<input name="TEL" type="text" class="form-control"
									value="<?php echo $info["TEL"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">ファックス番号</label>
							<div class="col-sm-12">
								<input name="FAX" type="text" class="form-control"
									value="<?php echo $info["FAX"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">資本金</label>
							<div class="col-sm-12">
								<input name="CAPITAL" type="text" class="form-control"
									value="<?php echo $info["CAPITAL"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">設立</label>
							<div class="col-sm-12">
								<input name="INSTITUTION" type="text" class="form-control"
									value="<?php echo $info["INSTITUTION"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">従業員(人数)</label>
							<div class="col-sm-12">
								<input name="EMPLOYEES" type="text" class="form-control"
									value="<?php echo $info["EMPLOYEES"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">プライバシーマーク登録番号</label>
							<div class="col-sm-12">
								<input name="PRIVACY_MARK_NO" type="text" class="form-control"
									value="<?php echo $info["PRIVACY_MARK_NO"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">労働者派遣事業許可番号</label>
							<div class="col-sm-12">
								<input name="WDB_LICENSE" type="text" class="form-control"
									value="<?php echo $info["WDB_LICENSE"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">ISO 27001登録証番号</label>
							<div class="col-sm-12">
								<input name="ISO_NO" type="text" class="form-control"
									value="<?php echo $info["ISO_NO"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">主要取引銀行</label>
							<div class="col-sm-12">
								<input name="MAJOR_BANKS" type="text" class="form-control"
									value="<?php echo $info["MAJOR_BANKS"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">主な事業内容</label>
							<div class="col-sm-12">
								<input name="MAIN_BUSINESS" type="text" class="form-control"
									value="<?php echo $info["MAIN_BUSINESS"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">日本・中国の両国向けサービス</label>
							<div class="col-sm-12">
								<input name="SERVICES" type="text" class="form-control"
									value="<?php echo $info["SERVICES"]; ?>">
							</div>
						</div>
						<div class="re-editor-post-btn-body">
							<button class="btn btn-w-m btn-primary" id="submit" type="submit"
								name="update-submit">保存</button>
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
				$.post("history_add.php", {
					COMPANY_NAME: $("[name=COMPANY_NAME]").val(),
					COMPANY_NO: $("[name=COMPANY_NO]").val(),
					ABBREVIATION: $("[name=ABBREVIATION]").val(),
					RESIDENCE: $("[name=name]").val(),
					POST_CODE: $("[name=POST_CODE]").val(),
					DELEGATE: $("[name=DELEGATE]").val(),
					KATAKANA: $("[name=KATAKANA]").val(),
					TEL: $("[name=TEL]").val(),
					FAX: $("[name=FAX]").val(),
					CAPITAL: $("[name=CAPITAL]").val(),
					INSTITUTION: $("[name=INSTITUTION]").val(),
					EMPLOYEES: $("[name=EMPLOYEES]").val(),
					PRIVACY_MARK_NO: $("[name=PRIVACY_MARK_NO]").val(),
					WDB_LICENSE: $("[name=WDB_LICENSE]").val(),
					ISO_NO: $("[name=ISO_NO]").val(),
					MAJOR_BANKS: $("[name=MAJOR_BANKS]").val(),
					MAIN_BUSINESS: $("[name=MAIN_BUSINESS]").val(),
					SERVICES: $("[name=SERVICES]").val(),
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
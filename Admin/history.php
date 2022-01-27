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
							<label class="col-sm-12">会社コード</label>
							<div class="col-sm-12">
								<input name="COMPANY_CD" type="text" class="form-control"
									value="<?php echo $info["COMPANY_CD"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">事件</label>
							<div class="col-sm-12">
								<input name="TITLE" type="text" class="form-control"
									value="<?php echo $info["TITLE"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">事件内容</label>
							<div class="col-sm-12">
								<input name="CONTENT" type="text" class="form-control"
									value="<?php echo $info["CONTENT"]; ?>">
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
	
	
	<div class="row">
		<div class="col-sm-12">
			<form method="post" class="form-horizontal" action="">
				<div class="ibox float-e-margins">
					<div class="ibox-content re-editor">
					
					
						<div class="form-group">
							<label class="col-sm-12">会社コード</label>
							<div class="col-sm-12">
								<input name="COMPANY_CD" type="text" class="form-control"
									value="<?php echo $info["COMPANY_CD"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">事件</label>
							<div class="col-sm-12">
								<input name="TITLE" type="text" class="form-control"
									value="<?php echo $info["TITLE"]; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">事件内容</label>
							<div class="col-sm-12">
								<input name="CONTENT" type="text" class="form-control"
									value="<?php echo $info["CONTENT"]; ?>">
							</div>
						</div>
						
						
						<div class="re-editor-post-btn-body">
							<button class="btn btn-w-m btn-primary" id="submit" type="submit"
								name="add-submit">増加</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	
</div>
<script type="text/javascript">
	$(function() {
		$("[name=add-submit]").click(function() {
				$.post("setting_update.php", {
					COMPANY_CD: $("[name=COMPANY_CD]").val(),
					TITLE: $("[name=TITLE]").val(),
					CONTENT: $("[name=CONTENT]").val(),
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
		
		$("[name=update-submit]").click(function() {
			$.post("history_add.php", {
				HISTORY_ID:$("[name=HISTORY_ID]").val(),
				COMPANY_CD: $("[name=COMPANY_CD]").val(),
				TITLE: $("[name=TITLE]").val(),
				CONTENT: $("[name=CONTENT]").val(),
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
<?php 
    require 'logged_check.php';
    require 'util.php';
    require 'common/header.php';
    ?>

<div class="wrapper wrapper-content">

	<div class="row">
		<div class="col-sm-12">
			<form method="post" class="form-horizontal" action="">
				<div class="ibox float-e-margins">
					<div class="ibox-content re-editor">
						<div class="form-group">
							<label class="col-sm-12">パスワード</label>
							<div class="col-sm-12">
								<input name="password" id="password" type="password" class="form-control" value="" maxlength="30">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">パスワード(確認)</label>
							<div class="col-sm-12">
								<input name="passwordre" id="passwordre" type="password" class="form-control" value="" maxlength="30">
							</div>
						</div>
						<div class="re-editor-post-btn-body">
							<button class="btn btn-w-m btn-primary" id="submit" type="submit" name="update-submit">変更する</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
    require 'common/footer.php';
?>
<script type="text/javascript">
	$(function() {
		$("[name=update-submit]").click(function() {
              if ($("#password").val()!==$("#passwordre").val()) {
                layer.msg("パスワードが一致しません。");
                return;
              }
              if (!$("#password").val() || !$("#passwordre").val()) {
                ayer.msg('パスワードとパスワード(確認)の入力が必要です。');
                return;
              }
              $.post("password_update.php", {
                  PASSWORD: $("[name=password]").val(),
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
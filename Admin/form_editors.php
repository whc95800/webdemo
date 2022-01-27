<?php
require 'logged_check.php';
require 'util.php';
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $result = get_news($id);
    if ($result == false) {
        header("location:blog.php");
        exit();
    }
}

require 'common/header.php';
?>
<style type="text/css">
.ibox .open>.dropdown-menu {
	right: auto !important;
}


</style>

<div class="wrapper wrapper-content">
	<link href="css/plugins/summernote/summernote.css" rel="stylesheet">
	<link href="css/plugins/summernote/summernote-bs4.css" rel="stylesheet">

	<div class="row">
		<div class="col-sm-12">
			<form method="post" class="form-horizontal" action="upload_check.php"
				enctype="multipart/form-data">
				<input type="hidden" name="id"
					value="<?php if ($result) echo $result[0][0];  ?>">
				<div class="ibox float-e-margins">
					<div class="ibox-content re-editor">
						<!-- タイトル -->
						<div class="form-group">
							<label class="col-sm-12">タイトル</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="title"
									value="<?php if ($result) echo $result[0][1]; ?>">
							</div>
						</div>
						<!-- カテゴリー -->
						<div class="form-group">
							<label class="col-sm-12">カテゴリー</label>
							<div class="col-sm-12">
								<select class="form-control m-b" name="catalogue">
                                    <?php
                                    $re = get_type(null);
                                    for ($i = 0; $i < count($re); $i ++) {
                                        if ($result[0][2] == $re[$i][0]) {
                                            echo "<option value='" . $re[$i][0] . "' selected>" . $re[$i][1] . "</option>";
                                        } else {
                                            echo "<option value='" . $re[$i][0] . "'>" . $re[$i][1] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
							</div>
						</div>
						<!-- キャプチャー -->
						<div class="form-group">
							<label class="col-sm-12">キャプチャー</label>
							<div class="col-sm-12">
								<div class="re-editor-showimg-body">
									<input type="file" class="re-upload-img" id="captureImg"
										name="capture" onchange="showPreview(this, 'showImg')"
										accept="image/*">
									<div class="re-upload-text">キャプチャーを選択</div>
									<img src="<?php if ($result) echo $result[0][4]; ?>" id="showImg" style="display:<?php echo $result[0][4]!="" ? "block" : "none" ?>">
								</div>
							</div>
						</div>
						<!-- HTML Content -->
						<textarea class="summernote" role="textbox" aria-multiline="true"
							name="content"><?php if ($result) echo $result[0][3]; ?></textarea>
						<div class="re-editor-post-btn-body">
							<button class="btn btn-w-m btn-primary" type="submit">保存</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="js/plugins/summernote/summernote.min.js"></script>
<script src="js/plugins/summernote/lang/summernote-ja-JP.js"></script>
<script src="js/page.js"></script>
<script>
    $(document).ready(function() {
        function sendFile(file) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "file_upload.php",
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    if(res.status){
                        var newImage = new Image();
                        newImage.src = res.url;
                        $(".summernote").summernote('insertNode', newImage);
                    }else{
                        layer.msg('ファイルのアップロードに失敗しました！')
                    }
                }
            });
        }
        $(".summernote").summernote({
            lang: "ja-JP",
            height: 600,
            callbacks: {
                onImageUpload: function(files, editor, welEditable) {
                    sendFile(files[0]);
                }
            }
        })
    });
</script>
<script>
    function showPreview(source, imgId) {
        var file = source.files[0];
        if (window.FileReader) {
            var fr = new FileReader();
            fr.onloadend = function(e) {
                document.getElementById(imgId).src = e.target.result;
                $('#showImg').show();
            }
            fr.readAsDataURL(file);
        }
    }

    $(document).ready(function() {
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "empty") {
                echo 'layer.msg("empty fields");';
            } else if ($_GET["error"] == "insert") {
                echo 'layer.msg("insert failed");';
            }
        }
        ?>

    });

    $(function(){
     $(".btn-fullscreen").click(function(){   
        var width=$("#side-menu").width();
        if($(".note-editor").hasClass("fullscreen")){
    	 $(".note-editor.note-frame.fullscreen").css("padding-left",width); 
     }else{
    	 $(".note-editor").css("padding-left","0px");
     }
     });
    })
</script>
<?php require 'common/footer.php'; ?>
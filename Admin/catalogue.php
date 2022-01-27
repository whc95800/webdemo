<?php 
    require 'logged_check.php';
    require 'util.php';
    require 'common/header.php';
    ?>

                <!-- content start -->
                <div class="wrapper wrapper-content">
                    <div class="re-cata-btn-body">
                        <input type="text" class="form-control re-cataname" id="addCatalogueName"
                            placeholder="あたらしいカテゴリーの名前">
                        <button type="button" class="btn btn-primary" onclick="addCatalogue()">添加</button>
                    </div>
                    <div class="row re-cata-row">
                        <div class="col-sm-12">
                            <div class="ibox-content">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ネーム</th>
                                            <th width="200px">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $result=get_type(null);
                                    for($i=0;$i<count($result);$i++){
                                        echo '<tr>'.
                                            '<td>'.$result[$i][1].'</td>'.
                                            '<td><div>'.
                                                    '<button type="button" class="btn btn-outline btn-success" data-toggle="modal" data-target="#myModal6"'.
                                                        'onclick="rename('.$result[$i][0].')">リネーム</button> '.
                                                    '<button type="button" class="btn btn-outline btn-default"'.
                                                        'onclick="deleteCatalogue('.$result[$i][0].')">削除</button>'.
                                                '</div></td></tr>';
                                    }
                                    
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal inmodal fade" id="myModal6" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm re-add-cata-modal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">リネーム</h4>
                            </div>
                            <div class="modal-body">
                                <input type="text" class="form-control" name="catalogueName" id="catalogueName"
                                    placeholder="あたらしいカテゴリーの名前">
                                <input type="hidden" name="catalogueId" id="catalogueId">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal"
                                    id="renameClose">閉じる</button>
                                <button type="button" class="btn btn-primary" onclick="saveCatalogueName()">保存</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                // rename
                function rename(catalogueId) {
                    $('#catalogueId').val(catalogueId);
                }
                // delete
                function deleteCatalogue(catalogueId) {
                    parent.layer.confirm('削除しますか？', {
                        title:'メッセージ',
                        btn: ['はい','いいえ'], //按钮
                        shade: false //不显示遮罩
                        }, function(){
                            data = new FormData();
                            data.append("catalogueId", catalogueId);
                            sendAjax(data, 'delete_cata.php');
                        }, function(){
                    });
                }
                // add
                function addCatalogue() {
                    var name_ = $.trim($('#addCatalogueName').val())
                    if (!name_) {
                        layer.msg('カテゴリーの名前を設置してください');
                        return
                    }
                    data = new FormData();
                    data.append("catalogueName", name_);
                    sendAjax(data, 'add_cata.php');
                }
                // edit name
                function saveCatalogueName() {
                    var name_ =$.trim($('#catalogueName').val())
                    if (!name_) {
                        layer.msg('カテゴリーの名前を設置してください');
                        return
                    }
                    data = new FormData();
                    data.append("catalogueName", name_);
                    data.append("catalogueId", $('#catalogueId').val());
                    sendAjax(data, 'rename_cata.php');
                }
                // send ajax
                function sendAjax(data, url) {
                    $.ajax({
                        data: data,
                        type: "POST",
                        url: url,
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (res) {
                            if (res.status) {
                                location.reload();
                            } else {
                                layer.msg('失敗しました');
                            }
                        }
                    });
                }
            </script>
                <!-- content end -->
            </div>
        </div>
        <!--右侧部分结束-->
    </div>
<?php 
    require 'common/footer.php';
?>
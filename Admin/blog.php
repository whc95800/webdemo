<?php 
    require 'logged_check.php';
    if (isset($_GET["page"]) && $_GET["page"]>0) {
        $page=$_GET["page"];
    }else{
        $page=1;
    }
    require 'util.php';
    $result = get_news(null);
    $max=ceil(count($result)/10);
    if($page>$max){
        $page=1;
    }
    require 'common/header.php';
?>


    <div class="wrapper wrapper-content">
        <div class="row">
 <?php 
    for ($i=($page-1)*10;$i<$page*10 && $i<count($result);$i++){
        echo '<div class="col-lg-12"><div class="ibox admin-pagelist-ibox"> <div class="admin-pagelist-body"><img src="';
        if($result[$i][4]) echo $result[$i][4]; else echo "img/no-img.png";
                               echo '" class="admin-pagelist-img" /></div>'.
                                '<div class="ibox-content admin-pagelist-content"><a href="../article/index.html?id='.$result[$i][0].'" class="btn-link"><h2>'.
                                $result[$i][1].
                                '</h2></a><div class="small m-b-xs"><span class="text-muted"><i class="fa fa-clock-o"></i> '
                                   .$result[$i][5].
                    '</span></div><div class="row"><div class="col-md-6"><h5>操作：</h5><a href="form_editors.php?id='.$result[$i][0].'" class="btn btn-primary btn-xs" type="button">編集</a> '.
                        '<a href="delete_news.php?id='.$result[$i][0].'" class="btn btn-white btn-xs" type="button">削除</a>'.
                            '</div><div class="col-md-6"><div class="small text-right"><h5>カテゴリー：</h5>'.
                            '<div> <i class="fa fa-comments-o"> </i> '.get_typeName($result[$i][2]).'</div></div></div></div></div></div></div>';
    }  
 ?>
        </div>
    </div>
    
<div class="btn-group admin-pagelist-page">
				<?php 
				if($page>1){
				    echo '<a href="blog.php?page=1" type="button" class="btn btn-white"><i class="fa fa-angle-double-left"></i></a>'.
                        '<a href="blog.php?page='.($page-1).'" type="button" class="btn btn-white"><i class="fa fa-angle-left"></i></a>';
				}
				if ($page>2) {
				    $index=$page-2;
				}else{
				    $index=1;
				}
				for($i=$index;$i<=$max && $i<$page+3;$i++){
				    if($i==$page){
				        echo '<a href="#" class="btn btn-white  active">'.$i.'</a>';
				    }else{
				        echo '<a href="blog.php?page='.$i.'" class="btn btn-white">'.$i.'</a>';
				    }
				}
				if($page<$max){
				    echo '<a href="blog.php?page='.($page+1).'" type="button" class="btn btn-white"><i class="fa fa-angle-right"></i>
                        </a><a href="blog.php?page='.$max.'" type="button" class="btn btn-white"><i class="fa fa-angle-double-right"></i>
                        </a>';
				}
				?>
                       
                    </div>
                </div>    
    
  <?php require 'common/footer.php';?>
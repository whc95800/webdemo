<?php

/**
 * 获得数据库链接
 * @return object   链接对象
 */
function get_link()
{
    $link = mysqli_connect('mysql3.onamae.ne.jp', 'zttib_admin', 'You&me3013@@@@123');
    if (mysqli_errno($link)) {
        exit(mysqli_error($link));
    }
    mysqli_set_charset($link, 'utf8mb4');
    mysqli_select_db($link, 'zttib_homepage');
    return $link;
}

function get_result($query)
{
    $link = get_link();
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

/**
 *
 * @param string $type
 * @return string[][]|boolean
 */
function get_news_list($type)
{
    $query = "SELECT t1.id,title,name as type,img,time FROM RE_web as t1 LEFT OUTER JOIN RE_news_type as t2 on t1.catalogue=t2.id where t2.name='$type'";
    $query = $query . " order by time desc";
    $result = get_result($query);
    if ($result) {
        $re = array();
        while ($row = mysqli_fetch_array($result)) {
            $re[] = array(
                $row["id"],
                $row["title"],
                $row["type"],
                null,
                $row["img"],
                $row["time"]
            );
        }
        return $re;
    } else {
        return false;
    }
}

function get_news_list_json($type, $page)
{
    if ($page == null || $page <= 0) {
        return json_encode(array(
            "code" => 0
        ));
    }
    $query = "SELECT t1.id,title,name as type,img,time FROM RE_web as t1 LEFT OUTER JOIN RE_news_type as t2 on t1.catalogue=t2.id where t2.name='$type'";
    $query = $query . " order by time desc";
    $result = get_result($query);
    if ($result) {
        $re = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            if ($i < ($page - 1) * 10 || $i >= $page * 10) {
                $i ++;
                continue;
            }
            $re[] = array(
                "id" => $row["id"],
                "title" => $row["title"],
                "img" => $row["img"],
                "time" => $row["time"]
            );
            $i ++;
        }
        $re2 = array(
            "list" => $re,
            "count" => $i,
            "page" => $page,
            "code" => 1
        );
        return json_encode($re2);
    } else {
        return json_encode(array(
            "code" => 0
        ));
    }
}

/**
 * 根据id获取文章
 *
 * @param int $id
 * @return string[]|boolean
 */
function get_news($id)
{
    $query = "select t1.id,title,name as type,content,img,time from RE_web as t1 LEFT OUTER JOIN RE_news_type as t2 on t1.catalogue=t2.id where t1.id=$id";
    $result = get_result($query);
    if ($result) {
        $row = mysqli_fetch_array($result);
        $re = array(
            $row["id"],
            $row["title"],
            $row["type"],
            $row["content"],
            $row["img"],
            $row["time"]
        );
        return $re;
    } else {
        return false;
    }
}

/**
 *
 * @param int $id
 * @return string
 */
function get_news_json($id)
{
    $query = "select t1.id,title,name as type,content,img,time from RE_web as t1 LEFT OUTER JOIN RE_news_type as t2 on t1.catalogue=t2.id where t1.id=$id";
    $result = get_result($query);
    if ($result) {
        $row = mysqli_fetch_array($result);
        $re = array(
            "id" => $row["id"],
            "title" => $row["title"],
            "type" => $row["type"],
            "content" => $row["content"],
            "img" => $row["img"],
            "time" => $row["time"]
        );
        return json_encode(array(
            "news" => $re,
            "code" => 1
        ));
    } else {
        return json_encode(array(
            "code" => 0
        ));
    }
}

/**
 * 获取设置
 * @return string json对象
 */
function get_setting_json()
{
    $query = "select * from T_COMPINFO";
    $result = get_result($query);
    $row = mysqli_fetch_array($result);
    $re = array(
        "COMPANY_NAME"=>$row["COMPANY_NAME"],
        "COMPANY_NO"=>$row["COMPANY_NO"],
        "ABBREVIATION"=>$row["ABBREVIATION"],
        "RESIDENCE"=>$row["RESIDENCE"],
        "POST_CODE"=>$row["POST_CODE"],
        "DELEGATE"=>$row["DELEGATE"],
        "KATAKANA"=>$row["KATAKANA"],
        "TEL"=>$row["TEL"],
        "FAX"=>$row["FAX"],
        "CAPITAL"=>$row["CAPITAL"],
        "INSTITUTION"=>$row["INSTITUTION"],
        "EMPLOYEES"=>$row["EMPLOYEES"],
        "PRIVACY_MARK_NO"=>$row["PRIVACY_MARK_NO"],
        "WDB_LICENSE"=>$row["WDB_LICENSE"],
        "ISO_NO"=>$row["ISO_NO"],
        "MAJOR_BANKS"=>$row["MAJOR_BANKS"],
        "MAIN_BUSINESS"=>$row["MAIN_BUSINESS"],
        "SERVICES"=>$row["SERVICES"]
    );
    if($result){
        return json_encode(array(
            "setting"=>$re,
            "code"=>1
        ));
    }else {
        return json_encode(array(
            "code"=>0
        ));
    }
}

/**
 * 设置网页title
 *
 * @return string
 */
function set_title()
{
    $filename = substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1);
    // title对照
    $namelist = array(
        "index.php" => "ホーム",
        "page.php" => "ニュース",
        "list.php" => "ニュース　リスト"
    );
    return $namelist[$filename];
}

/**
 * 邮件内容
 * @return string html对象
 */
function toHTML($name,$nameFurigana,$companyName,$departmentName,$positionName,$address,$phone,$fax,$email,$content,$typeContact) {
    $html='<p style="font-size: 14px;">ご担当様<br />平素は大変お世話になっております。<br /></p>';
    $html.='<p style="font-size: 14px;"><span style="color:#189a36">お問い合わせ種類</span><br />　'.$typeContact."</p>";
    $html.='<p style="font-size: 14px;"><span style="color:#189a36">お名前</span><br />　'.$name."</p>";
    $html.='<p style="font-size: 14px;"><span style="color:#189a36">お名前フリガナ</span><br />　'.$nameFurigana."</p>";
    if($companyName!='') {
        $html.='<p style="font-size: 14px;"><span style="color:#189a36">会社名</span><br />　'.$companyName."</p>";
    }
    if($departmentName!='') {
        $html.='<p style="font-size: 14px;"><span style="color:#189a36">部署</span><br />　'.$departmentName."</p>";
    }
    if($positionName!='') {
        $html.='<p style="font-size: 14px;"><span style="color:#189a36">役職</span><br />　'.$positionName."</p>";
    }
    if($address!='') {
        $html.='<p style="font-size: 14px;"><span style="color:#189a36">住所（都道府県）</span><br />　'.$address."</p>";
    }
    $html.='<p style="font-size: 14px;"><span style="color:#189a36">電話番号</span><br />　'.$phone."</p>";
    if($fax!='') {
         $html.='<p style="font-size: 14px;"><span style="color:#189a36">FAX</span><br />　'.$fax."</p>";
    }
    $html.='<p style="font-size: 14px;"><span style="color:#189a36">メールアドレス</span><br />　'.$email."</p>";
    $html.='<p style="font-size: 14px;white-space:pre-wrap"><span style="color:#189a36">お問い合わせ内容</span><br />　'.str_replace('\\r\\n','<br>',str_replace('\\n','<br>',$content))."<br /></p>";
    $html.='<p style="font-size: 14px;">ぜひご検討して頂ければと思っております、よろしくお願いいたします。<br /><br />何卒、よろしくお願い申し上げます。</p>';
    return $html;
}

function checkData($nameFurigana, $phone, $email)
{
    preg_match('/^[ァ-ー\s]+$/u', trim($nameFurigana), $match1);
    if (count($match1) == 0)
        return false;
    preg_match('/^\d*$/', trim($phone), $match2);
    if (count($match2) == 0)
        return false;
    preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/', trim($email), $match3);
    if (count($match3) == 0)
        return false;
    return true;
}


/**
 * 添加邮件信息
 * @param string $name
 * @param string $furikana
 * @param string $companyname
 * @param string $departmentname
 * @param string $tel
 * @param string $fax
 * @param string $mail
 * @param string $content
 * @param string $username
 * @return boolean
 */
function insert_contact($name,$furikana,$companyname,$departmentname,$tel,$fax,$mail,$content,$username) {
    $link = get_link();
    $query="INSERT INTO T_CONTACT_US (COMPANY_CD，NAME,NAME_FURIKANA,COMPANY_NAME,DEPARTMENT_NAME,TEL,FAX,MAIL,CONTENT,CREATE_USER,UPDATE_USER) VALUES (1，'$name','$furikana','$companyname','$departmentname','$tel','$fax','$mail','$content','$username','$username'";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

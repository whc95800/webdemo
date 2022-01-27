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

/**
 * 账号密码检查
 *
 * @param string $username
 * @param string $password
 * @return boolean
 */
function pwd_check($username, $password)
{
    $link = get_link();
    $query = "select * from RE_user where username='$username'";
    $result = mysqli_query($link, $query);
    if ($row = mysqli_fetch_array($result)) {
        $pwdcheck = password_verify($password, $row["password"]);
        mysqli_close($link);
        return $pwdcheck;
    }
}

/**
 * 添加用户
 *
 * @param string $username
 * @param string $password
 * @return boolean
 */
function insert_user($username, $password)
{
    $link = get_link();
    $query = "select * from RE_user where username='$username'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        return false;
    }
    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
    $query = "insert into RE_user (username,password) values ('$username','$hashedpwd')";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

function update_user($username,$password)
{
    $link = get_link();
    $query = "select * from RE_user where username='$username'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) < 0) {
        return false;
    }
    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
    $query = "update RE_user set password='$hashedpwd' where username='$username'";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

/**
 * 获得用户列表
 *
 * @param string $username
 * @return array[]
 */
function get_user($username)
{
    $link = get_link();
    $query = "select * from RE_user where username='$username'";
    $result = mysqli_query($link, $query);
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            $re = array(
                $row["id"],
                $row["username"],
                $row["password"]
            );
        }
        mysqli_close($link);
        return $re;
    }
}

/**
 * 添加文章
 *
 * @param string $title         标题
 * @param string $catalogue     类型
 * @param string $content       内容
 * @param string $img           
 * @return boolean
 */
function insert_news($title, $catalogue, $content, $img)
{
    $link = get_link();
    $time = date("Y-m-d");
    $query = "insert into RE_web (title,catalogue,content,img,time) values ('$title','$catalogue','$content','$img','$time')";
    $result = mysqli_query($link, $query);
    if ($result) {
        $id = mysqli_insert_id($link);
        mysqli_close($link);
        return $id;
    } else {
        return $result;
    }
}

/**
 * 获得文章 根据更新时间降序 如果传入id 获取id文章
 *
 * @param int $id
 * @return array[][]|boolean
 */
function get_news($id)
{
    $link = get_link();
    $query = "select * from RE_web";
    if ($id != null) {
        $query = $query . " where id=$id";
    }
    $query = $query . " order by time desc";
    $result = mysqli_query($link, $query);

    if ($result) {
        $re = array();
        while ($row = mysqli_fetch_array($result)) {
            $re[] = array(
                $row["id"],
                $row["title"],
                $row["catalogue"],
                $row["content"],
                $row["img"],
                $row["time"]
            );
        }
        mysqli_close($link);
        return $re;
    } else {
        return false;
    }
}

/**
 * 更新文章
 *
 * @param int $id
 * @param string $title
 * @param string $catalogue
 * @param string $content
 * @param string $img
 */
function update_news($id, $title, $catalogue, $content, $img)
{
    $link = get_link();
    $time = date("Y-m-d");
    $query = "update RE_web set title='$title',catalogue='$catalogue',content='$content',img='$img',time='$time' where id=$id";
    mysqli_query($link, $query);
    mysqli_close($link);
}

/**
 * 删除文章
 *
 * @param int $id
 * @return boolean
 */
function delete_news($id)
{
    $link = get_link();
    $query = "delete from RE_web where id=$id";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

/**
 * 添加文章类型
 *
 * @param string $name
 * @return boolean
 */
function insert_type($name)
{
    if (count(get_type($name)) > 0) {
        return false;
    }
    $link = get_link();
    $query = "insert into RE_news_type (name) values ('$name')";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

/**
 * 获得文章类型
 *
 * @param string $name
 * @return array[][]
 */
function get_type($name)
{
    $link = get_link();
    $query = "select * from RE_news_type";
    if ($name) {
        $query = $query . " where name='$name'";
    }
    $result = mysqli_query($link, $query);
    $re = array();
    while ($row = mysqli_fetch_array($result)) {
        $re[] = array(
            $row["id"],
            $row["name"]
        );
    }
    mysqli_close($link);
    return $re;
}

/**
 * 获得类型名
 *
 * @param int $id
 * @return string|string
 */
function get_typeName($id)
{
    $link = get_link();
    $query = "select * from RE_news_type where id=$id";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    if ($row) {
        return $row["name"];
    } else {
        return "";
    }
}

/**
 * 更新文章类型
 *
 * @param int $id
 * @param string $name
 * @return boolean
 */
function update_type($id, $name)
{
    if (count(get_type($name)) > 0) {
        return false;
    }
    $link = get_link();
    $query = "update RE_news_type set name='$name' where id=$id";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

/**
 * 删除文件类型
 *
 * @param int $id
 * @return boolean
 */
function delete_type($id)
{
    $link = get_link();
    $query = "delete from RE_news_type where id=$id";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return $result;
}

/**
 * 获取setting
 *
 * @return array[string]
 */
function get_setting()
{
    $link = get_link();
    $query = "select * from T_COMPINFO WHERE COMPANY_CD=1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    mysqli_close($link);
    return $row;
}

/**
 * 更新setting
 */
function update_setting($key, $value)
{
    $link = get_link();
    $query = "UPDATE T_COMPINFO SET " . $key . "='" . $value . "' where COMPANY_CD=1";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

/**
 * 获取地图设置
 *
 * @return array[string]
 */
function get_map_set()
{
    $link = get_link();
    $query = "SELECT * from T_MAP WHERE COMPANY_CD=1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    mysqli_close($link);
    return $row;
}

/**
 * 更新地图设置
 * @param string $key
 * @param string $value
 * @return boolean
 */
function update_map_set($key, $value)
{
    $link = get_link();
    $query = "UPDATE T_MAP SET " . $key . "='" . $value . "' where COMPANY_CD=1";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

/**
 * 添加历史
 * @param int $id
 * @param string $title
 * @param string $content
 * @param string $username
 * @return boolean
 */
function insert_history($code,$title,$content,$username) {
    $link=get_link();
    $query="INSERT INTO T_HISTORY (COMPANY_CD,TITLE,CONTENT,CREATE_USER,UPDATE_USER) values ($code,'$title','$content','$username','$username')";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

/**
 * 更新历史
 * @param int $id
 * @param int $code
 * @param string $title
 * @param string $content
 * @param string $username
 * @return boolean
 */
function update_history($id,$code,$title,$content,$username) {
    $link=get_link();
    $query="UPDATE T_HISTORY SET COMPANY_CD=$code , TITLE='$title' , CONTENT='$content' ,  UPDATE_USER='$username' where HISTORY_ID=$id";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

/**
 * 检查文件并上传
 *
 * @param object $file
 * @return boolean[]|string[] 检查结果|保存url
 */
function file_upload($file)
{
    $URL = "/";
    if (isset($file)) {
        $file_name = $file["name"];
        $file_tmp = $file["tmp_name"];
        $file_size = $file["size"];
        $file_error = $file["error"];
        // 文件扩展名
        $file_ext = strtolower(end(explode(".", $file_name)));
        // 允许的文件类型
        $allowed = array(
            "jpg",
            "png",
            "jpeg",
            "gif"
        );
        if (in_array($file_ext, $allowed)) {
            if ($file_error === 0) {
                // 限制10mb以下的文件
                if ($file_size < 10000000) {
                    $file_new = uniqid("", true) . "." . $file_ext;
                    // 保存路径
                    $file_destination = "uploads/" . $file_new;
                    move_uploaded_file($file_tmp, "../" . $file_destination);
                    return array(
                        true,
                        $URL . $file_destination
                    );
                } else {
                    return array(
                        false,
                        "SIZE"
                    );
                }
            } else {
                return array(
                    false,
                    "UPLOAD"
                );
            }
        } else {
            return array(
                false,
                "TYPE"
            );
        }
    } else {
        return array(
            false,
            "NO FILE"
        );
    }
}

/**
 * 删除uploads文件中没使用的文件
 *
 * @param string $ext
 */
function clean_uploads($ext)
{
    $filenames = glob("../uploads/*.$ext");
    $link = get_link();
    foreach ($filenames as $filename) {
        $filename = substr($filename, 3, strlen($filename) - 3);
        echo $filename;
        echo "<br>";
        $query = "select * from RE_web where img like '%$filename%' or content like '%$filename%'";
        $result = mysqli_query($link, $query);
        $num = mysqli_num_rows($result);
        if ($num < 1) {
            unlink($filename);
        }
    }
}

// /**
//  * 添加邮件信息
//  * @param string $name
//  * @param string $furikana
//  * @param string $tel
//  * @param string $fax
//  * @param string $mail
//  * @param string $content
//  * @param string $username
//  * @return boolean
//  */
// function insert_contact($name,$furikana,$tel,$fax,$mail,$content,$username) {
//     $link = get_link();
//     $query="INSERT INTO T_CONTACT_US (COMPANY_CD，NAME,NAME_FURIKANA,TEL,FAX,MAIL,CONTENT,CREATE_USER,UPDATE_USER) VALUES (1，'$name','$furikana','$tel','$fax','$mail','$content','$username','$username'";
//     $result = mysqli_query($link, $query);
//     mysqli_close($link);
//     if ($result) {
//         return true;
//     } else {
//         return false;
//     }
// }

/**
 * 获取邮件列表
 * @return string[][]|boolean
 */
function get_contact_list() {
    $link=get_link();
    $query="SELECT * FROM T_CONTACT_US";
    $result=mysqli_query($link, $query);
    if ($result) {
        $re = array();
        while ($row = mysqli_fetch_array($result)) {
            $re[] = array(
                $row
            );
        }
        mysqli_close($link);
        return $re;
    } else {
        return false;
    }
}

/**
 * 根据id获取邮件信息
 * @param int $id
 * @return 
 */
function get_contact($id) {
    $link=get_link();
    $query="SELECT * FROM T_CONTACT_US WHERE ID=$id";
    $result=mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    mysqli_close($link);
    return $row;
}

/**
 *  删除邮件信息
 * @param int $id
 * @return boolean
 */
function delete_contact($id) {
    $link=get_link();
    $query="DELETE FROM T_CONTACT_US WHERE ID=$id";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

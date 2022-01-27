<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';
require 'util.php';

if (isset($_POST["name"]) && isset($_POST["nameFurigana"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["content"])) {
    $name=$_POST["name"];
    $nameFurigana=$_POST["nameFurigana"];
    $companyName=$_POST["companyName"];
    $departmentName=$_POST["departmentName"];
    $positionName=$_POST["positionName"];
    $address=$_POST["address"];
    $phone=$_POST["phone"];
    $fax=$_POST["fax"];
    $email=$_POST["email"];
    $content=$_POST["content"];
    $typeContact=$_POST["typeContact"];
}else {
    echo json_encode(array(
        "msg"=>"Post unset",
        "code"=>0
    ));
    exit();
}

if (!checkData($nameFurigana, $phone, $email)) {
    echo json_encode(array(
        "msg"=>"Data Check",
        "code"=>0
    ));
    exit();
}

$title="【ホームページ】お問い合わせ ".date('m-d H:i');
$body=toHTML($name,$nameFurigana,$companyName,$departmentName,$positionName,$address,$phone,$fax,$email,$content,$typeContact);

$mail = new PHPMailer(true);
try {
    //服务器配置
    $mail->CharSet ="UTF-8";                     //设定邮件编码
    $mail->SMTPDebug = 0;                        // 调试模式输出
    $mail->isSMTP();                             // 使用SMTP
    $mail->Host = 'mail4.onamae.ne.jp';                // SMTP服务器
    $mail->SMTPAuth = true;                      // 允许 SMTP 认证
    $mail->Username = 'contact@re100.info';                // SMTP 用户名  即邮箱的用户名
    $mail->Password = 'Re&the202112@!';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
    $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
    $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持

    $mail->setFrom('contact@re100.info', 'ホームページ');  //发件人
    $mail->addAddress('info@re100.info', 'お問い合わせ');  // 收件人
    // $mail->addAddress('');  // 可添加多个收件人
    $mail->addReplyTo('info@re100.info', 'REイニシアチブ株式会社'); //回复的时候回复给哪个邮箱 建议和发件人一致    
    $mail->addBCC('zhang@re100.info');                    //密送
    //$mail->addCC('cc@example.com');                    //抄送
    // $mail->addBCC('xxx');                    //密送

    // $mail->addAttachment('../xy.zip');         // 添加附件
    // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名

    //Content
    $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
    $mail->Subject = $title;
    $mail->Body    = $body;
    $mail->AltBody = $body;

    $mail->send();
    echo json_encode(array(
        "msg"=>$body,
        "code"=>1
    ));
} catch (Exception $e) {
    echo json_encode(array(
        "msg"=>"Mail Exception".$e,
        "code"=>0
    ));
}

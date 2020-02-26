<?php
error_reporting(-1);
ini_set('display_errors', 'On');

$to = 'help@akh.kz';

echo var_dump($_POST['fio']);
$fio = $_POST['fio'];
$phone = $_POST['phone'];
$question = $_POST['question'];
$subject = 'Заявка с сайта akh.kz';

$message = '
<html>
<head>
  <title>Заявка с сайта <a href="http://akh.kz/">akh.kz</a></title>
</head>
<body>
  <p>ФИО: '.$fio.'</p>
  <p>Телефон:'.$phone.'</p>
  <p>Вопрос: '.$question.'</p>
</body>
</html>
';

$headers =  'MIME-Version: 1.0'. "\r\n" .'Content-type: text/html; charset=utf-8'. "\r\n" .'From: <info@akh.kz>';
mail($to, $subject, $message);
if(mail($to, $subject, $message, $headers))
{
    echo "Message accepted";
}
else
{
    echo "Error: Message not accepted";
}
?>
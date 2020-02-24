<?php
error_reporting(-1);
ini_set('display_errors', 'On');

$to = 'help@akh.kz';

$name = $_POST['name'];
$phone = $_POST['phone'];
$question = $_POST['question'];

$subject = 'Заявка с сайта akh.kz';

$message = '
<html>
<head>
  <title>Заявка с сайта <a href="http://akh.kz/">akh.kz</a></title>
</head>
<body>
  <p>ФИО: '.$name.'</p>
  <p>Телефон:'.$phone.'</p>
  <p>Вопрос: '.$question.'</p>
</body>
</html>
';

$headers = 'Content-type: text/html; charset=iso-8859-1'. "\r\n" .'From: <info@akh.kz>';
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
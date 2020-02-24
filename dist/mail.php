<?php
$to = 'faun1605@gmail.com';

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
  <p>ФИО: $name</p>
  <p>Телефон:$phone</p>
  <p>Вопрос: $question</p>
</body>
</html>
';

echo $message;
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

$headers[] = 'To: Administrator <faun1605@gmail.com>,';
$headers[] = 'From: AKH Landing <faun1605@gmail.com>';
$headers[] = 'Cc: faun1605@gmail.com';
$headers[] = 'Bcc: faun1605@gmail.com';

mail($to, $subject, $message, implode("\r\n", $headers));
?>
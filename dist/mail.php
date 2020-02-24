<?php
echo "Hello World";
$to = 'faun1605@gmail.com';

echo var_dump($_POST);
echo $_POST['name'];
echo $_POST['phone'];
echo $_POST['question'];
echo $_REQUEST['name'];

$subject = 'Testing mail';

$message = '
<html>
<head>
  <title>Testing mail</title>
</head>
<body>
  <p>Here are the birthdays upcoming in August!</p>
  <table>
    <tr>
      <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
    </tr>
    <tr>
      <td>Johny</td><td>10th</td><td>August</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

$headers[] = 'To: Administrator <faun1605@gmail.com>,';
$headers[] = 'From: AKH Landing <faun1605@gmail.com>';
$headers[] = 'Cc: faun1605@gmail.com';
$headers[] = 'Bcc: faun1605@gmail.com';

mail($to, $subject, $message, implode("\r\n", $headers));
?>
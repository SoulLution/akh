<?php
echo "Hello World";
$to = 'faun1605@gmail.com';

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

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To: Administrator <faun1605@gmail.com>,';
$headers[] = 'From: AKH Landing <faun1605@gmail.com>';
$headers[] = 'Cc: faun1605@gmail.com';
$headers[] = 'Bcc: faun1605@gmail.com';

// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));
?>
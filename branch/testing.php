<?php
$to = "ommsmrit123@gmail.com, rguria@vitwo.in";
$subject = "HTML email";

$message = "
<html>
<head>
<title>HTML email testing</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <ommsmrit123@gmail.com>' . "\r\n";

mail($to,$subject,$message,$headers);
?>






<form method="post" action="testing.php">
    <input type="text" name="teamName">
    <br />Players:<br>
    <input type="text" name="frm[firstName][]"><br />
    <input type="text" name="frm[lastName][]"><br />

    <input type="text" name="frm[firstName][]"><br />
    <input type="text" name="frm[lastName][]"><br />
    <input type="submit" value="submit">
</form>

<?php 
if(isset($_REQUEST)){
  echo '<pre>';
  print_r($_REQUEST);
}

?>
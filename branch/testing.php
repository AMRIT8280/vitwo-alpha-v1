<form method="post" action="testing.php">
    <input type="text" name="teamName">
    <br />Players:
    <input type="text" name="frm[]firstName[]"><br />
    <input type="text" name="frm[]lastName[]"><br />
    <input type="text" name="frm[]firstName[]"><br />
    <input type="text" name="frm[]lastName[]"><br />
    <input type="text" name="frm[]firstName[]"><br />
    <input type="text" name="lastName[]"><br />
    <input type="submit" value="submit">
</form>

<?php 
if(isset($_REQUEST)){
  echo '<pre>';
  print_r($_REQUEST);
}

?>
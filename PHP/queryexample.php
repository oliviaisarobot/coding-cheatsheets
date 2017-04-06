<?php

require_once 'config.php';

$conn = mysql_connect($servername, $username, $password, $dbname) || die('Could not connect: '.mysql_error();
                                                                         
// optional, in the first query you don't necessarily have to put the database name, in that case
// mysql_select_db($dbname) || die('Could not select a database: '.mysql_error();
// this acitvates a certain database, every subsequent query called will be performed on the active db

$sql = 'SELECT some_id, some_name FROM datatable';

$result = mysql_query($conn, $sql);
if(! $result) {
  die('Could not retrieve data: '.mysql_error());
}
while($row = mysql_fetch_assoc($result)) { // this transforms the rows into associative arrays, second possible arguments for mysql_fetch_array: MYSQL_ASSOC, MYSQL_NUM
  echo "Id: {$row['some_id']} <br />".
       "Name: {$row['some_name']}";
}
mysql_free_result($result); // releases cursor memory
echo "Fetched data successfully.";
mysql_close($conn);

 ?>

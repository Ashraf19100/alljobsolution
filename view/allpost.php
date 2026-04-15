<?php
require_once '../database/database.php';

$alljob = new datamodel();
$result = $alljob->getData('jobs');
print('<pre>');
print_r($result);
print('</pre>');

?>
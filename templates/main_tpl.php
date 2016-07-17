<div>

<a href="" class="btn btn-default"> Creare articol </a>
</div>
<br>

<div>

<?php

$con = db_connect(array(
        'host' => '127.0.0.1',
        'port' => 3306,
        'database' => 'cylex',
        'charset' => 'utf8',
        'user' => 'root',
        'pass' => '',
));



$query = "SELECT * FROM articole ORDER BY data DESC";
$results = db_select($con, $query);

echo template('articole/articole_tpl', array(
    'articole' => $results,
));


?>





</div>

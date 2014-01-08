<?php

//In case that there is not data or caculations required, the value for this option it's a -1

require_once 'inicialize.php';

$database=inicialize();

$view=input();

$data=requireData($database, $view);

$result=calculations($data, $view);

output($database,$data,$view,$result);

?>
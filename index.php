
<?php
use MyApp\api\Groups;

require_once 'vendor/autoload.php';

header('Access-Control-Allow-Origin: *');
header('content-Type: application/json');

//Calling Groups API CRUD
$request = new Groups();
echo ($request->getRequest());




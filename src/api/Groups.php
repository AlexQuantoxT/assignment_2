<?php

namespace MyApp\api;

use MyApp\classes\Groups as ClassesGroups;

require_once '../../vendor/autoload.php';
header('Access-Control-Allow-Origin: *');
header('content-Type: application/json');

class Groups
{
    public function getRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $create = new ClassesGroups();
            return ($create->create());
        } elseif ($_SERVER['REQUEST_METHOD'] === "GET") {
            $read = new ClassesGroups();
            return $read->read();
        } elseif ($_SERVER['REQUEST_METHOD'] === "PATCH") {
            $patch = new ClassesGroups();
            return $patch->update();
        } elseif ($_SERVER['REQUEST_METHOD'] === "DELETE") {
            $delete = new ClassesGroups();
            return $delete->delete();
        }
    }
}

//Calling Groups API CRUD
$request = new Groups();
echo ($request->getRequest());

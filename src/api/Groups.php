<?php
namespace MyApp\api;

use MyApp\classes\Groups as ClassesGroups;

class Groups {
    public function getRequest(){
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $create = new ClassesGroups();
            return ($create->create());
        }
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $read = new ClassesGroups();
            return $read->read();
        }
        if ($_SERVER['REQUEST_METHOD'] === "PATCH") {
            $patch = new ClassesGroups();
            return $patch->update();
        }
        if ($_SERVER['REQUEST_METHOD'] === "DELETE") {
            $delete = new ClassesGroups();
            return $delete->delete();
        }                    
    }
    
}
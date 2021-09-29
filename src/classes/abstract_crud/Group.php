<?php
namespace MyApp\classes\abstract_crud;

abstract class CRUDGroup{
    abstract public function create($group_name);
    abstract public function read($group_id);
    abstract public function update($group_id,$group_name);
    abstract public function delete($group_id);
}
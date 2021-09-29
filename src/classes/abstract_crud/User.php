<?php
namespace MyApp\classes\abstract_crud;

abstract class CRUDGroup{
    abstract public function create($user_name,$user_lastname,$role_id,$group_id);
    abstract public function read($user_id);
    abstract public function update($user_id,$user_name,$user_lastname,$role_id,$group_id);
    abstract public function delete($user_id);
}
<?php

namespace MyApp\classes\crud_classes;

use MyApp\classes\abstract_crud\CRUDGroup as CRUDGroup;
use MyApp\classes\ConnDB;

class Group extends CRUDGroup{
    private $table_name = "users";
    public function __construct(ConnDB $conn)
    {
        $this->conn = $conn;
    }
    public function create($group_name)
    {
        $sql = "INSERT INTO :table_name VALUES(null,:group_name);";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':group_name', $group_name);
        return $stmt->execute();
    }
    public function read($group_id)
    {
        $sql = "SELECT groups.group_id, groups.group_name, roles.role_name, users.name, users.lastname 
                FROM ((groups LEFT JOIN users ON groups.group_id = users.group_id) 
                LEFT JOIN roles ON users.role_id = roles.role_id) WHERE groups.groups_id = :group_id ORDER BY groups.group_id ASC;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':group_id', $group_id);
        return $stmt->execute();
    }
    public function update($group_id, $group_name)
    {
        $sql = "UPDATE groups
                SET groups.group_name = :group_name  
                WHERE groups.groups_id = :group_id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':group_name', $group_name);
        $stmt->bindParam(':group_id', $group_id);
        return $stmt->execute();
    }
    public function delete($group_id)
    {
        $sql = "DELETE FROM groups WHERE groups.groups_id = :group_id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':group_id', $group_id);
        return $stmt->execute();
    }
}
<?php

namespace MyApp\classes\crud_classes;

use MyApp\classes\abstract_crud\CRUDUser;
use MyApp\classes\ConnDB;

class Group extends CRUDUser{
    private $table_name = "users";
    public function __construct(ConnDB $conn)
    {
        $this->conn = $conn;
    }
    public function create($user_name, $user_lastname, $role_id, $group_id)
    {
        $sql = "INSERT INTO users VALUES(null,:user_name,:user_lastname,:role_id,:group_id);";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':user_lastname', $user_lastname);
        $stmt->bindParam(':role_id', $role_id);
        $stmt->bindParam(':group_id', $group_id);
        return $stmt->execute();
    }
    public function read($user_id)
    {
        $sql = "SELECT users.user_id,users.name,users.lastname,groups.group_id, groups.group_name,roles.role_name
                FROM ((users LEFT JOIN groups ON users.user_id = groups.group_id)
                LEFT JOIN roles ON users.role_id = roles.role_id) WHERE users.user_id = :user_id ORDER BY users.name ASC;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        return $stmt->execute();
    }
    public function update($user_id, $user_name, $user_lastname, $role_id, $group_id)
    {
        $sql = "UPDATE users SET users.name = :user_name, users.lastname = :user_lastname, users.role_id = :role_id, users.group_id = :group_id 
                WHERE users.user_id = :user_id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':user_lastname', $user_lastname);
        $stmt->bindParam(':role_id', $role_id);
        $stmt->bindParam(':group_id', $group_id);
        return $stmt->execute();

    }
    public function delete($user_id)
    {
        $sql = "DELETE FROM users WHERE users.user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        return $stmt->execute();
    }
}
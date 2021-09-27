<?php
namespace MyApp\classes;

use MyApp\interfaces\CRUD;

class Groups extends ConnDB implements CRUD{
    private $table = 'groups';
    private $conn;
    public $group_name;

    public function __construct()
        {
            $this->conn = $this->connect();
        }

    public function create(){
            if (!isset($_POST['group_name'])) {
                $arr = array('message: '=>'EMPTY POST');
                return json_encode($arr);
            }
            $group_name = $_POST['group_name'];
            // echo $group_name;
            $sql = "insert into " . $this->table . " values(null,'{$group_name}');";
            $stmt = $this->conn->prepare($sql);
            $is_created = $stmt->execute();
            if ($is_created) {
                return true;
            }else{
                $arr = array('message: '=>'Faild');
                return json_encode($arr);
                // return http_response_code(404);
            }
    }
    public function read(){
                $sql = 'select groups.groups_id, groups.group_name, roles.role_name, users.name, users.lastname 
                from ((groups left join users on groups.groups_id = users.groups_id) 
                left join roles on users.role_id = roles.role_id) order by groups.groups_id asc;';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    foreach ($stmt as $key => $value) {
                        $arr['data']['groups'][] = $value; 
                    }
                return json_encode($arr);
                }else{
                    $arr = array('message: '=>'NOTHING TO RETURN');
                    return json_encode($arr);
                }
    }
    public function update(){
        $group_name=file_get_contents("php://input");
        return $group_name;
        // $sql = "UPDATE groups
        //         SET groups.group_name = '{$group_name}'  
        //         WHERE groups.groups_id = 3;";
        // $stmt = $this->conn->prepare($sql);
        // $stmt->execute();
    }
    public function delete(){
        
    }
}
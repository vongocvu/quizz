<?php 
    class UserModel extends Model {
         function getAllUser () {
            return $this->getAll('user');
        }

        function insertUser($data) {
            $this->insertData('user', $data);
        }
    }
?>
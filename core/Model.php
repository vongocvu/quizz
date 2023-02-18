<?php 
   class Model extends Database {
        public function getAll ($table) {
            return $this->__conn->query("SELECT * FROM $table");
        }

        public function getOne ($table, $condition) {
            return $this->__conn->query("SELECT * FROM $table WHERE $condition");
        }

        public function query ($sql) {
            return $this->__conn->query($sql);
        }

        function lastInsertId(){
            return mysqli_insert_id($this->__conn);
        }
   }
?>
<?php
class Database extends DB
{
      use QueryBuilder;

      function insertData($table, $data)
      {
            if (!empty($data)) {
                  $fieldStr = '';
                  $valueStr = '';

                  foreach ($data as $key => $item) {
                      $fieldStr.=  $key.",";
                      $valueStr.= "'".$item."',";
                  }

                  $fieldStr = rtrim($fieldStr, ",");
                  $valueStr = rtrim($valueStr ,",");

                  $sql = "INSERT INTO $table($fieldStr) VALUES($valueStr)";
                  $this->__conn->query($sql);
                  return true;
            } else {
                  return false;
            }
      }

      function updateData($table, $data, $relationship)
      {
            if (!empty($data)) {
                  $valueStr = '';

                  foreach ($data as $key => $item) {
                      $valueStr.= $key . "='" .$item."',";
                  }

                  $valueStr = rtrim($valueStr ,",");

                  $sql = "UPDATE $table SET $valueStr WHERE $relationship";
                  $this->__conn->query($sql);
                  return true;
            } else {
                  return false;
            }
      }


      function deleteData($table, $relationship) {
            $sql = "DELETE FROM $table WHERE $relationship";
            $this->__conn->query($sql);
            return true;
      }
}

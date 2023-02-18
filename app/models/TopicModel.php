<?php 
  class TopicModel extends Model {
      function insertTopic($data) {
          $this->insertData('topic', $data);
          return $this->lastInsertId();
      }
  }
?>
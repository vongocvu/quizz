<?php
   class DB extends Connection{
      public $db;
      public function __construct () {
          $this->db = parent::__connect();
      }
   }
?>
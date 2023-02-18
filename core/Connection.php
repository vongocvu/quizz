<?php
include_once _DIR_ROOT_ . '/configs/database.php';

class Connection {

	public $__conn = NULL;
	private $server = DB_HOST;
	private $dbName = DB_NAME;
	private $user = DB_USER;
	private $password = DB_PASSWORD;
        
        // Hàm kết nối CSDL
	public function __connect()
	{
		$this->__conn = new mysqli($this->server, $this->user, $this->password, $this->dbName);

		if ($this->__conn->connect_error) {
			printf($this->__conn->connect_error);
			exit();
		}
		$this->__conn->set_charset("utf8");
	}
        // Hàm đóng kết nối CSDL
        public function closeDatabase()
	{
		if ($this->__conn) {
			$this->__conn->close();
		}
	}
}
<?php
Class MyDatabase {
	
	public $host = DB_HOST;
	public $user = DB_USER;
	public $password = DB_PASSWORD;
	public $dbname = DB_NAME;
	
	
	public $link;
	public $error;

	public function __construct(){
		$this->connectDB();
	}
	
	private function connectDB(){
		$this->link = new mysqli($this->host, $this->user, $this->password, $this->dbname);
		if(!$this->link){
			$this->error = "Connection failed". $this->link->connect_error;
			return false;
		}
	}
	//select from db
	public function select($q){
		$result = $this->link->query($q) or die ($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		}else{
			return false;
		}
	}
	
	public function insert($q){
		$insert_row = $this->link->query($q) or die ($this->link->error.__LINE__);
		if($insert_row){
			header("Location: index.php?msg=".urlencode('Data inserted successfully.'));
			exit();
		} else {
			die("Error : ".$this->link->errno."Description: ".$this->link->error);
		}
	}
}
?>
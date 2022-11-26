<?php   
class LoginUser{
	// class properties
	private $username;
	private $password;
	public $error;
	public $success;
	private $storage = "testlogin.json";	//storage place in json file name
	private $stored_users;

	// class methods
	public function __construct($username, $password){
		$this->username = $username;
		$this->password = $password;
		$this->stored_users = json_decode(file_get_contents($this->storage), true);
		$this->login();
	}


	private function login(){
		foreach ($this->stored_users as $user) {
			if($user['username'] == $this->username){
				//if(password_verify($this->password, $user['password'])){	//encryted 
				if($user['password'] == $this->password){	//not encryted password
					session_start();	
					$_SESSION['user'] = $this->username;
					header("location: accounttest.php"); exit();	//redirect to this page
				}
			}
		}
		return $this->error = "Wrong username or password";
	}

 }


?>
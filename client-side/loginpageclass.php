<?php   
class LoginUser{
	// class properties
	private $firstname;
	private $password;
	public $error;
	public $success;
	private $storage = "SignupPage.json";	//storage place in json file name
	private $stored_users;

	// class methods
	public function __construct($firstname, $password){
		$this->firstname = $firstname;
		$this->password = $password;
		$this->stored_users = json_decode(file_get_contents($this->storage), true);
		$this->login();
	}


	private function login(){
		foreach ($this->stored_users as $user) {
			if($user['firstname'] == $this->firstname){
				//if(password_verify($this->password, $user['Password'])){	//encryted 
				if($user['Password'] == $this->password){	//not encryted password
					session_start();	
					$_SESSION['user'] = $this->firstname;
					header("location: homepage.html"); exit();	//redirect to this page
				}
			}
		}
		return $this->error = "Wrong username or password";
	}

 }


?>
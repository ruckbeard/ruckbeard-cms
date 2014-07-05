<?php

class User 
{
		
	public $id;
	public $admin;
	public $last_login;
	public $email;
	public $firstName;
	public $lastname;
	public $name;
	public $pclass;
	public $isLoggedIn = false;
	public $characterCreated = false;
	public $timezone;
	
	function __construct()
	{
		if (session_id() == "")
		{
			session_start();
		}
		if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true)
		{
			$this->_initUser();
		}
	} //end __construct
	
	public function authenticate($user,$pass)
	{
		if (session_id() == "") {
			session_start();
		}
		$_SESSION['isLoggedIn'] = false;
		$this->isLoggedIn = false;
		
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno)
		{
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
				return false;
		}
		$safeUser = $mysqli->real_escape_string($user);
		$incomingPassword = $mysqli->real_escape_string($pass);
		$query = "SELECT * from player WHERE email = '{$safeUser}'";
		if (!$result = $mysqli->query($query))
		{
			error_log("Cannot retrieve account for {$user}");
			return false;
		}
		// Will be only one row, so no while() loop needed
		$row = $result->fetch_assoc();
		$dbPassword = $row['password'];
		
		if (crypt($incomingPassword,$dbPassword) != $dbPassword)
		{
			error_log("Passwords for {$user} don't match. {$incomingPassword} {$dbPassword}");
			return false;
		}
		
		$this->id = $row['id'];
		$this->admin = $row['admin'];
		$this->last_login = $row['last_login'];
		$this->email = $row['email'];
		$this->firstName = $row['first_name'];
		$this->lastName = $row['last_name'];
		$this->name = $row['name'];
		$this->pclass = $row['class'];
		$this->isLoggedIn = true;
		
		$this->_setSession();
		
		return true;
	} //end function Authenticate
	
	private function _setSession() {
		
		if (session_id() == '')
		{
			session_start();
		}
		
		$_SESSION['id'] = $this->id;
		$_SESSION['admin'] = $this->admin;
		$_SESSION['last_login'] = $this->last_login;
		$_SESSION['email'] = $this->email;
		$_SESSION['first_name'] = $this->firstName;
		$_SESSION['last_name'] = $this->lastName;
		$_SESSION['name'] = $this->name;
		$_SESSION['class'] = $this->pclass;
		$_SESSION['isLoggedIn'] = $this->isLoggedIn;
		$_SESSION['characterCreated'] = $this->characterCreated;
	} // End function setSession
	
	private function _initUser()
	{
		if (session_id() == '')
		{
			session_start();
		}
		
		$this->id = $_SESSION['id'];
		$this->admin = $_SESSION['admin'];
		$this->last_login = $_SESSION['last_login'];
		$this->email = $_SESSION['email'];
		$this->firstName = $_SESSION['first_name'];
		$this->lastName = $_SESSION['last_name'];
		$this->isLoggedIn = $_SESSION['isLoggedIn'];
		$this->name = $_SESSION['name'];
		$this->plcass = $_SESSION['class'];
		$this->characterCreated = $_SESSION['characterCreated'];
	} //end function initUser
	
	public function refreshUser()
	{
		
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno)
		{
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
				return false;
		}
		$user = $this->email;
		$safeUser = $mysqli->real_escape_string($user);
		$query = "SELECT * from player WHERE email = '{$safeUser}'";
		if (!$result = $mysqli->query($query))
		{
			error_log("Cannot retrieve account for {$user}");
			return false;
		}
		// Will be only one row, so no while() loop needed
		$row = $result->fetch_assoc();
		
		$this->id = $row['id'];
		$this->admin = $row['admin'];
		$this->last_login = $row['last_login'];
		$this->email = $row['email'];
		$this->firstName = $row['first_name'];
		$this->lastName = $row['last_name'];
		$this->name = $row['name'];
		$this->pclass = $row['class'];
		
		$this->_setSession();
	}
	
	public function logout()
	{
		$this->isLoggedIn = false;
		
		if (session_id() == '')
		{
			session_start();	
		}
		
		$_SESSION['isLoggedIn'] = false;
		foreach ($_SESSION as $key => $value)
		{
			$_SESSION[$key] = "";
			unset ($_SESSION[$key]);
		}
		
		$_SESSION = array();
		if (ini_get("session.use_cookies"))
		{
			$cookiesParameters = session_get_cookie_params();
			setcookie(session_name(), '', time() - 28800, $cookieParameters['path'],$cookieParameters['domain'],$cookieParemeters['secure'],$cookieParameters['httponly']);	
		} //end if
		
		session_destroy();
	} //end function logout
} //end class User
?>
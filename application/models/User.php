<?php
Class User extends CI_Model
{
	function login($username, $password)
	{
		$this -> db -> select('id, username, password');
		$this -> db -> from('users');
		$this -> db -> where('username = ' . "'" . $username . "'");
		$this -> db -> where('password = ' . "'" . MD5($password) . "'");
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	function isuser($username){
		$this -> db -> select('*');
		$this -> db -> from('users');
		$this -> db -> where("username = '".$username."'");

		$query = $this -> db -> get();

		if($query -> num_rows() ==0){
			return true;
		}else{
			return false;
		}
	}

	function registration($password, $f_name, $l_name,$date,$about,$username,$profile,$background){
		$data = array(
			'password' => $password,
			'username' => $username,
			'f_name' => $f_name ,
			'l_name' =>$l_name ,
			'date_b' => $date,
			'about' => $about ,
			'profile' => $profile,
			'background' => $background,
		);

		$this->db->insert('users',$data);
	}
}
?>

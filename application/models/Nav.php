<?php
Class Nav extends CI_Model
{
  function home($id){
    $this -> db -> select('id,username,f_name,l_name,date_b,profile,background,about');
    $this -> db -> from('users');
    $this -> db -> where('id = ' . "'" . $id . "'");
    $this -> db -> limit(1);

    $query=$this -> db -> get();
    $result['users']=$query -> result();

    if($query -> num_rows() ==1){
      $this -> db -> select('id,author,title,text,date');
      $this -> db -> from('posts');
      $this -> db -> where("author = '".$id."'");

      $query=$this -> db -> get();
      $result['posts']=$query -> result();

      return $result;
    }else{
      return false;
    }
  }

  function global_tab($id){
    $this -> db -> select('id,username,f_name,l_name,date_b,profile,background,about');
    $this -> db -> from('users');
    $this -> db -> where('id = ' . "'" . $id . "'");
    $this -> db -> limit(1);

    $query=$this -> db -> get();
    $result['users']=$query -> result();

    if($query -> num_rows() ==1){
      $this -> db -> select('id,photo_author,name_author,nick_author,title,text,date');
      $this -> db -> from('authorposts');

      $query=$this -> db -> get();
      $result['posts']=$query -> result();

      return $result;
    }else{
      return false;
    }
  }

  function gallery($id){
		$this -> db -> select('id,username,f_name,l_name,date_b,profile,background,about');
		$this -> db -> from('users');
		$this -> db -> where('id = ' . "'" . $id . "'");
		$this -> db -> limit(1);

		$query=$this -> db -> get();
		$result['users']=$query -> result();

		if($query -> num_rows() ==1){
			$this -> db -> select('*');
			$this -> db -> from('photos');
			$this -> db -> where('author = "'.$id.'"');

			$query=$this -> db -> get();
			$result['photos']=$query -> result();

			return $result;
		}else{
			return false;
		}
	}

  function comments($id){
    $this -> db -> select('*');
    $this -> db -> from('authorcomments');
    $this -> db -> where('id_post = "'.$id.'"');

    $query=$this -> db -> get();
    $result = $query -> result();

    if($query -> num_rows() >0){
      return $result;
    }else{
      return false;
    }
  }


	function photocomments($id){
		$this -> db -> select('*');
		$this -> db -> from('authorcomments');
		$this -> db -> where('id_photo ="'.$id.'"');

		$query=$this -> db -> get();
		$result = $query -> result();

		if($query -> num_rows() >0){
			return $result;
		}else{
			return false;
		}
	}

  function favourite($id){
		$this -> db -> select('id,username,f_name,l_name,date_b,profile,background,about');
		$this -> db -> from('users');
		$this -> db -> where('id = ' . "'" . $id . "'");
		$this -> db -> limit(1);

		$query=$this -> db -> get();
		$result['users']=$query -> result();

		if($query -> num_rows() ==1){
			$this -> db -> select('*');
			$this -> db -> from('favouriteusers');
			$this -> db -> where('id_user ='.$id);

			$query=$this -> db -> get();
			$result['fav']=$query -> result();

			return $result;
		}else{
			return false;
		}
	}

	function profile($nick){
		$this -> db -> select('id,username,f_name,l_name,date_b,profile,background,about');
		$this -> db -> from('users');
		$this -> db -> where('username = ' . "'" . $nick . "'");
		$this -> db -> limit(1);

		$query=$this -> db -> get();
		$result['users']=$query -> result();
		$row = $query -> row();
		if($query -> num_rows() ==1){
			$this -> db -> select('id,author,title,text,date');
			$this -> db -> from('posts');
			$this -> db -> where("author = '".$row -> id."'");

			$query=$this -> db -> get();
			$result['posts']=$query -> result();

			return $result;
		}else{
			return false;
		}
	}

  function galleryprofile($user){
		$this -> db -> select('id,username,f_name,l_name,date_b,profile,background,about');
		$this -> db -> from('users');
		$this -> db -> where('username = ' . "'" . $user . "'");
		$this -> db -> limit(1);

		$query=$this -> db -> get();
		$result['users']=$query -> result();
		$row = $query -> row();
		if($query -> num_rows() ==1){
			$this -> db -> select('*');
			$this -> db -> from('photos');
			$this -> db -> where('author = "'.$row->id.'"');

			$query=$this -> db -> get();
			$result['photos']=$query -> result();

			return $result;
		}else{
			return false;
		}
	}
}
?>

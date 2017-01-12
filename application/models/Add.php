<?php
Class Add extends CI_Model
{
  function addcomments($text, $id, $id_author, $post){
    if($post==TRUE){
      $data = array(
          'author' => $id_author ,
          'date' => date('y-m-d'),
          'text' => $text,
          'post' => $id,
          'photo' => NULL,
        );
    }else{
      $data = array(
          'author' => $id_author ,
          'date' => date('y-m-d'),
          'text' => $text,
          'post' => NULL,
          'photo' => $id,
        );
    }

    $this -> db -> insert('comments', $data);

    return "dodano komentarz";
  }

  function liked($nick,$id){
		$this -> db -> select('*');
		$this -> db -> from('favouriteusers');
		$this -> db -> where('id_user = '.$id);
		$this -> db -> where("fav_nick = '".$nick."'");

		$query = $this -> db -> get();

		if($query -> num_rows() == 0){
			$this -> db -> select('*');
			$this -> db -> from('users');
			$this -> db -> where("username = '".$nick."'");

			$query = $this -> db -> get();
			$row = $query -> row();

			$data = array('id_user' => $id, 'favourite' => $row->id);

			$this -> db -> insert('favourite', $data);

			return true;
		}else{
			return false;
		}
	}

	function addphoto($text, $title, $photo, $id){
		$data = array(
			'description' => $text,
			'title' => $title,
			'date' => date('y-m-d'),
			'photo' => $photo,
			'author' => $id
	 	);

		$this -> db -> insert('photos', $data);
	}

	function addpost($text, $title, $id){
		$data = array(
			'author' => $id,
			'title' => $title,
			'text' => $text,
			'date' =>  date('y-m-d')
		);

		$this -> db -> insert('posts', $data);
	}
}
?>

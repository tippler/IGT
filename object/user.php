<?php

  class User{
	public $user_name;
	public $user_pass;
	public $user_descript;
	
	
	
	function __construct($userName,$userPass,$userDescript){
		$this->user_name=$userName;
		$this->user_pass=$userPass;
		$this->user_descript=$userDescript;
	}
	
	/*
	function get_article_id(){
	      return $this->article_id;
	}
	function get_artText(){
	      return $this->artText;
	}*/
	
  }


?> 

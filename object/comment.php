 
<?php

  class Comment{
	
	public $com_id;
	public $art_id;
	public $comTitle;
	public $comText;
	
	
	
	function __construct($com_id,$art_id,$comTitle,$comText){
		
		$this->com_id=$com_id;
		$this->art_id=$art_id;
		$this->comTitle=$comTitle;
		$this->comText=$comText;
		
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
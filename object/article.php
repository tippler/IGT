<?php

  class Article{
	public $article_id;
	public $artText;
	public $artDate;
	public $artRate;
	public $artComNum;
	public $author;
	public $artCategory;
	
	
	
	function __construct($article_id,$author,$artCategory,$artText,$artDate,$artRate,$artComNum){
		$this->article_id=$article_id;
		$this->author=$author;
		$this->artCategory=$artCategory;
		$this->artText=$artText;
		$this->artDate=$artDate;
		$this->artRate=$artRate;
		$this->artComNum=$artComNum;
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

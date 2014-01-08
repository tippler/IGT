<?php
function storageArticles($link,$result){
	
	//Storage the articles in to an array of objects article
		$articlesArray=array();
	$i=0;
	while( $row = mysqli_fetch_array($result)){
		  $articlesArray[$i]=new Article($row["article_id"],$row["author"],$row["artCategory"],$row["artText"],$row["artDate"],$row["artRate"],$row["artComNum"]);
		  $i++;
	}

	return $articlesArray;
      
}

function storageComments($link,$result){
      
	//Storage the articles in to an array of objects article
	$commentsArray=array();
	$i=0;
	while( $row = mysqli_fetch_array($result)){
		  $commentsArray[$i]=new Comment($row["com_id"],$row["art_id"],$row["comTitle"],$row["comText"]);
		  $i++;
	}

	return $commentsArray;
      
}
?>

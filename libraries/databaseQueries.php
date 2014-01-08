<?php
//just open the database and return a link param "name_of_the_database"

    function openDatabase($usrName,$usrPass,$datName){

    $link = mysqli_connect("localhost",$usrName,$usrPass,$datName);

    if( !$link ) {
      print "<p> Connection Error: " ;
      print  mysqli_connect_error(); 
      print "</p>\n";
      exit();
    }
    return $link;
  }
  
 //you specify the link of the database, and the kind of view that you want int "default" ordered more recent first 
 //                                                                             "2" more rated first
 //                                                                             "3" more commented first
 
 function countArticles($link,$category){
	$result = mysqli_query($link," SELECT * FROM article");
	$count = mysqli_num_rows ($result);
	if ($category=="all"){
		$result = mysqli_query($link," SELECT * FROM article");
		$count = mysqli_num_rows ($result);
	}
	else{
		$result = mysqli_query($link,"SELECT * FROM article WHERE artCategory=\"$category\" ");
		$count = mysqli_num_rows ($result);
	}
	return $count;
 }
 
 
 
 
 
 function searchArticles($link,$order,$category,$page,$noOfArticlesView,$totalArticlesNumber){
 $noOfpages=(intval ($totalArticlesNumber/$noOfArticlesView)+1);
 $stillWithoutView=$noOfArticlesView;
 
	if($page==($noOfpages-1)){
		$stillWithoutView=$totalArticlesNumber-(($noOfpages-1)*$noOfArticlesView);
	}
        if ($category=="all"){

	    switch ($order){
	      case 1:
		$result = mysqli_query($link,"SELECT * FROM article ORDER BY article_id DESC LIMIT ".($page*$noOfArticlesView).",".$stillWithoutView."");
		break;
	      case 2:
		$result = mysqli_query($link,"SELECT * FROM article ORDER BY artRate DESC LIMIT ".($page*$noOfArticlesView).",".$stillWithoutView."");
		break;
	      case 3:
		$result = mysqli_query($link,"SELECT * FROM article ORDER BY artComNum DESC LIMIT ".($page*$noOfArticlesView).",".$stillWithoutView."");
		break;
	      default:
		$result = mysqli_query($link,"SELECT * FROM article ORDER BY article_id DESC LIMIT ".($page*$noOfArticlesView).",".$stillWithoutView."");
	    }
	}else{
	    switch ($order){
	      case 1:
		$result = mysqli_query($link,"SELECT * FROM article WHERE artCategory=\"$category\" ORDER BY article_id DESC LIMIT ".($page*$noOfArticlesView).",".$stillWithoutView."");
		break;
	      case 2:
		$result = mysqli_query($link,"SELECT * FROM article WHERE artCategory=\"$category\" ORDER BY artRate DESC LIMIT ".($page*$noOfArticlesView).",".$stillWithoutView."");
		break;
	      case 3:
		$result = mysqli_query($link,"SELECT * FROM article WHERE artCategory=\"$category\" ORDER BY artComNum DESC LIMIT ".($page*$noOfArticlesView).",".$stillWithoutView."");
		break;
	      default:
		$result = mysqli_query($link,"SELECT * FROM article WHERE artCategory=\"$category\" ORDER BY article_id DESC LIMIT ".($page*$noOfArticlesView).",".$stillWithoutView."");
	    }
	}
return $result;
}
function searchUser ($link, $user){
	$result =mysqli_query($link,"SELECT * FROM user WHERE userName = '$user'");
	return $result;
}

function searchArticleById($link, $articleId){
	$result =mysqli_query($link,"SELECT * FROM article WHERE article_id = $articleId");
	return $result;
}


function searchUserArticles($link, $userName){
	$result = mysqli_query($link,"SELECT * FROM article WHERE author=\"$userName\" ORDER BY article_id DESC");
	return $result;
}

function searchArticleComments($link,$articleId){
	$result =mysqli_query($link,"SELECT * FROM comments WHERE art_id = $articleId");
	return $result;
}

function insertCommentArticle ($link,$articleId, $Title, $Text){
	$result=mysqli_query($link,"INSERT INTO comments (art_id, comTitle, comText) VALUES(\"$articleId\",\"$Title\",\"$Text\")");
	if ($result){
		$new=$_SESSION["article"]->artComNum+1;
		$result=mysqli_query($link,"UPDATE article SET artComNum=\"$new\" WHERE article_id=\"$articleId\"  ");
		if ($result){return 1;}
	}
	return -1;
}

function insertUser($link,$userName, $userPass, $userDescription){
	$result=mysqli_query($link,"INSERT INTO user (userName, password, description) VALUES(\"$userName\",\"$userPass\",\"$userDescription\")");
	if($result){
		return 1;
	}
	return -1;
}

function insertArticle($link, $artCategory, $artText){
	$author=$_COOKIE["user"];
	$result=mysqli_query($link, "INSERT INTO article (author, artCategory, artText)VALUES (\"$author\",\"$artCategory\",\"$artText\")");
	return $result;
}

function insertPossitiveRate($link, $articleId){
	$result =mysqli_query($link,"SELECT artRate FROM article WHERE article_id = $articleId");
	$row = mysqli_fetch_array($result);
	$new=$row["artRate"];
	$new=$new+1;
	$result=mysqli_query($link,"UPDATE article SET artRate=\"$new\" WHERE article_id=\"$articleId\"  ");
	return $result;
}

function insertNegativeRate($link, $articleId){
	$result =mysqli_query($link,"SELECT artRate FROM article WHERE article_id = $articleId");
	$row = mysqli_fetch_array($result);
	$new=$row["artRate"];
	$new=$new-1;
	$result=mysqli_query($link,"UPDATE article SET artRate=\"$new\" WHERE article_id=\"$articleId\"  ");
	return $result;
}
?>
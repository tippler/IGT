 
<?php
/*return option defines the kind of view that we have depending the GET variables and the SESSION variables

        THE DIFERENT VIEWS OF THE WEBPAGE ARE:

-1  Homepage///-------The user want to change the view options
-2  Homepage///*******The user want to change the category
-3  Homepage///-------It's the first time that the user access to the page 
-4  Homepage///*******The user want to change the page
-13 Homepage///-------The user want's to change the number of the pages that are viewed
-5  Login///----------The user wants to view his profile
-6  Login///**********The user wants to login
-7  Login///----------The user makes a try to login
-8  Article///********The user wants to view an article
-9  Registration///---The user wants to be registered 
-10 Write///**********The view of write an article!!!!!
-11 Logout///---------The user wants to logout
-12 Comment///********The user wants to submit a comment 
-14 Registration///---The user wants to submit
-15 Article///********The user wants to submit an article
*/


function requireData($link, $view){
	
	switch ($view){
	
	
	//HOMEPAGE
		case 1:
			$_SESSION["viewOp"]=$_GET["viewOp"];
			$_SESSION["pageNo"]=0;
			$result=searchArticles($link,$_SESSION["viewOp"],$_SESSION["viewCat"],$_SESSION["pageNo"],$_SESSION["noOfArticlesView"],$_SESSION["noTotalArticles"]);
			if (isset($result)){
				$data=storageArticles($link,$result);
			}else{
				$data=-1;
			}
		break;
		case 2:
			$_SESSION["viewCat"]=$_GET["viewCat"];
			$_SESSION["pageNo"]=0;
			$_SESSION["viewOp"]=1;
			$_SESSION["noTotalArticles"]=countArticles($link,$_SESSION["viewCat"]);
			$result=searchArticles($link,$_SESSION["viewOp"],$_SESSION["viewCat"],$_SESSION["pageNo"],$_SESSION["noOfArticlesView"],$_SESSION["noTotalArticles"]);
			if (isset($result)){
				$data=storageArticles($link,$result);
			}else{
				$data=-1;
			}
		break;
		case 3:
			$_SESSION["pageNo"]=0;
			$_SESSION["viewOp"]=1;
			$_SESSION["viewCat"]="all";
			$_SESSION["noOfArticlesView"]=4;
			$_SESSION["noTotalArticles"]=countArticles($link,$_SESSION["viewCat"]);
			$result=searchArticles($link,$_SESSION["viewOp"],$_SESSION["viewCat"],$_SESSION["pageNo"],$_SESSION["noOfArticlesView"],$_SESSION["noTotalArticles"]);
			if (isset($result)){
				$data=storageArticles($link,$result);
			}else{
				$data=-1;
			}
			
		break;		
		case 4:
			$_SESSION["pageNo"]=$_GET["pageNo"];
			$result=searchArticles($link,$_SESSION["viewOp"],$_SESSION["viewCat"],$_SESSION["pageNo"],$_SESSION["noOfArticlesView"],$_SESSION["noTotalArticles"]);
			if (isset($result)){
				$data=storageArticles($link,$result);
			}else{
				$data=-1;
			}
		break;
		case 13:
			$_SESSION["pageNo"]=0;
			$_SESSION["noOfArticlesView"]=$_GET["noOfArticlesView"];
			$result=searchArticles($link,$_SESSION["viewOp"],$_SESSION["viewCat"],$_SESSION["pageNo"],$_SESSION["noOfArticlesView"],$_SESSION["noTotalArticles"]);
			if (isset($result)){
				$data=storageArticles($link,$result);
			}else{
				$data=-1;
			}
		break;
		
		
		
		case 5:
			$result=searchUserArticles($link, $_COOKIE["user"]);
			if (isset($result)){
				$data=storageArticles($link,$result);
			}else{
				$data=-1;
			}
		break;
		case 6:
		$data=-1;
		break;
		case 7: 			
			$result=searchUser($link, $_POST["user"]);
			if ($row = mysqli_fetch_array($result)){
				$user=new User($row["userName"],$row["password"],$row["description"]);
				$data=$user;
			}else{
				return -1;
			}
			
		break;
		case 8:
			$result=searchArticleById($link, $_GET["Article"]);
			if ($row = mysqli_fetch_array($result)){
				$article=new Article($row["article_id"],$row["author"],$row["artCategory"],$row["artText"],$row["artDate"],$row["artRate"],$row["artComNum"]);
				$_SESSION["article"]=$article;
			}else{
				return -1;
			}
			$result=searchArticleComments($link,$_GET["Article"]);
			if (isset($result)){
				$comments=storageComments($link,$result);
				
				$data=$comments;
			}else{
				return -1;
			}
		
		
		break;
		case 9:
		case 10:
		$data=-1;
		
		break;
		
		
		
		case 11:
			setcookie("user", $_COOKIE["user"], time()-36000);
			//we dont need data
			$data=-1;
		break;
		
		case 12:
			$articleId=$_SESSION["article"]->article_id;
			$data=insertCommentArticle($link, $articleId, $_POST["commentTitle"], $_POST["commentText"]);
			
		break;
		
		case 14:if(strlen($_POST["userNameSub"])<7&&strlen($_POST["userPassSub"])<7&&strlen($_POST["userDescSub"])<7){
				$data=insertUser($link,$_POST["userNameSub"],$_POST["userPassSub"],$_POST["userDescSub"]);
			}else{
				$data=false;
			}
		break;
		case 15:
			if(strlen($_POST["articleTextSub"])<2000){
				$data=insertArticle($link,$_POST["articleCatSub"],$_POST["articleTextSub"]);
			}else{
				$data=false;
			}
		break;
		case 16:
			$articleId=$_GET["rate1"];

			$data=insertPossitiveRate($link, $articleId);
		break;
		case 17:
			$articleId=$_GET["rate2"];
			$data=insertNegativeRate($link, $articleId);
		break;
	}
return $data;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////          END OF THE VIEWS            //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<?php

//this fuction catch all the information and generate the html
function output($link,$data,$option,$result){
switch ($option){
	case 1:
	case 2:
	case 3:
	case 4:
	case 13:
		$articlesArray=$data;
		$noTotalArticles=$_SESSION["noTotalArticles"];
		//first we print the header that will be the same for all the pages
		headerOutput($link);
		
		
		
		
		print('<div id="entradaContainer">');
		
		
		if ($articlesArray){
			for ($i=0;$i<sizeof($articlesArray);$i++){
				  resumeArticle($articlesArray,$i);
				  print "<br>";
			}
		}else{
			printf("<h3 style=\"color:#43403F\">There is not articles in the database</h3>");
		}
		
		pageMenuOutput($_SESSION["pageNo"],$_SESSION["noOfArticlesView"],$noTotalArticles);
		
	//close the page

		printf ("			</div> ");
		endOutput();
	break;
	case 5:
		$articlesArray=$data;
		headerOutput($link);
		
		
		print('<div id="entradaContainer">');
		
		printf("<h1 style=\"color:#43403F\">".$_SESSION["user"]->user_name."</h1><br /><br /><br />");
		printf("<h3 style=\"color:#43403F\">About me:</h3>");
		printf("<h4 style=\"color:#43403F\">".$_SESSION["user"]->user_descript."</h4><br /><br /><br />");
		printf("<h3 style=\"color:#43403F\">My Artcicles:</h3>");
			
		if ($articlesArray){
			for ($i=0;$i<sizeof($articlesArray);$i++){
				  resumeArticle($articlesArray,$i);
				  print "<br>";
			}
		}else{
			printf("<h3 style=\"color:#43403F\">You have not write any article</h3>");
		}
		printf ("</div> ");	
		endOutput();
	
	break;
	case 6:
		 headerOutput($link);
				print('
			<div class="registrationBox">
				<h2 style="color:#43403F"> Login for registered users</h2>
				<form name="input" action="index.php" method="post">
					Username: <input type="text" name="user" value="User"><br>
					Password: <input type="password" name="pass"><br>
					<input type="submit" value="Submit">
				</form> 
				
				<a href="index.php?Registration=1"><h5 style="color:blue"> Do you want to be member?</h5> 
			</div>
		');
		endOutput();
	break;
	case 7:
		headerOutput($link);
		
		if($result==2){
		print('
			<div class="registrationBox">
				<h2 style="color:#43403F"> Login for registered users</h2>
				<form name="input" action="index.php" method="post">
					Username: <input type="text" name="user" value="User"><br>
					<span style="color:red">Password:</span><input type="password" name="pass"><br>
					<input type="submit" value="Submit">
				</form> 
				<span style="color:red">Incorrect password for this user</span>
				
				<a href="index.php?Registration=1"><h5 style="color:blue"> Do you want to be member?</h5> 
			</div>
		');	
		}
		if($result==3){
				print('
			<div class="registrationBox">
				<h2 style="color:#43403F"> Login for registered users</h2>
				<form name="input" action="index.php" method="post">
				<span style="color:red">Username:</span><input type="text" name="user" value="User"><br>
					Password: <input type="password" name="pass"><br>
					<input type="submit" value="Submit">
				</form> 
				<span style="color:red">The username does not exist</span>
				<a href="index.php?Registration=1"><h5 style="color:blue"> Do you want to be member?</h5> 
			</div>
		');	
		}
		if($result==1){
		print('
			<h2> You have been login succesfully</br></br></br> 
			go to my <a href="index.php?login=1"> profile </a></br></br>
			write an <a href="index.php?Write=1"> article </a>
			</h2>
		');	
		}
		
		endOutput();

	break;
	case 8:
	//view of one article_id
		
		$article=$_SESSION["article"];
		$commentsArray=$data;
		
		
		headerOutput($link);		
		
		print('<div class="Article">');
			print('<div id="ArticleDescription">');
				printf("<h1 style=\"color:#43403F\"> Article   ".$article->article_id."</h1><br /><br />");
				printf("<h3 style=\"color:#43403F\"> Created by:  ".$article->author."</h3><br /><br /><br />");
				printf("<h3 style=\"color:#43403E\">".$article->artText."</h3><br />");
				printf("<h3 style=\"color:#43403F\"> Last modified:  ".$article->artDate."</h3><br /><br /><br />");
			printf ("</div> ");	
			
			print('<div class="clear"></div>');
			
			printf("<h3 style=\"color:#43403F\">Comments:</h3>");
				
			if ($commentsArray){
				for ($i=0;$i<sizeof($commentsArray);$i++){
					  resumeComment($commentsArray,$i);
					  print "<br>";
				}
			}else{
				printf("<h4 style=\"color:#43403F\">There is no comments for his article Why don't you write one?</h4>");
			}
			
			printf("<h3 style=\"color:#43403F\">Write one comment:</h3>");
			
			printf('<form method="post" action="index.php">
					<input type="text" name="commentTitle" value="Title"> </input>
						 <textarea name="commentText" cols="100" rows="5"">
						</textarea><br>
					<input type="submit" value="Submit" />
					<input type="reset" value="Reset" />
				 </form>');

		printf ("</div> ");	
		
		
		endOutput();
	break;
	case 9:
	//the user wants to view the registration view
	headerOutput($link);
	printf('<br /><br /><br />');
	printf('<form method="post" action="index.php">
		<input type="text" name="userNameSub" value="Username"> </input>
		<input type="text" name="userPassSub" value="Password"> </input>
			 <textarea name="userDescSub" cols="100" rows="5"  >
			</textarea><br>
			<input type="submit" value="Submit" />
			<input type="reset" value="Reset" />
		 </form>');
	endOutput();
	break;
	case 10:
	headerOutput($link);
	printf('<br /><br /><br />');
	printf('<form method="post" action="index.php">
			<h3 style=\"color:#43403F\"> Write your idea in the text box below</h3><br /><br />

			<textarea name="articleTextSub" cols="100" rows="50"  >
			</textarea><br>
			<input type="submit" value="Submit" />
			<input type="reset" value="Reset" />
		 </form>');
	endOutput();
	
	break;
	case 11:
		headerOutput($link);	
		printf("<h2 style=\"color:#43403F\"> You have been logout succesfully</h2><br /><br /><br />
			<h3 style=\"color:#43403F\"> Do you want to go to the<a href=\"index.php\"> homepage<a/><br /><br />
			<h3 style=\"color:#43403F\"> Do you want register with other<a href=\"index.php?login=1\"> usermane<a/><br /><br />
			");
		endOutput();
	break;
	case 12:
		headerOutput($link);
		if($data){
			printf("<h2 style=\"color:#43403F\"> You comment have been submited succesfully succesfully</h2><br /><br /><br />
				<h3 style=\"color:#43403F\"> Come back to the<a href=\"index.php?Article=".$_SESSION["article"]->article_id."\"> article<a/><br /><br />
						
			");
		}
		endOutput();
	break;
	case 14:
		headerOutput($link);
		
		if($data){
			printf("<h2 style=\"color:#43403F\"> You have been registered succesfully </h2><br /><br /><br />
				<h3 style=\"color:#43403F\"> Come back to the last article<a href=\"index.php?Article=".$_SESSION["article"]->article_id."\"> article<a/><br /><br />
				<h3 style=\"color:#43403F\"> Make my first login<a href=\"index.php?login=1\"> article<a/><br /><br />");
		}else{
			printf('<span style="color:red">UserName not avaliable already used or too big variables</span>');
			printf('<form method="post" action="index.php">
					<input type="text" name="userNameSub" value="Username(length=6)"> </input>
					<input type="text" name="userPassSub" value="Password(length=6)"> </input>
					<textarea name="userDescSub" cols="100" rows="5"  >
					</textarea><br>
					<input type="submit" value="Submit" />
					<input type="reset" value="Reset" />
				</form>');
			
		}
		
		
		
		endOutput();
	break;
	case 15:
		if($data){
			headerOutput($link);
		
			printf("<h2 style=\"color:#43403F\"> You article has been submited succesfully </h2><br /><br /><br />");
			
			endOutput();
		}else{
			printf('<span style="color:red">There was an error while you submited the article the more probable case is that the article es bigger than 2000 char</span>');
			printf('<form method="post" action="index.php">
			<select name="articleCatSub">
				<option value="Hotel"></option>
				<option value="Hostel"></option>
				<option value="Motel"></option>
				<option value="Restaurant"></option>
				<option value="Interesting"></option>
				<option value="Reports"></option>
			</select>
			<textarea name="articleTextSub" cols="100" rows="500"  >
			</textarea><br>
			<input type="submit" value="Submit" />
			<input type="reset" value="Reset" />
		 </form>');
	endOutput();
		}
	break;
	case 16:
			headerOutput($link);
		
			printf("<h2 style=\"color:#43403F\"> You opinion has been submited succesfully </h2><br /><br /><br />
						<h3 style=\"color:#43403F\"> Do you want to go to the<a href=\"index.php\"> homepage<a/><br /><br />
						");
			endOutput();
	break;
	case 17:
			headerOutput($link);
		
			printf("<h2 style=\"color:#43403F\"> You opinion has been submited succesfully </h2><br /><br /><br />
						<h3 style=\"color:#43403F\"> Do you want to go to the<a href=\"index.php\"> homepage<a/><br /><br />
						");
			endOutput();
	break;
}
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////             END OF THE VIEWS RENDERING            //////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>

<?php
function headerOutput($link){
	require_once "templates/htmlHeader.tpl";
	if (isset($_COOKIE["user"])){
		 print $_COOKIE["user"];
		 print "</a></div>"; 
		 print "&nbsp&nbsp&nbsp&nbsp   <a href=\"index.php?logout=1\"> <i>logout</i></a>";
	}else{
		 print "Log-in</a></div>";
		 
	}
	require_once "templates/htmlLateralMenu.tpl";
	
	
	
	$result = mysqli_query($link,"SELECT article_id FROM article ORDER BY artRate DESC LIMIT 10");
	printf ("
			<div class=\"menu\" id=\"topIdeas\">
				  <h3>The 10 best rated ideas</h3>");
	printf ("<ul>");
	while( $row = mysqli_fetch_array($result)){
		$articlenumber=$row["article_id"];
		printf ("<a href=\"index.php?Article=".$articlenumber."\"><li>Idea:  ".$articlenumber."</li></a>");
	}
	printf ("</ul></div>");
	
	
	
	
	
	$result = mysqli_query($link,"SELECT author FROM article GROUP BY author ORDER BY artRate DESC LIMIT 10");
	printf ("	<div class=\"menu\" id=\"topAuthors\">
				  <h4>The 10 best authors</h4>");
	printf ("<ul>");	
		while( $row = mysqli_fetch_array($result)){
		$articlenumber=$row["author"];
		printf ("<li>".$articlenumber."</li>");
	}
	printf ("
			</ul></div>
		");

	$result = mysqli_query($link,"SELECT article_id FROM article ORDER BY artComNum DESC LIMIT 10");
	printf ("
			<div class=\"menu\" id=\"topCommentIdeas\">
				  <h4>The 10 ideas with more comments</h4>");
	printf ("<ul>");
	while( $row = mysqli_fetch_array($result)){
		$articlenumber=$row["article_id"];
		printf ("<a href=\"index.php?Article=".$articlenumber."\"><li>Idea:  ".$articlenumber."</li></a>");
	}
	printf ("</ul></div>");
		
		
		
		
	printf ("</div>");
}


function endOutput(){

			printf ("			
					<div class=\"clear\"></div>
					</div>
					<div id=\"footer\" class=\"titulos\"> <h3> Author:ROBERT  All Rights Reserved. &copy</h3>
					<div class=\"clear\"></div>
					</div>
				</div> 
			</body> 
		</html>");
}



function pageMenuOutput($page, $noArticlesView, $totalNoArticles){
$noOfpages=(intval ($totalNoArticles/$noArticlesView)+1); $i=0;
 				print ("<div id=\"sailMenu\">
						<div id=\"noArticlesMenu\">");
				
		  				printf("<form method=\"get\" action=\"index.php\">
								No of ideas that you want to view
								<select name=\"noOfArticlesView\">");
								      for($i=2;$i<=20;$i=$i+2){
										printf("<option value=\"".$i."\">".($i)."</option>
										");
								      }
		  					printf ("</select>
								
								<input type=\"submit\" value=\"GO\"></input>
							 
							</form>
						</div>
						");
						
						
printf("					 <div id=\"pageMenu\">");
							if($page!=0){
							printf("<a href=\"index.php?pageNo=".($page-1)."\"> prev </a>");
							}
							printf("&nbsp".($page+1)."&nbsp");
							if($page!=($noOfpages-1)){
							printf("<a href=\"index.php?pageNo=".($page+1)."\"> next </a>");
							}
							
						
		  				printf("<form method=\"get\" action=\"index.php\">
								Go to the page
								<select name=\"pageNo\">");
								      for($i=0;$i<$noOfpages;$i++){
										printf("<option value=\"".$i."\">".($i+1)."</option>
										");
								      }
		  					printf ("</select>
								
								<input type=\"submit\" value=\"GO\"></input>
							 
							</form>
						</div>
					</div>");/**/
}


?>

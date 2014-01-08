<?php

function resumeArticle($articlesArray,$i){
print ("  				<a href=\"./index.php?Article=".$articlesArray[$i]->article_id."\"><div class=\"entrada\">
					
						<a href=\"./index.php?Article=".$articlesArray[$i]->article_id."\"><h2 style=\"color:#43403F\">IDEA ".$articlesArray[$i]->article_id."</h2></a>
						<div class=\"img_art\">
							
						</div>
						
						<div class=\"text_art\">
							".$articlesArray[$i]->artText."
						</div>

						<div class=\"info_art\">
							<hr>
							<div class=\"autor\">
								<img src=\"./images/user.png\"><span>".$articlesArray[$i]->author."</span>
							</div>
							
							<div class=\"num_com\">
								<img src=\"./images/comentario.png\"><span> ".$articlesArray[$i]->artComNum."</span>
							</div>
							
							<div class=\"star\">
								<img src=\"./images/star.png\"><span>".($articlesArray[$i]->artRate)."</span>
							</div>
							
							<div class=\"tags\">
								<span>Last edition = ".$articlesArray[$i]->artDate."</span>
							</div>	
							<div class=\"rates\">
								<a href=index.php?rate1=".$articlesArray[$i]->article_id."><img src=\"./images/like.png\" height=\"42\" width=\"70\"> </a>
								<a href=index.php?rate2=".$articlesArray[$i]->article_id."><img src=\"./images/dislike.jpg\" height=\"42\" width=\"70\"> </a>
							</div>
							
						</div>
						
					</div>");
}





function resumeComment($commentsArray,$i){
print ("  				<div class=\"entrada\">
						 <h2 style=\"color:#43403F\">".$commentsArray[$i]->comTitle."</h2>
						 <p style=\"color:#43403F\">".$commentsArray[$i]->comText."</p>
						 
					</div>");
					
}

?>

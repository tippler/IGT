<?php
function input(){

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
-14  Registration///---The user wants to submit himself
*/

//CHECK OF THE HOMEPAGE 
 if (isset($_GET["pageNo"])){
	  return 4;
      
  }

      
      
 //if it's the view option change the session value and the page to the firstone
 if (isset($_GET["viewOp"])){
    //Change in the view options
    return 1;

 }
	      
	      
	      
   //If we want to change the category, we change the seession value and the page to the firstone
  if (isset($_GET["viewCat"])){
    return 2;
  }
	      
	      
  if (isset($_GET["noOfArticlesView"])){
    return 13;
  }
	      


      

    

  
  
  //CHECK OF THE LOGIN OPTIONS
  if (isset($_GET["login"])){
  
  
	if (isset($_COOKIE["user"])){
		return 5;
	}
		
	return 6;
  }
  
  
  if(isset($_POST["user"]) || isset($_POST["pass"])){return 7;}
  
  
  if(isset($_GET["Article"])){return 8;}
  
  
  if(isset($_GET["Registration"])){return 9;}
  
  
  if(isset($_POST["articleCatSub"])||isset($_POST["articleTextSub"])){return 15;}
   
   
  
  if(isset($_GET["Write"])){
  
	if (isset($_COOKIE["user"])){
	
		return 10;
		
	}
	
	return 6;
  }
  
 
  if(isset($_GET["rate1"])){if(isset($_COOKIE['user'])){return 16;}else{return 6;}}
  if(isset($_GET["rate2"])){if(isset($_COOKIE['user'])){return 17;}else{return 6;}}
  if(isset($_GET["logout"])){return 11;}
  
  if(isset($_POST["commentText"])&&(isset($_POST["commentTitle"]))){return 12;}
  
  if(isset($_POST["userNameSub"])||(isset($_POST["userPassSub"]))||(isset($_POST["userDescSub"]))){return 14;}
  //the user don't want a specific view (homepage)
  return 3;
}
?>
<?php


/*return view defines the kind of view that we have depending the GET variables and the SESSION variables

        THE DIFERENT VIEWS OF THE WEBPAGE ARE:

-1  Homepage///The user want to change the view options
-2  Homepage///The user want to change the category
-3  Homepage///It's the first time that the user access to the page 
-4  Homepage///The user want to change the page
-5  Login///The user wants to view his profile
-6  Login///The user wants to login
-7  Login///The user makes a try to login

*/




function calculations($data, $view){
	switch ($view){
		case 1:
		case 2:
		case 3:
		case 4:
		case 5:
		case 6:
		return -1;
		break;
		case 7:
			$user=$data;
			if ($user){
				if ($_POST["pass"]==$user->user_pass){
					setcookie("user",$_POST["user"] , time()+3600);
					$_SESSION["user"]=$user;
					return 1;//all correct
				}else{
					return 2;//wrong password
				}
			}else{	
				return 3;//wrong user

			}
		break;
		case 8:
		case 9:
		case 10:
		case 11:
		case 12:
		case 13:
		case 14:
		case 15:
		case 16:
		case 17:
		//no need calculations for this view
		return -1;
		break;
		
		
	}
}
?>

<?php
	session_start();
   if( $_SESSION['role_session']==1):
	unset($_SESSION['admin']);
    elseif($_SESSION['role_session']==2):
     unset($_SESSION['user_session']);
	 elseif($_SESSION['role_session']==3):
     unset($_SESSION['department_session']);
     else :
     unset($_SESSION['dean_session']);
     endif ;
	if(session_destroy())
	{
		header("Location: index");
	}
?>
<?php include 'connection.php';?>
 <?php   

   if(isset($_POST["userid"]) && isset($_POST["hdndeviceid"]))  
   {    
   
      $userID= $_POST["userid"];
      $deviceID= $_POST["hdndeviceid"];
      $username= $_POST["hdnSelectedUser"];
      
      
        $sqlUser = "insert into device_assigned (devices_id,user_id) 
        VALUES ('".$userID."','".$deviceID."')";
    		   		   
        $sqlDevices = "Update devices set assigned_to ='".$username."' where device_id = ".$deviceID;
          
        if(!mysqli_query($con, $sqlUser) || !mysqli_query($con, $sqlDevices))
    	  {
    		  echo " Not inserted";
    		  header("refresh:0; url=LandingPage.php?success=false");
    	  }	
    		else
    		{
    		  echo " Inserted succesfully";
    		  header("refresh:0; url=LandingPage.php?success=true");
    		 
    		}		
   } 
 
 ?>
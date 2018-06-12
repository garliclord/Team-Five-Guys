  <?php include 'connection.php';?>
  <?php

   if(isset($_GET["message"]))
    {
     echo '<div class="alert alert-danger">'.$_GET["message"].'</div>';
    }
  
 # Get all user from db and show in drop down.
  	function getUser($con)
   {
        $output = '';
        $sql = "SELECT * FROM users order by name";
        $result = mysqli_query($con, $sql);       
        while($row = mysqli_fetch_array($result))
        {
             $output .= '<option value="'.$row["user_id"].'">'.$row["name"].'</option>';
        }	
        return $output;
   }
   
   # Assign device to user
    $deviceName = isset($_GET["name"]) ? $_GET["name"] : '';
     if (isset($_POST['btnAssignUser']))
   {       
      $userID= $_POST["userid"];
      $deviceID= $_POST["hdndeviceid"];
	  $deviceName = $_POST["hdnDeviceName"];
      $selectedUsername= $_POST["hdnSelectedUser"];
	  $newUser = ucwords($_POST["newUser"]);
	  $userToInsert = '';
	  $sqlUser = '';
	  
	  if($newUser =='' && $selectedUsername == '')
	  {
		  #header('refresh:0; url=AssignUser.php?deviceid='.$deviceID.'&name='.$deviceName.'&message=Please select user to assign or enter new user.');
		  echo '<div class="alert alert-danger">Please select user to assign or enter new user.</div>';
	  }

	  else
	  {
		  
		  if ($newUser!='')
		  {
			  $userToInsert = $newUser;
			  $sqlUser = "insert into users (name) VALUES ('".$userToInsert."')";
		  }
		  else
		  {	  
			  $userToInsert = $selectedUsername;
		  }
		   
			$sqlDevices = "Update devices set assigned_to ='".$userToInsert."' where device_id = ".$deviceID;
			echo $sqlDevices;
			if($sqlUser!='' && !mysqli_query($con, $sqlUser) || !mysqli_query($con, $sqlDevices))
				{
					echo '<div class="alert alert-danger">Unexpected error, please try again !!!</div>';
				}	
			
			else
				{					
					header("refresh:0; url=index.php?message=User has been assigned successfully");
				}
	  }
   }
 ?>

<!DOCTYPE html>  
<html>
	<head>
		<title>Cerebral fix device management</title>
		 <!-- Required meta tags -->
	  <meta charset="utf-8">
	  
	  <!-- Bootstrap CSS -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
		crossorigin="anonymous">
	  <link rel="stylesheet" href="CSS/style.css">
	  
	  
	  
	 
	   <!-- Required meta tags -->
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	  
	 
	 
	   <!-- Custom JavaScript -->
	  <script type="text/javascript" src="Scripts/Script.js"></script>

	  <!-- jQuery first, then Popper.js, then Bootstrap JS-->
	  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>

	 
	 
	 <script>
	 
	 function validate() 
	 {	
		var e = document.getElementById("userid");
		var strUser = e.options[e.selectedIndex].value;
		if(strUser == '0')
		{
			window.location.href='index.php';
		}
	 }
	 
	 function ChangeUser(control) 
		{
			document.getElementById("hdnSelectedUser").value = control.options[control.selectedIndex].innerHTML; 
		}
	</script>
	</head>
	<body>
		<div class="container-fluid">
		<h2>Assign User</h2>
			   
		<form action ="AssignUser.php" method="post" class = "form-group">

		  <div class="form-group">
			<label class="col-sm-2 col-form-label"><h6>Selected Device:</h6></label>
			<div class="col-sm-10">
			  <p class="form-control-static"><?php echo str_replace("+"," ",$deviceName); ?></p>
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputPassword" class="col-sm-2 col-form-label"><h6>Assign To Existing User:</h6></label>
			<div class="col-sm-4">	
			<select name="userid" id="userid" onchange="ChangeUser(this)">  
				  <option value="0">Select To Assign User</option>  
				  
				  <!-- Used getUser($con) php function to return all users -->
				  <?php echo getUser($con); ?> 
			 </select> 
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-2 col-form-label"><h6>Assign To New User:</h6></label>
			<div class="col-sm-5" >
			  <input type="text" name="newUser" value="" id="newUser" autocomplete="off"> 
			</div>
		  </div>
		  <div class="row">
			<div class="col-sm-12 add-search-btns" style="margin-top:10px;">
				  <button type="Submit" class="btn btn-primary" name="btnAssignUser" id="btnAssignUser" onclick="validate()" >Assign Device</button>
				  <button type="button" class="btn btn-primary" id="add-device-btn" onclick = "location.href='index.php';">Cancel</button>
		  </div>
		 </div> 
		  
		  <!-- Hidden field use to send silent information from one page to other, as we do not want to display that to user --> 
		<input type="hidden" name="hdndeviceid" id="hdndeviceid" value="<?php echo isset($_GET["deviceid"]) ? $_GET["deviceid"] : $_POST["hdndeviceid"];?>" />
		<input type="hidden" name="hdnSelectedUser" id="hdnSelectedUser"  />
		<input type="hidden" name="hdnDeviceName" id="hdnDeviceName" value="<?php echo isset($_GET['name']) ? $_GET['name'] : $_POST['hdnDeviceName']; ?>"  />

		</form>
		 
		</body>
</html>

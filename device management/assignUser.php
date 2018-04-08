   
<?php include 'connection.php';?>
 <?php   

 # Get all user from db and show in drop down.
	  function getUser($con)  
 {  
      $output = '';  
      $sql = "SELECT * FROM users";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["user_id"].'">'.$row["name"].'</option>';  
      }  
      return $output;  
 } 
 
 # Get device id from query string (url) and show device name
function assignUser($con)  
 {
 $output = ''; 

 if(isset($_GET["deviceid"]))  
 {  
echo 'Welcome to assign page'; 
      if($_GET["deviceid"] != '')  
      {  
           $sql = "SELECT * FROM devices WHERE device_id like '".$_GET["deviceid"]."'";  
      }  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {   
		$device_id=  $row['device_id'];
		$name = $row['name'];
		$os_type = $row['os_type'];

		$output .= '<div class="row">
    <div class="col-sm-4">
      <label class=".label-success" id="devicename name = "devicename"><b>'.$name.'</b></label>
    </div>
	</div>';
	
      }  
	  echo $output;
       
 }  
 }
 ?>
 

<!DOCTYPE html>  
<html>
<head>
    <title>Title of the site</title>
	 <!-- Required meta tags -->
  <meta charset="utf-8">

  <!-- Bootstrap CSS 
   These refernces access bootstrap, ajax and stylesheet online functions.-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 
 <script>
 function ChangeUser(control) {
	 if(control.value == 0)
	 {
		 alert("Please select user to assign");
		 return false;
	 }
   document.getElementById("hdnSelectedUser").value = control.options[control.selectedIndex].innerHTML; 
}
</script>
</head>
<body>

 
<form action ="insert.php" method="post">

<?php echo assignUser($con); ?>

<!-- Hidden field use to send silent information from one page to other. Specially when we do not want to display that  --> 
<input type="hidden" name="hdndeviceid" id="hdndeviceid" value="<?php echo $_GET["deviceid"];?>" />
<input type="hidden" name="hdnSelectedUser" id="hdnSelectedUser"  />

 
	<div class="row">
    <div class="col-sm-4">
	<select name="userid" id="userid" onchange="ChangeUser(this)">  
		  <option value="0">Show All Users</option>  
		  <!-- Used getUser($con) php function to return all users -->
		  <?php echo getUser($con); ?>  
	 </select>  
    </div>
	</div>
	<br/>
	<div class="row">
	<div class="col-sm-4" >
       <input type ="submit" value="Assign Device"/>
    </div>
	</div>
  

</form>	
 
</body>
</html>
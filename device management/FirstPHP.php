   
<?php include 'connection.php';?>
<?php 
# This is to show whether or not device assigned successfully.
if(isset($_GET["success"]) )
{
if($_GET["success"] == 'true')
{
 echo '<div class="alert alert-success">Device has been assigned to user successfully !!!</div>';
}
else
{
echo '<div class="alert alert-danger">Unexpected error in assigning user, please try again !!!</div>';
}

}
 function fill_devices($con)  
 {  
 $whereConditionOsVer=' ';
 $whereConditionPer=' ';
 $vars = array();
 if(isset($_GET["os_ver"]) || isset($_GET["dgrade"]) || isset($_GET["dgrade"]))
 {
	 $queryS = $_SERVER['QUERY_STRING'];

$cntOSVer=0;
$cntper=0;
foreach (explode('&', $queryS) as $pair) {
    list($key, $value) = explode('=', $pair);
    $vars[] = array(urldecode($key), urldecode($value));
	
	# where query for multiple Os Versions
	if($key == 'os_ver')
	{
		if($cntOSVer == 0)
		{
			$whereConditionOsVer .= " and os_version like '".$value."%'";
		}
		else
		{
		$whereConditionOsVer .= "  or os_version like  '" .$value."%'";
		}
		
		$cntOSVer = $cntOSVer+1;
	}
	# where query for multiple performances
	if($key == 'dgrade')
	{
		if($cntper == 0)
		{
			$whereConditionPer=" and grade like '".$value."%'";
		}
		else
		{
		$whereConditionPer .= "  or grade like  '" .$value."%'";
		}
		
		$cntper = $cntper+1;
	}
}
 }

 $sql='';
 if(isset($_GET["os"]) && ($_GET["os"] == 'ios' || $_GET["os"] == 'android'))
 {
      $output = '';  
	
	$sql = "SELECT * FROM devices WHERE os_type like '".$_GET["os"]."'";   

 }
 else if(isset($_GET["os"]) && $_GET["os"] == 'other')
 {
	 $sql="SELECT * FROM devices WHERE os_type != 'IOS' and os_type != 'Android'";
 }
 
 if($whereConditionOsVer != '')
 	$sql .= $whereConditionOsVer;
 if($whereConditionPer != '')
	$sql .= $whereConditionPer;
	echo $sql;
	
	$result=mysqli_query($con,$sql);
	 $output ='';
	 $cnt=1;
      while($row = mysqli_fetch_array($result))  
      {  
	  $id = $row['device_id'];
		$name = $row['name'];
		$os_type = $row['os_type'];
		$type = $row['type'];
		$os_version = $row['os_version'];
		$ram = $row['ram'];
		$cpu = $row['cpu'];
		$bit = $row['bit'];
		$screen_resolution = $row['screen_resolution'];
		$grade = $row['grade'];
		$uuid = $row['uuid'];
		$assigned_to = $row['assigned_to'];
		
		$output .= '<tr>';
		$output .=  '<td >'.$cnt++.'</td>';
		$output .=  '<td ><a href=assignUser.php?deviceid='.$id.'>'.$name.'</a></td>';
		$output .=  '<td>' . $os_type . '</td>';
		$output .=  '<td>' . $type . '</td>';
		$output .=  '<td>' . $os_version . '</td>';
		$output .=  '<td>' . $ram . '</td>';
		$output .=  '<td>' . $cpu . '</td>';
		$output .=  '<td>' . $bit . '</td>';
		$output .=  '<td>' . $screen_resolution . '</td>';
		$output .=  '<td>' . $grade . '</td>';
		$output .=  '<td >' . $uuid . '</td>';
		$output .=  '<td>' . $assigned_to . '</td>';
		$output .= '</tr>';
		 
      }  
      return $output;  
 } 
#mysqli_close($con); 
 ?>  



<!DOCTYPE html>  
<html>
<head>
    <title>Title of the site</title>
	 <!-- Required meta tags -->
  <meta charset="utf-8">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 
 <script>
 /*
 $(document).ready(function(){  

$('.username').on("click",function(){
	
	    var device_id = $(this).attr('id');
           $.ajax({  
                url:"assignUser.php",  
                method:"POST",  
                data:{device_id:device_id},  
                success:function(data){  
                     $('#assignuser').append(data);  
                }  
           }); 
});
});
 
      
	  $(document).ready(function(){
 $("#search-btn").submit(function(e) {
    e.preventDefault();
});
 });
 
	  var username = $(this).data("username");
	  $('#search-btn').click(function(){  
           var os_type = $('input[name=os]:checked').val();
		    alert(os_type);
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{os_type:os_type},  
                success:function(data){  
				alert(data);
                     $('#show_devices').html(data);  
                }  
           });  
      });  
 });*/
  // To show add devise "Div"
  
  
  function showDevices() {
	//document.getElementById("searchDevices").style.display="block";
}
function showAddDevice() {
	document.getElementById("addDevices").style.display="block";
}

function showAll() {
	document.getElementById("iosVersion").style.display="none";
	document.getElementById("androidVersion").style.display="none";
}

function showiOSVersion() {
	document.getElementById("iosVersion").style.display="block";
	document.getElementById("androidVersion").style.display="none";
}

function showAndroidVersion() {
	document.getElementById("androidVersion").style.display="block";
	document.getElementById("iosVersion").style.display="none";
}
function hideVersion() {
	document.getElementById("androidVersion").style.display="none";
	document.getElementById("iosVersion").style.display="none";
}

function check()
{
    
}


</script>
</head>
<body>


<div class="container landing-page">
    <!-- Operating system button group -->
    <div class="row">
      <div class="col-sm-12">
        <h2>Device Operating System: </h2>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
       <form >
	  <label class="btn btn-secondary" id="all" onclick="showAll()">
            <input type="radio" name="os" value="all" value="all" autocomplete="off"> All
          </label>
	  <label class="btn btn-secondary" id="ios" onclick="showiOSVersion()">
            <input type="radio" name="os" value="ios" autocomplete="off"> iOS
          </label>
          <label class="btn btn-secondary" id="android-btn" onclick="showAndroidVersion()">
            <input type="radio" name="os" value="android" autocomplete="off"> Android
          </label>
          <label class="btn btn-secondary" id="other-btn">
            <input type="radio" name="os" value="other" autocomplete="off" onclick = "hideVersion()"> Other
          </label>
        </div>
      </div>
    </div>


		  
    <!-- OS Version button group -->
    <div class="row" id="iosVersion"  style="display:none">
      <div class="col-sm-12">
        <h2>OS Version</h2>
        <div >

          <label class="btn btn-secondary android-os ios-os hidden">
            <input type="checkbox" name="os_ver" value="7" id="os7" autocomplete="off"> 7
          </label>
          <label class="btn btn-secondary ios-os hidden">
            <input type="checkbox" name="os_ver" value="8" id="os8" autocomplete="off"> 8
          </label>
          <label class="btn btn-secondary ios-os hidden">
            <input type="checkbox" name="os_ver" value="9" id="os9" autocomplete="off"> 9
          </label>
          <label class="btn btn-secondary ios-os hidden">
            <input type="checkbox" name="os_ver" value="10" id="os10" autocomplete="off"> 10
          </label>
		   <label class="btn btn-secondary ios-os hidden">
            <input type="checkbox" name="os_ver" value="11" id="os11" autocomplete="off"> 11
          </label>
        </div>
      </div>
    </div>
	
	<!-- Android Version group -->
	
	<div class="row" id="androidVersion" style="display:none">
      <div class="col-sm-12">
        <h2>OS Version</h2>
        <div >
          <label class="btn btn-secondary android-os hidden">
            <input type="checkbox" name="os_ver" value="4" id="os4" autocomplete="off"> 4
          </label>
          <label class="btn btn-secondary android-os hidden">
            <input type="checkbox" name="os_ver" value="5" id="os5" autocomplete="off"> 5
          </label>
          <label class="btn btn-secondary android-os hidden">
            <input type="checkbox" name="os_ver" value="6" id="os6" autocomplete="off"> 6
          </label>
          <label class="btn btn-secondary android-os ios-os hidden">
            <input type="checkbox" name="os_ver" value="7" id="os7" autocomplete="off"> 7
          </label>
        </div>
      </div>
    </div>

    <!-- Performance button group -->
    <div class="row">
      <div class="col-sm-12">
        <h2>Performance</h2>
        <div >
          <label class="btn btn-secondary">
            <input type="checkbox" name="dgrade" value="obsolete" id="obsolete" autocomplete="off"> Obsolete
          </label>
          <label class="btn btn-secondary">
            <input type="checkbox" name="dgrade" value="low" id="low" autocomplete="off"> Low
          </label>
          <label class="btn btn-secondary">
            <input type="checkbox" name="dgrade" value="medium" id="medium" autocomplete="off"> Medium
          </label>
          <label class="btn btn-secondary">
            <input type="checkbox" name="dgrade" value="high" id="high" autocomplete="off"> High
          </label>
        </div>
      </div>
    </div>

    <!-- Search and Add buttons -->
    <div class="row">
      <div class="col-sm-12 add-search-btns">
        <button id="search-btn" type="submit" name="button" class="btn" onclick='showDevices()'>Search</button>
        <button id="add-device-btn" type="button" name="button" class="btn" onclick="showAddDevice()">Add New</button>

      </div>
    </div>
  </div>
  
 <div class="container add-device-page" style="display:none;" id="addDevices">
    <div class="row">
      <div class="col-sm-12">
        <h3>Add Device</h3>
        <table class="table">
          <tr>
            <td>Device Type:</td>
            <td><input type="text" name="" value=""> </td>
          </tr>
          <tr>
            <td>OS Type:</td>
            <td><input type="text" name="" value=""> </td>
          </tr>
          <tr>
            <td>RAM:</td>
            <td><input type="text" name="" value=""> </td>
          </tr>
        </table>
        <button type="button" id="add-device-page-save-btn" class="btn">Save</button>
        <button type="button" id="add-device-page-back-btn" class="btn btn-back">Back</button>
      </div>
    </div>
  </div>

</div>
	
	<div id="assignuser">
	
	</div>
	
	
<table class='table' >
<tr>
<th>Number</th>
<th>Device Name</th>
<th>OS Type</th>
<th>Type</th>
<th>OS Version</th>
<th>Ram</th>
<th>CPU</th>
<th>Bit</th>
<th>Screen Resolution</th>
<th>Grade</th>
<th>UUID</th>
<th>Assigned to</th>
</tr>

					 <?php echo fill_devices($con); ?>
					  </form>
</body>
</html>
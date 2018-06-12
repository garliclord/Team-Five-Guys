 <?php   

	$con = mysqli_connect('localhost','root','');
	$db = mysqli_select_db($con,'device_database');
	
	if($con)
	{
		#echo 'Successfully Connected';
	}
	else
	{
		die('Sorry!!! Error encountered in connection');
	}
	if($db)
	{
		#echo 'Successfully found DB';
	}
	else
	{
		die('Sorry!!! Error encountered in connected DB');
	}   
 ?>
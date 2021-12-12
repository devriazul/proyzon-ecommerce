<?php

//reconect
function Reconect($url){
	echo "<script> location.replace('".$url."')</script>";
}


//reconect With Time
function TimeReconect($url,$time){
      echo"<script>
         setTimeout(function(){
            window.location.href = '".$url."';
         },'".$time."');
      </script>";
}

//Login Required
function If_Not_Login($url){
	if (!isset($_SESSION['username'])) {
		Reconect($url);
	}
}

//If_Login
function If_Login($url){
	if (isset($_SESSION['username'])) {
		Reconect($url);
	}
}  



//select data
function SelectData($table_name, $more){
	global $conn;
	$sql = "SELECT * FROM {$table_name} {$more}";
	$query = mysqli_query($conn,$sql);
	return $query;
}

//update data
function UpdateData($table_name, $more){
	global $conn;
	$sql = "UPDATE {$table_name} SET {$more} ";
	$update = mysqli_query($conn,$sql);
	return $update;
}


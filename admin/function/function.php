<?php


//Login Required
function If_Not_Login($url){
	if (!isset($_SESSION['Admin_User_Name'])) {
		Reconect($url);
	}
}

//If_Login
function If_Login($url){
	if (isset($_SESSION['Admin_User_Name'])) {
		Reconect($url);
	}
} 


//UserInfo
function UserInfo($colname){

	global $conn;
	$userid=$_SESSION['Admin_User_Name'];
	$sql = "SELECT * FROM admin_users WHERE User_Name='$userid' ";
	$query = mysqli_query($conn,$sql);
	$result=mysqli_fetch_array($query);
	return $result["$colname"];
}




//reconect
function Reconect($url){
	echo "<script> location.replace('".$url."')</script>";
}


function TimeReconect($url,$time){

      echo"<script>
         setTimeout(function(){
            window.location.href = '".$url."';
         },'".$time."');
      </script>";
}

//active url
function ActiveUrl(){
	$url=$_SERVER['REQUEST_URI'];
	return $url;
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


//delete data
function DeleteData($table_name, $more){
	global $conn;
	$sql = "DELETE FROM {$table_name} WHERE {$more} ";
	$Delete = mysqli_query($conn,$sql);
	return $Delete;
}



// Delivery Status
function Delivery_Status($status){

	if ($status==0) {		
		$order_status = "<span class='text-white'>Pending</span>";
	}else if($status==1){
		$order_status = "<span class='text-white'>Processing";
	}else if($status==2){
		$order_status = "<span class='text-white'>Pickup";
	}else if($status==3){
		$order_status = "<span class='text-white'>On The Way";
	}else if($status==4){
		$order_status = "<span class='text-white'>Delivered</span>";
	}else if($status==5){
		$order_status = "<span class='text-white'>Return";
	}else if($status==6){
		$order_status = "<span class='text-white'>Cancel";
	}

	return $order_status;

}



// User_type
function User_type($status){

	if ($status==0) {		
		$User_status = "Morning Boss";
	}else if($status==1){
		$User_status = "Customer Care";
	}else if($status==2){
		$User_status = "Warehouse";
	}else if($status==3){
		$User_status = "Delivery Manager";
	}else if($status==4){
		$User_status = "Morning Hero";
	}

	return $User_status;

}


// Account status
function Account_status($status){

	if ($status==1) {		
		$Account_status = "<span class='text-success' >Active</span>";
	}else{
		$Account_status = "<span class='text-danger' >Deactive</span>";
	}

	return $Account_status;
}



function RowsCount($table_name,$more){
	$selectdata=SelectData($table_name, $more);
	$rows=mysqli_num_rows($selectdata);
	return $rows;
}



?>
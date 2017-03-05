<?php
	include'../mysql.php';
	$sql=$_POST['sql'];
	//$sql="SELECT * FROM casos";
	function rows2json($sql)
	{
		global $mysql;
		$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
		$rows=array();
		while($r=mysqli_fetch_assoc($res)) 
		{
			$rows['coleccio'][]=$r;
		}
		return json_encode($rows);
	}
	echo rows2json($sql);
?>

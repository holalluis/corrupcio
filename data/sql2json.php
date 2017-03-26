<?php
	//mysql connect
	$root=realpath($_SERVER["DOCUMENT_ROOT"]);
	$root.="/corrupcio";
	include"$root/mysql.php";

	//comprova permís
	include"$root/edit/edit_mode.php";
	if(!$edit_mode){
		die("Error: edit mode OFF");
	}

	//input
	$sql=$_POST['sql'];
	//$sql="SELECT * FROM casos";

	function rows2json($sql)
	{
		global $mysql;
		$res=$mysql->query($sql) or die(mysqli_error($mysql));
		$rows=array();
		while($r=mysqli_fetch_assoc($res)) 
		{
			$rows['coleccio'][]=$r;
		}
		return json_encode($rows);
	}
	echo rows2json($sql);
?>

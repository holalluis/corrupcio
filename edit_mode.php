<?php
	$onclick = $edit_mode ? "window.location='edit/logout.php'" : "access()";
?>
<div class='navbar_item' style=float:right onclick="<?php echo $onclick ?>">
	<?php
		if($edit_mode)
		{
			echo "Edit mode ON";
		}
		else
		{
			?>
			<div>
					Edit mode OFF
			</div>
			<script>
				function access()
				{
					var pass=prompt("Password:",'12345');
					var sol=new XMLHttpRequest();
					sol.open('POST','edit/access.php',true);
					sol.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					sol.onreadystatechange=function()
					{
						if(this.readyState==4&&this.status==200)
						{
							console.log(this.responseText);
							window.location.reload();
						}
					}
					sol.send("pass="+pass);
				}
			</script>
			<?php
		}
	?>
</div>

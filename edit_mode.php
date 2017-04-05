<?php
	$onclick = $edit_mode ? "window.location='edit/logout.php'" : "access()";
?>
<div 
	class=item 
	onclick="<?php echo $onclick ?>"
	>
	<div>Edit mode</div>
	<?php
		if(!$edit_mode)
		{
			?>
			<script>
				function access()
				{
					var pass=prompt("Password:");
					var sol=new XMLHttpRequest();
					sol.open('POST','edit/access.php',true);
					sol.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					sol.onreadystatechange=function()
					{
						if(this.readyState==4&&this.status==200)
						{
							console.log(this.responseText);
							window.location.reload();//millorar
						}
					}
					sol.send("pass="+pass);
				}
			</script>
			<?php
		}
	?>
</div>

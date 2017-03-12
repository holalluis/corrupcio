
<div class='navbar_item' style=float:right>
	<?php
		if($edit_mode)
		{
			?>
			<span onclick=window.location='edit/logout.php'>
				Edit mode ON
			</span>
			<?php
		}
		else
		{
			?>
				<span onclick=access()>
					Edit mode OFF
				</span>
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

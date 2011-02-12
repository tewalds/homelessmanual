

<?php
$email = "rcheramy@gmail.com";
$username="Reg Cheramy";
$company="Edistorm";
$bio="Founder of Edistorm, creator of Helping Manual";

$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=160"
?>



<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h2>Profile Page</h2>
		</td>
	</tr>
	<tr>
		<td width="160">
		<img src="<?= $grav_url ?>" alt="" />
		
		</td>
		<td width="100%">
		<span class="profile-name"><?= $username?></span><br>
		<span class="profile-company"><?=$company?></span>
		
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<span class="profile-bio"><?php echo $bio?></span>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<h2>Questions</h2>
		
			<table width="100%">
				<tr>
					<td width="70%"><a href="">Question Title</a></td><td><a href="">Question Category</a></td>
				</tr>
				<tr>
					<td><a href="/viewquestion?id=nnn">Question Title</a></td><td><a href="">Question Category</a></td>
				</tr>
				<tr>
					<td><a href="">Question Title</a></td><td><a href="">Question Category</a></td>
				</tr>
				<tr>
					<td><a href="">Question Title</a></td><td><a href="">Question Category</a></td>
				</tr>
			</table>
		
		
		</td>
	
	</tr>
</table>
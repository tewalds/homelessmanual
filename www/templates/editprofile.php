

<?php
$email = "rcheramy@gmail.com";
$name="Reg Cheramy";
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
		<span class="profile-name">Name: <input type="text" value="<?= $name?>"></span><br>
		<span class="profile-name">Email: <?= $email?></span><br>
		<span class="profile-company">Organization: <input type="text" value="<?=$company?>"</span>
		
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<span class="profile-bio">Bio:<br>
			<textarea rows="10" cols="100"><?php echo $bio?></textarea></span>
		</td>
	</tr>
</table>
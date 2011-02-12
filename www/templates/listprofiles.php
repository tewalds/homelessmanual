

<?php
$email = "rcheramy@gmail.com";
$username="Reg Cheramy";
$company="Edistorm";
$bio="Founder of Edistorm, creator of Helping Manual";

$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=40"
?>

Search for Profile: <input type="text">
<!-- searches based on username/organization/ -->

<h2>Results</h2>
<table border="0" width="100%">
	<tr>
		<td width="40">
		<img src="<?= $grav_url ?>" alt="" />
		
		</td>
		<td width="100%">
			<span class="profile-name"><a href="/viewprofile?id=nnn"><?= $username?></a></span>
			<span class="profile-company"><?=$company?></span>
			<span class="profile-type">Caseworker/Client/Admin</span>
		</td>
	</tr>
	<tr>
		<td width="40">
		<img src="<?= $grav_url ?>" alt="" />
		
		</td>
		<td width="100%">
			<span class="profile-name"><a href="/viewprofile?id=nnn"><?= $username?></a></span>
			<span class="profile-company"><?=$company?></span>
			<span class="profile-type">Caseworker/Client/Admin</span>
		</td>
	</tr>
	<tr>
		<td width="40">
		<img src="<?= $grav_url ?>" alt="" />
		
		</td>
		<td width="100%">
			<span class="profile-name"><a href="/viewprofile?id=nnn"><?= $username?></a></span>
			<span class="profile-company"><?=$company?></span>
			<span class="profile-type">Caseworker/Client/Admin</span>
		</td>
	</tr>
</table>
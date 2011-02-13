
Search for Profile:
<form method="get" action="/listprofiles">
<input type="text" name="q">
<input type="submit" value="Search">
</form>
<!-- searches based on username/organization/ -->

<h2>Results</h2>
<table border="0" width="100%">
<? foreach($users as $user){ ?>
	<tr>
		<td width="40">
		<img src="<?= gravurl($user['email']) ?>" alt="" />
		
		</td>
		<td width="100%">
			<span class="profile-name"><a href="/viewprofile?id=<?= $user['userid'] ?>"><?= $user['name'] ?></a></span>
			<span class="profile-company"><?= $user['organization'] ?></span>
			<span class="profile-type">Caseworker/Client/Admin</span>
		</td>
	</tr>
<? } ?>

</table>

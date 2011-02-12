
<table border="0" width="100%">
<form method="post" action="/updateprofile">
	<tr>
		<td colspan="2">
		 <h2>Profile Page</h2>
		</td>
	</tr>
	<tr>
		<td width="160">
			<img src="<?= gravurl($u['email']) ?>" alt="" />
			</td>
			<td width="100%">
			<span class="profile-name">Name: <input type="text" name="name" value="<?= htmlentities($u['name']) ?>"></span><br>
			<span class="profile-name">Email: <?= $u['email'] ?></span><br>
			<span class="profile-company">Organization: <input type="text" name="organization" value="<?= htmlentities($u['organization']) ?>"></span>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<span class="profile-bio">Bio:<br>
			<textarea rows="10" cols="100" name="bio"><?= htmlentities($u['bio']) ?></textarea></span>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" value="Update Profile">
		</td>
	</tr>
</form>
</table>


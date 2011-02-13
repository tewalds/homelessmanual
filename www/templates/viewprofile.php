<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h2>Profile Page</h2>
		</td>
	</tr>
	
	
<?php
	if($user->userid == $userid){
?>
	<tr><td><a href="/editprofile">Edit Profile</a></td></tr>

<?php } ?>


	<tr valign="top">
		<td width="160">
		<img src="<?= gravurl($email, 160) ?>" alt="" />
		
		</td>
		<td width="100%">
		<h2><?= $name ?></h2>
		<h2>Organization: <?= $organization ?></h2>
		<span class="profile-bio"><?= $bio?></span>
		
		</td>
	</tr>
	</tr>
	<tr>
		<td colspan="2">
		<h2>Questions</h2>
		
			<table width="100%">
<? foreach($steps as $step){ ?>
				<tr>
					<td width="70%"><a href="/viewquestion?id=<?= $step['id'] ?>"><?= $step['title'] ?></a></td><td><a href="/viewcategory?id=<?= $step['catid'] ?>"><?= $step['catname'] ?></a></td>
				</tr>
<? } ?>
			</table>
		</td>
	</tr>
</table>

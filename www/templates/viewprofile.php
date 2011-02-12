<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h2>Profile Page</h2>
		</td>
	</tr>
	<tr>
		<td width="160">
		<img src="<?= gravurl($email) ?>" alt="" />
		
		</td>
		<td width="100%">
		<span class="profile-name"><?= $name ?></span><br>
		<span class="profile-company"><?= $organization ?></span>
		
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<span class="profile-bio"><?= $bio?></span>
		</td>
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

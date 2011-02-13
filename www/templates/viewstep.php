
<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h2><?= $step['catname'] ?>: <?= $step['title'] ?></h2>
		</td>
	</tr>
	<tr>
		<th width="150"></th>
		<th width="70%"><b>Steps:</b></th>
		<th><b>Completed</b></th>
	</tr>
<?
	$count = 1;
	foreach($substeps as $substep ){ ?>
			<tr><td>[+]</td><td><?= $count ?>.<a href="/viewstep?id=<?= $substep['id'] ?>">Do you have a <?= $substep['title'] ?></a></td><td><input type="checkbox" alt=""></td></tr>
<? 		$count++;
	} ?>
</table>
<br><br>
<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h2>Discussion</h2>
		</td>
	</tr>
<? foreach($discussion as $post){ ?>
	<tr>
		<td width="160">
			<img src="<?= gravurl($post['email']) ?>" alt="" />
		</td>
		<td width="100%">
			<a href="/viewprofile?id=<?= $post['userid'] ?>"><?= $post['username'] ?></a> - <?= date("F j, Y, g:i a", $post['time']) ?> <hr>
			<?= $post['comment'] ?>
		</td>
	</tr>
<? } ?>
	<tr>
		<td colspan="2">
			<form method="post" action="/discussion">
			<input type="hidden" name="stepid" value="<?= $step['id'] ?>">
			<textarea rows="5" cols="70" name="comment"></textarea>
			<br>
			<input type="submit" value="Post Comment">
		</td>
	</tr>
</table>


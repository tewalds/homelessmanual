
<a href="/editstep?id=<?= $step['id'] ?>">Edit Step</a>

<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h2><?= $step['catname'] ?>: <?= $step['title'] ?></h2>
		</td>
	</tr>
	<tr>
		<th width="150"></th>
		<th width="70%"><b>Steps:</b></th>
	</tr>
<?
	$count = 1;
	foreach($substeps as $substep ){ ?>
			<tr><td>[+]</td><td><?= $count ?>.<a href="/viewstep?id=<?= $substep['id'] ?>">Do you have a <?= $substep['title'] ?></a></td><td><input type="checkbox" alt=""></td></tr>
<? 		$count++;
	} ?>
</table>


<h2>Search for <?= $s ?></h2>

<table border="0" width="100%">
<? foreach($steps as $step){ ?>
	<tr>
		<td width="70%"><a href="/viewstep?id=<?= $step['id'] ?>"><?= $step['title'] ?></a></td>
	</tr>
<? } ?>
</table>


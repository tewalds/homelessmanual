
<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h1><?= $category['title'] ?> Questions</h1>
		</td>
	</tr>
	
	
	<tr><td><h2>Top Questions</h2></td></tr>
<? foreach($steps as $step){ ?>
	<tr>
		<td width="70%"><a href="/viewstep?id=<?= $step['id'] ?>"><?= $step['title'] ?></a></td>
	</tr>
<? } ?>


	<tr><td><h2>Unanswered Questions</h2></td></tr>
<? foreach($steps as $step){ ?>
	<tr>
		<td width="70%"><a href="/viewstep?id=<?= $step['id'] ?>"><?= $step['title'] ?></a></td>
	</tr>
<? } ?>


</table>


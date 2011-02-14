

<table border="0" width="100%">
	<tr>
		<td colspan="2">
		<h2>Question:</h2>
		 <h2><?= $step['catname'] ?>: <?= $step['title'] ?></h2>
		</td>
	</tr>
	<tr>
		<th width="150"></th>
		<? if(!empty($substeps)) { ?><th width="70%"><b>Answer:</b></th><? } ?>
	</tr>
<?
	$count = 1;
	foreach($substeps as $substep ){ ?>
			<tr><td>[+]</td><td><?= $count ?>.<a href="/viewquestion?id=<?= $substep['id'] ?>">Do you have a <?= $substep['title'] ?></a></td><td><input type="checkbox" alt=""></td></tr>
<? 		$count++;
	} ?>
	
</table>

<? if(empty($substeps)) { ?>

	<p>Unfortunately we do not have an answer for this question, if you would like to add one, click 
	<a href="/editstep?id=<?= $step['id'] ?>">here.</a>
	</p>
	<? } ?>


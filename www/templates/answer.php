
<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h2>Answer a Question</h2>
		</td>
	</tr>
<? foreach($categories as $catid => $cattitle){ ?>
	<tr>
		<td width="70%"><a href="/viewcategory?id=<?= $catid ?>"><?= $cattitle ?></a></td>
	</tr>
	<? foreach($unanswered as $answer) { ?>
	<tr>
	 	<? if($answer['category'] == $catid) { ?>
	 		<td><a href="/viewquestion?id=<?= $answer['id'] ?>"><?= $answer['title'] ?></a></td>
	 	<? } ?>
	</tr>
	<? } ?>
<? } ?>
</table>


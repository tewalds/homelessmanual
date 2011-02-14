
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
	<? foreach($unanswered as $answer) {	
		if($answer['category'] == $catid) { ?>
			<tr><td><a href="/editquestion?id=<?= $answer['id'] ?>"><?= $answer['title'] ?></a></td></tr>
		<? }
	} ?>
<? } ?>
</table>


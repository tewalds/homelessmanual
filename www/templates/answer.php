
<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h2>Answer a Question</h2>
		</td>
	</tr>
<? foreach($categories as $category){ ?>
	<tr>
		<td width="70%"><a href="/viewcategory?id=<?= $category['id'] ?>"><?= $category['title'] ?></a></td>
	</tr>
	<? foreach($unanswered as $answer) { ?>
	<tr>
	 	<? if($answer['category'] == $category) { ?>
	 		<td><a href=""><? $answer['title'] ?></a></td>
	 	<? } ?>
	</tr>
<? } ?>
</table>


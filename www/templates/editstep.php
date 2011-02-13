

<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h2>Edit your question:</h2>
		 <form method="post" action="/updateestep">
		 <input size="30" type="text" name="title" value="<?= htmlentities($step['title']) ?>">
		 <select name="category"><option value="0"> Category</option><?= make_select_list_key($categories, $step['category']) ?></select>
		<br>
		<input type="submit" value="Update Step">
		</form>
		</td>
	</tr>
<?	$count = 1;
	foreach($substeps as $substep){ ?>
	<tr>
		<td><?= $count ?>.</td>
		<td><input size="50" type="text" name="title[<?= $substep['id'] ?>]" value="<?= $substep['title'] ?>"></td>
		<td><select name="category"><option value="0"> Category</option><?= make_select_list_key($categories, $substep['category']) ?></select></td>
	</tr>
<?	$count++; } ?>
	<tr><td colspan="2"><button>add step</button></td></tr>
</table>


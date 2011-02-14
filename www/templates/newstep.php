
<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h2>Enter your question:</h2>
		 <form method="post" action="/createquestion">
		 <input size="30" type="text" name="title" value="<?= htmlentities($title) ?>">
		 <select name="category"><option value="0"> Category</option><?= make_select_list_key($categories, $category) ?></select>
		<br>
		<input type="submit" value="Create Question">
		</form>
		</td>
	</tr>
</table>


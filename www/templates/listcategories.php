
<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h1>Category list</h1>
		</td>
	</tr>
<? foreach($categories as $category){ ?>
	<tr>
		<td width="70%"><a href="/viewcategory?id=<?= $category['id'] ?>"><?= $category['title'] ?></a></td>
	</tr>
<? } ?>
</table>



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
	<? foreach() { ?>
	<tr>
	 	<td><a href="">Question Title</a></td>
	</tr>
	<!-- end repeat for each question in this category -->
	
<? } ?>
</table>


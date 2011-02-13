<script>
 $(function() {
	$('.error').hide();
	$(".button").click(function() {
		// validate and process form here  

		$('.error').hide();  
		var stepid = $("input#stepid").val();
		var title = $("input#title").val();  
		var category = $("select#category").val();
		var dataString = 'id=' + stepid + '&title='+ title + '&category=' + category;  
//		alert (dataString);return false;  

		$.ajax({  
			type: "POST",  
			url: "/updatestep",
			data: dataString,
			success: function() {
//				alert("submitted");
			}
		});
		return false;
	});
});
</script>

<table border="0" id="editstep" width="100%">
	<tr>
		<form name="namecat">
		<td colspan="3">
			<h2>Edit your question:</h2>
			<input type="hidden" id="stepid" name="stepid" value="<?= $step['id'] ?>">
			<input size="40" type="text" id="title" name="title" value="<?= htmlentities($step['title']) ?>">
			<select id="category" name="category"><option value="0"> Category</option><?= make_select_list_key($categories, $step['category']) ?></select>
			<input type="submit" class="button" value="Update Step">
		</td>
		</form>
	</tr>
<?	$count = 1;
	foreach($substeps as $substep){ ?>
	<tr>
		<td><?= $count ?>.</td>
		<td><input size="50" type="text" name="title[<?= $substep['id'] ?>]" value="<?= $substep['title'] ?>"></td>
		<td><select name="category"><option value="0"> Category</option><?= make_select_list_key($categories, $substep['category']) ?></select></td>
	</tr><?	$count++; } ?><tr id="addstepprepend"><td colspan="2"><input type="button" id="addstep" value="Add Step" onClick="copyInputRow('editstep', 'addstepprepend')"></td></tr>
</table>






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

    function addStep()
    {
        var clone = $("#steptemplate").clone();
        $(clone).insertAfter("#steptemplate");

        $("#steptemplate input").attr("name", 2);
    }

</script>

<table border="0" width="100%">
	<tr>
		<form name="namecat">
		<td colspan="3">
			<h2>Edit your question:</h2>
			<input type="hidden" id="stepid" name="stepid" value="<?= $step['id'] ?>">
			<input size="40" type="text" id="title" name="title" value="<?= htmlentities($step['title']) ?>"><select id="category" name="category"><option value="0"> Category</option><?= make_select_list_key($categories, $step['category']) ?></select><input type="submit" class="button" value="Update Step">
		</td>
		</form>
	</tr>
	<tr id="steptemplate" style="display:none">
		<td><?= $count ?>.</td>
		<td><input size="50" type="text" name="title" value=""></td>
		<td></td>
	</tr>

<?	$count = 1;
	foreach($substeps as $substep){ ?>
	<tr>
		<td><?= $count ?>.</td>
		<td><input size="50" type="text" name="title[<?= $substep['id'] ?>]" value="<?= $substep['title'] ?>"></td>
		<td><select name="category"><option value="0"> Category</option><?= make_select_list_key($categories, $substep['category']) ?></select></td>
	</tr>
<?	$count++; } ?>

	<tr>
		<td>
			Addstep: 
			<form action="/editstep">
				<input type="text" name="substep">
				<button>add step</button>
			</form>
		</td>
	</tr>
	<tr><td colspan="2"><button onclick="addStep()">add step</button></td></tr>
</table>



<? if($user->userid){ ?>
<br><br>
<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h2>Discussion</h2>
		</td>
	</tr>
<? foreach($discussion as $post){ ?>
	<tr>
		<td width="160">
			<img src="<?= gravurl($post['email']) ?>" alt="" />
		</td>
		<td width="100%">
			<a href="/viewprofile?id=<?= $post['userid'] ?>"><?= $post['username'] ?></a> - <?= date("F j, Y, g:i a", $post['time']) ?> <hr>
			<?= $post['comment'] ?>
		</td>
	</tr>
<? } ?>
	<tr>
		<td colspan="2">
			<form method="post" action="/discussion">
			<input type="hidden" name="stepid" value="<?= $step['id'] ?>">
			<textarea rows="5" cols="70" name="comment"></textarea>
			<br>
			<input type="submit" value="Post Comment">
		</td>
	</tr>
</table>
<? } ?>


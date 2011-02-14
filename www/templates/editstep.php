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
			url: "/updatequestion",
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
        var clone = $("#steptemplate").clone().show();
        $(clone).insertBefore("#steptemplate");

        $("#steptemplate input").attr("name", 2);
    }

</script>

<table border="0" width="100%">
	<tr>
		<form name="namecat">
		<td>
			<h2>Edit your question:</h2>
			<input type="hidden" id="stepid" name="stepid" value="<?= $step['id'] ?>">
			<input size="40" type="text" id="title" name="title" value="<?= htmlentities($step['title']) ?>"><select id="category" name="category"><option value="0"> Category</option><?= make_select_list_key($categories, $step['category']) ?></select><input type="submit" class="button" value="Update Question">
		</td>
		</form>
	</tr>
<?	$count = 1;
	foreach($substeps as $substep){ ?>
	<tr>
		<td>
		<?
			echo "$count.";
			if($substep['type'] == 1){
				echo "&nbsp;&nbsp;&nbsp;<a href='/editquestion?id=$substep[id]'>$substep[title]</a>";
			}else{
				echo "&nbsp;&nbsp;&nbsp;" $substep['detail'];
			}
		?>
		</td>
	</tr>
<?	$count++; } ?>
</table>



<br><br>

<hr>

Add an Answer:<br>
<form method="post" action="/createanswer">
<input type="hidden" name="stepid" value="<?= $step['id'] ?>">
<select name="type"><?= make_select_list_key($types) ?></select>
<input name="detail" size="40"><input type="submit" value="Add Answer">
</form>

	<style>
	.ui-autocomplete-loading { background: white url('images/ui-anim_basic_16x16.gif') right center no-repeat; }
	</style>
	<script>
	$(function() {
		function log( message ) {
			$( "<div/>" ).text( message ).prependTo( "#log" );
			$( "#log" ).attr( "scrollTop", 0 );
		}


		$( "#subquestion" ).autocomplete("/searchsteps?ajax=1",
		{
			formatItem: function(data, i, n, value) {
				console.log(arguments);
				var match = value.match(/^(\d+)\s(.*)$/);
				var id = match[1];
				return match[2];
			},
			formatResult: function(data, value) {
				var match = value.match(/^(\d+)\s(.*)$/);
				var id = match[1];
				return match[2];
			}
		});
	});
	</script>

<div id="log"></div>
<form method="post" action="/createsubquestion">
<input type="hidden" name="stepid" value="<?= $step['id'] ?>">
Sub question: <input id="subquestion" name="subquestion" size="40">
<input type="submit" value="Add Question">
</form>



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
			</form>
		</td>
	</tr>
</table>
<? } ?>


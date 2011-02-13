<script>
 	
$(function() {  
  $('.error').hide();  
  $(".button").click(function() {  
    // validate and process form here  
  
    $('.error').hide();  
      var name = $("input#title").val();  
        if (name == "") {  
      $("label#title_error").show();  
      $("input#title").focus();  
      return false;  
    }  
	var dataString = 'name='+ title + '&email=' + category;  
	alert (dataString);return false;  

	$.ajax({  
	  type: "POST",  
	  url: "/updatestep.php",  
	  data: dataString,  
	  success: function() {  
	      alert("submitted");
	    });  
	  }  
	});  
	return false;    
  });  
});  
</script>

<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h2>Edit your question:</h2>
		 <form name="namecat">
		 <input size="30" type="text" name="title" value="<?= htmlentities($step['title']) ?>">
		 <select name="category"><option value="0"> Category</option><?= make_select_list_key($categories, $step['category']) ?></select>
		<br>
		<input type="submit" class="button" value="Update Step">
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


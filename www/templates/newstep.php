

<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h2>Enter your question:</h2>
		 
		 <select><option>How do I get</option><option>Where do I find</option><option>Who do I contact to</option></select><input size="100" type="text" value=""><br>
		 
		 Category: <select> <? foreach($category as $row) { ?>
		 						 <option value="row['id']"><?= $row['title'] ?></option>
		 					}
		 		   </select>


<br>
		<button>ADD Question</button>
		 </h2>
		</td>
	</tr>

</table>

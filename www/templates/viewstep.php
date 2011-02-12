
<?php
$QuestionType = "How do I get";
$QuestionTitle = "a bank account";
?>



<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h2><?php echo $step['category'] ?>: <?php echo $step['title'] ?></h2>
		</td>
	</tr>
	<tr><td width="150"></th>
		<td width="70%"><b>Steps:</b></th>
		<td><b>Completed</b></th>
	</tr>
	<tr><?
	 	
	 	$counter = 0;	
	 	
		foreach($statement)
		{?>
			<td><button>expand</button></td><td>1.<a href="">Do you have a <? echo $statement[$counter, ']  Step 1 Title</a></td><td><input type="checkbox" alt=></td>
		}
		
	</tr>
</table>

<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h2>Discussion</h2>
		</td>
	</tr>
	<tr>
		<td>Discussion around the current question<td>usename</td><td>date</td>
	</tr>
	<tr>
		<td>Discussion around the current question<td>usename</td><td>date</td>
	</tr>
	<tr>
		<td>Discussion around the current question<td>usename</td><td>date</td>
	</tr>
</table>

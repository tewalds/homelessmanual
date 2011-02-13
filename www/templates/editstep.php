
<?php
$QuestionType = "How do I get";
$QuestionTitle = "a bank account";
?>



<table border="0" width="100%">
	<tr>
		<td colspan="2">
		 <h2>
		<select><option>How do I get</option><option>Where do I find</option><option>Who do I contact to</option></select><input size="100" type="text" value="Step(question title)">

		 </h2>
		</td>
	</tr>
	<tr>
		<td>1.<input size="100" type="text" value="Step(question title) as a type ahead"></td><td><button>add substep</button></td><td><button>show substeps</button></td><td>[substep count]</td>
	</tr>
	<tr>
		<td>2.<input size="100" type="text" value="Step(question title) as a type ahead"></td><td><button>add substep</button></td><td><button>show substeps</button></td><td>[substep count]</td>
	</tr>
	<tr>
		<td>3.<input size="100" type="text" value="Step(question title) as a type ahead"></td><td><button>add substep</button></td><td><button>show substeps</button></td><td>[substep count]</td>
	</tr>
	
	<tr><td colspan="2"><button>add step</button></td></tr>
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

<? redirect("/editstep") ?>

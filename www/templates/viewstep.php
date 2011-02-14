

<table border="0" width="100%">
	<tr>
		<td colspan="2">
		
		 <h2><?= $step['catname'] ?>: <?= $step['title'] ?></h2>
		</td>
	</tr>
	<tr>
		<th width="150"></th>
		<? if(!empty($substeps)) { ?><th width="70%"><b>Answer:</b></th><? } ?>
	</tr>


		<?
			echo "$count.";
			if($substep['type'] == 1){
			?>
			<tr><td><a href="/viewquestion?id=<?= $substep['id'] ?>"><?= $substep['title'] ?></a></td></tr>

<?			}else{
?>
			<tr><td><?= $substep['detail'] ?></td></tr>
<?
			}
		?>









<?
	$count = 1;
	foreach($substeps as $substep ){ ?>
			<tr><td><?= $count ?>.<a href="/viewquestion?id=<?= $substep['id'] ?>"><?= $substep['title'] ?></a></td><td><input type="checkbox" alt=""></td></tr>
<? 		$count++;
	} ?>
	
</table>

<? if(empty($substeps)) { ?>

	<p>Unfortunately we do not have an answer for this question, if you would like to add one, click 
	<a href="/editquestion?id=<?= $step['id'] ?>">here.</a>
	</p>
	<? }else{
	?>
	 <a href="/editquestion?id=<?= $step['id'] ?>Edit this question</a>
	 <?
	} 
	
	?>


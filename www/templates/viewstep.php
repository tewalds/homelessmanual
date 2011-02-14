

<table border="0" width="100%">
	<tr>
		<td>
		
		 <h2><?= $step['catname'] ?>: <?= $step['title'] ?></h2>
		</td>
	</tr>


		<?
		foreach($substeps as $substep ){ 
			if($substep['type'] == 1){
			?>
			<tr><td>&nbsp;&nbsp;&nbsp;<a href="/viewquestion?id=<?= $substep['id'] ?>"><?= $substep['title'] ?></a></td></tr>

<?			}else{
?>
			<tr><td>&nbsp;&nbsp;&nbsp;<?= $substep['detail'] ?></td></tr>
<?
			}
		}
		?>


</table>

<? if(empty($substeps)) { ?>

	<p>Unfortunately we do not have an answer for this question, if you would like to add one, click 
	<a href="/editquestion?id=<?= $step['id'] ?>">here.</a>
	</p>
	<? }else{
	?>
	 <br><br><a href="/editquestion?id=<?= $step['id'] ?>">Edit this question</a>
	 <?
	} 
	
	?>


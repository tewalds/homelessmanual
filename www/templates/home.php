<h1>Welcome to the Helping Manual</h1>
<P>Helping Manual is a free and open resource intended to provide a single, collaborative source of information for people in need of basic services. Topics are arranged into a series of action-based questions, such as "Where can I find shelter" or "How do I get a bank account?" Anyone can use the site, or you can sign up to contribute.</P>

<h2>Ask a question</h2>



	<style>
	.ui-autocomplete-loading { background: white url('images/ui-anim_basic_16x16.gif') right center no-repeat; }
	</style>
	<script>
	$(function() {
		function log( message ) {
			$( "<div/>" ).text( message ).prependTo( "#log" );
			$( "#log" ).attr( "scrollTop", 0 );
		}


		$( "#askquestion" ).autocomplete("/searchsteps?ajax=1",
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


<form method="get" action="/searchsteps">
<input id="askquestion" type="text" style="font-size:30px; width:80%;" name="q">
<input style="font-size:30px;" type=submit value="Ask">
</form>
<br><br>

<h2>Browse for a question</h2>

<table class="cattable">
<?
	$count = 0;
	foreach($categories as $id => $title){
		if($count % 4 == 0) echo "<tr>";
	?><td><a href="/viewcategory?id=<?= $id ?>"><img border="0" src="/images/catphotos/<?= $id ?>.jpg"><?= $title ?></a></td><?
		if($count++ % 4 == 3) echo "</tr>";
	}
?>
</table>

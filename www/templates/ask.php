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



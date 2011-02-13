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

		$( "#askquestion" ).autocomplete({
			source: "asktypeahead.php",
			minLength: 1,
			select: function( event, ui ) {
				log( ui.item ?
					"Selected: " + ui.item.value + " aka " + ui.item.id :
					"Nothing selected, input was " + this.value );
			}
		});
	});
	</script>


<div id="log"></div>


<input id="askquestion" type="text" style="font-size:30px; width:80%;"><button sytle="font-size:30px;">Ask</button>

<h2>Ask a Browse for a question</h2>

<table class="cattable">
	<tr>
		<td><a href="/viewcategory?id=5">Food</a></td><td><a href="/viewcategory?id=2">Shelter</a></td><td><a href="/viewcategory?id=3">Health/Medical/Drugs</a></td><td><a href="/viewcategory?id=">Money</a></td>
	</tr>
	<tr>
		<td><a href="/viewcategory?id=">Security</a></td><td><a href="/viewcategory?id=1">Jobs/Finance</a></td><td><a href="/viewcategory?id=4">Clothing</a></td><td><a href="/viewcategory?id=">Literacy</a></td>
	</tr>
	<tr>
		<td><a href="/identification?id=6">Security</a></td><td><a href="/viewcategory?id=7">Transportation</a></td><td><a href="/viewcategory?id=8">Community Support</a></td><td><a href="/viewcategory?id=9">Education</a></td>
	</tr>

</table>
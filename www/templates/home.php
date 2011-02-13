<h1>Welcome to the Homeless Manual</h1>
<P>Helping Manual is a free and open resource intended to provide a single, collaborative source of information for people in need of basic services. Topics are arranged into a series of action-based questions, such as "Where can I find shelter" or "How do I get a bank account?" Anyone can use the site, or you can sign up to contribute.</P>

<h2>Ask a question</h2>


  <script>
  $(document).ready(function(){
	$("#askquestion").autocomplete("asktypeahead.php", {
		width: 260,
		selectFirst: false
	});
  });
  </script>


<input id="#askquestion" type="text" style="font-size:30px; width:80%;"><button sytle="font-size:30px;">Ask</button>

<h2>Ask a Browse for a question</h2>

<table class="cattable">
	<tr>
		<td><a href="/viewcategory?id=">Food</a></td><td><a href="/viewcategory?id=">Shelter</a></td><td><a href="/viewcategory?id=">Health/Medical/Drugs</a></td><td><a href="/viewcategory?id=">Money</a></td>
	</tr>
	<tr>
		<td><a href="/viewcategory?id=">Security</a></td><td><a href="/viewcategory?id=">Jobs</a></td><td><a href="/viewcategory?id=">Clothing</a></td><td><a href="/viewcategory?id=">Literacy</a></td>
	</tr>

</table>
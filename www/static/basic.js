
function copyInputRow(tablename, nextrow){
	var tableobj = document.getElementById(tablename);
	var numrows=tableobj.rows.length;

	var nextrow=document.getElementById(nextrow);
	var newrow= nextrow.previousSibling.cloneNode(true); //first row

	var inputs = newrow.getElementsByTagName('input');

	for(i = 0; i < inputs.length; i++)
		inputs[i].value = '';

	tableobj.tBodies[0].insertBefore(newrow, nextrow);

	return newrow;
}


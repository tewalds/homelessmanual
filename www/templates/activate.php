<table>
<form method="post" action="/activate">
<tr><th colspan=2>Activate:</th></tr>
<tr><td>Email:</td><td><input name="email" value="<?= htmlentities($email) ?>"></td></tr>
<tr><td>Activation Key:</td><td><input name="key" value="<?= $key ?>"></td></tr>
<tr><td colspan=2><input type="submit" value="Activate"></td></tr>
</form>
</table>


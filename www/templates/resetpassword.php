
<table>
<form method="post" action="/resetpassword">
<tr><th colspan=2>Reset Password:</th></tr>
<tr><td>Email:</td><td><input name="email" value="<?= $email ?>"></td></tr>
<tr><td>Key:</td><td><input name="key" value="<?= $key ?>"></td></tr>
<tr><td>New Password:</td><td><input name="newpass" type="password"></td></tr>
<tr><td colspan=2><input type="submit" value="Reset Password"></td></tr>
</form>
</table>



<table>
<form method="post" action="/createuser">
<tr><th colspan=2>Sign up:</th></tr>
<tr><td>Email:</td><td><input name="email" value="<?= htmlentities($email) ?>"></td></tr>
<tr><td>Password:</td><td><input name="password" type="password"></td></tr>
<tr><td colspan=2><input type="submit" value="Sign up"></td></tr>
</form>
</table>

<table>
<form method="post" action="/login">
<tr><th colspan=2>Login:</th></tr>
<tr><td>Email:</td><td><input name="email" value="<?= htmlentities($email) ?>"></td></tr>
<tr><td>Password:</td><td><input name="password" type="password"></td></tr>
<tr><td colspan=2><?= makeCheckbox("longsession", "Keep me logged in", $longsession) ?></td></tr>
<tr><td colspan=2><input type="submit" value="Login"> <a href="/lostpassword">Lost Password</a></td></tr>
</form>
</table>


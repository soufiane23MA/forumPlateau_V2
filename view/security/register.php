<form action="index.php?ctrl=security&action=register" method="post">
	<h2>S'enregistrer</h2>
	<input type="email" name="email" value="micka@exemple.com" class="form-control"
	placeholder="Email" required/><br>
	<input name="pseudo" type="text" value="micka" class="form-control"
	placeholder="Pseudo" required/><br>
	<input name ="password" type="password" value="aaaaaaaa" name="password"  class="form-control" 
	placeholder="Mot de passe"/><br>
	<input name ="confirmPassword" type="password" value="aaaaaaaa" class="form-control"
	placeholder="Confirmer mot de passe" required/><br>
	<button class="btn" type="submit" name="submitSignUp">S'enregistrer</button>


</form>
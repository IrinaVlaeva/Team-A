<?php include "header.php" ?>

    
<form id="reg" action="/code/save_user.php" method="post" style="width: 50%;">

    <ul>
	<li>
	    <label>Login</label>
	    <input data-title="login" name="login" value="" type="text" required autofocus size="50"/>
	</li>
	<li>
	    <label>Password</label>
	    <input name="password" type="password" required size="50"/>
	</li>
	<li>
	    <label>Confirm the password</label>
	    <input name="repassword" type="password" required size="50"/>
	</li>
	<li>
	    <label>E-mail</label>
	    <input data-title="email" name="email" value="" type="text" size="50"/>
	</li>
	<li>
	    <label>Name</label>
	    <input data-title="name" name="name" value="" type="text" size="50"/>
	</li>
	<li>
	    <label>Country</label>
	    <input data-title="country" name="country" value="" type="text" size="50"/>
	</li>
	<li class="inline">
	    <label>Sex</label>
	    <select name="sex" size="1">
		<option value="0">Male</option>
		<option value="1">Female</option>
	    </select>
	</li>
	<li class="inline">
	    <label>Возраст</label>
	    <select name="age" size="1">
		<option value="1980">1980</option>
		<option value="1981">1981</option>
	    </select>
	</li>
    </ul>

    <p class="buttons">
	<input type="submit" name="submit" value="Register"/>
	<input type="submit" name="cancel" value="Cancel"/>
    </p>

</form>
    
<?php include "footer.php" ?>
    

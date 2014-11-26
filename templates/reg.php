<?php include "header.php" ?>

    
<form id="reg" action="" method="post" style="width: 50%;">

    <ul>
	<li>
	    <label>Login</label>
	    <input data-title="login" name="reg.login" value="" type="text" size="19"/>
	</li>
	<li>
	    <label>Password</label>
	    <input name="reg.password" type="password" size="19"/>
	</li>
	<li>
	    <label>Confirm the password</label>
	    <input name="reg.repassword" type="password" size="19"/>
	</li>
	<li>
	    <label>E-mai</label>
	    <input data-title="email" name="reg.email" value="" type="text" size="19"/>
	</li>
	<li>
	    <label>Name</label>
	    <input data-title="name" name="reg.name" value="" type="text" size="19"/>
	</li>
	<li>
	    <label>Country</label>
	    <input data-title="country" name="reg.country" value="" type="text" size="19"/>
	</li>
    </ul>

    <p class="buttons">
	<input type="submit" name="ok" value="Submit"/>
	<input type="submit" name="cancel" value="Cansel"/>
    </p>

</form>
    
<?php include "footer.php" ?>
    

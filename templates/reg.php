<?php include "header.php" ?>

    
<form id="reg" action="" method="post" style="width: 50%;">

    <ul>
	<li>
	    <label>Login</label>
	    <input data-title="login" name="login" value="" type="text" size="19"/>
	</li>
	<li>
	    <label>Password</label>
	    <input name="password" type="password" size="19"/>
	</li>
	<li>
	    <label>Confirm the password</label>
	    <input name="repassword" type="password" size="19"/>
	</li>
	<li>
	    <label>E-mai</label>
	    <input data-title="email" name="email" value="" type="text" size="19"/>
	</li>
	<li>
	    <label>Name</label>
	    <input data-title="name" name="name" value="" type="text" size="19"/>
	</li>
	<li>
	    <label>Country</label>
	    <input data-title="country" name="country" value="" type="text" size="19"/>
	</li>
    </ul>

    <p class="buttons">
	<input type="submit" name="ok" value="Submit"/>
	<input type="submit" name="cancel" value="Cansel"/>
    </p>

</form>
    
<?php include "footer.php" ?>
    

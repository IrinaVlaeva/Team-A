<?php include "header.php" ?>

<form id='login' action='/templates/user.php?action=login' method='post' accept-charset='UTF-8' style="width: 50%;">
    <fieldset >
	<legend>Login</legend>
	
	<?php if ( isset( $results['errorMessage'] ) ) { ?>
	<div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
	<?php } ?>
	
	<input type='hidden' name='submitted' id='submitted' value='1'/>
	 
	<label for='username' >User name:</label>
	<input type='text' name='username' id='username'  maxlength="50" placeholder="User name" required autofocus maxlength="200"/>
	 
	<label for='password' >Password:</label>
	<input type='password' name='password' id='password' maxlength="50" placeholder="Password" required maxlength="200"/>
	 
	<input type='submit' name='Submit' value='Submit'/>
     
    </fieldset>
</form>

<?php include "footer.php" ?>
<?php include "header.php" ?>

<form id="login" action="admin.php?action=login" method="post" style="width: 50%;">
    <input type="hidden" name="login" value="true" />

    <?php if ( isset( $results['errorMessage'] ) ) { ?>
	<div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
    <?php } ?>

    <ul>
	<li>
	    <label for="login">Login</label>
	    <input type="text" name="login.login" id="login" placeholder="Login or e-mail" required autofocus maxlength="20" />
	</li>
	<li>
	    <label for="password">Password</label>
	    <input type="password" name="login.password" id="password" placeholder="Password" required maxlength="20" />
	</li>
    </ul>

    <div class="buttons">
	<input type="submit" name="login" value="Login" />
    </div>

</form>

<?php include "footer.php" ?>


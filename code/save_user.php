<?php

include( "config.php" ); //include the settings/configuration
include( "classes/User.php" );

$usr = new User;

$usr->storeFormValues( $_POST );

if( $_POST['password'] == $_POST['repassword'] )
{
    echo $usr->register( $_POST );
}
else
{
    echo "Password did not confirmed";
}

?>
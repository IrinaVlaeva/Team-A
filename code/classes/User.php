<?php

/**
* Класс для сущности Пользователь
*/

class User
{
    // Свойства

    //public $user_id = null;
    public $login = null;
    public $password = null;
    public $email = null;
    public $name;
    public $country = null;
    public $age = null;
    public $sex = null;
    public $user_type = "1";
    public $is_activated = "1";
    public $salt = "Zo4rU5Z1YyKJAASY0PT6EUg94857lEhPaNLuxAwU8lqu1ElzHv0Ri7EM6irpx5w";
        
    public function __construct( $data = array() )
    {
	if( isset( $data['login'] ) ) $this->login = stripslashes( strip_tags( $data['login'] ) );
	if( isset( $data['password'] ) ) $this->password = stripslashes( strip_tags( $data['password'] ) );
	if( isset( $data['email'] ) ) $this->email = stripslashes( strip_tags( $data['email'] ) );
	if( isset( $data['name'] ) ) $this->name = stripslashes( strip_tags( $data['name'] ) );
	if( isset( $data['country'] ) ) $this->country = stripslashes( strip_tags( $data['country'] ) );
	if( isset( $data['age'] ) ) $this->age = stripslashes( strip_tags( $data['age'] ) );
	if( isset( $data['sex'] ) ) $this->sex = stripslashes( strip_tags( $data['sex'] ) );
    }    
    
    public function storeFormValues( $params )
    {
	//store the parameters
	$this->__construct( $params );
    }
    
/*    public function userLogin()
    {
	//success variable will be used to return if the login was successful or not.
	$success = false;
	try
	{
	    //create our pdo object
	    $con = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	    //set how pdo will handle errors
	    $con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	    //this would be our query.
	    $sql = "SELECT * FROM user WHERE login = :login AND password = :password LIMIT 1";

	    //prepare the statements
	    $stmt = $con->prepare( $sql );
	    //give value to named parameter :login
	    $stmt->bindValue( "login", $this->login, PDO::PARAM_STR );
	    //give value to named parameter :password
	    $stmt->bindValue( "password", hash("sha256", $this->password . $this->salt), PDO::PARAM_STR );
	    $stmt->execute();

	    $valid = $stmt->fetchColumn();

	    if( $valid )
	    {
		$success = true;
	    }

	    $con = null;
	    return $success;
	}
	catch (PDOException $e)
	{
	    echo $e->getMessage();
	    return $success;
	}
    }
*/    
    public function register()
    {
	$correct = false;
	try
	{
	    $con = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	    $con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	    $sql = "INSERT INTO user( login, password, email, is_activated, user_type ) VALUES( :login, :password, :email, :is_activated, :user_type )";
	    $stmt = $con->prepare( $sql );
	    $stmt->bindValue( "login", $this->login, PDO::PARAM_STR );
	    $stmt->bindValue( "password", hash("sha256", $this->password . $this->salt), PDO::PARAM_STR );
	    $stmt->bindValue( "email", $this->email );
	    $stmt->bindValue( "is_activated", $this->is_activated );
	    $stmt->bindValue( "user_type", $this->user_type );
	    $stmt->execute();
	    $last_id = $con->lastInsertId();
	    $sql1 = "INSERT INTO user_info( user_id, name, country, age, sex ) VALUES( :user_id, :name, :country, :age, :sex)";
	    $stmt1 = $con->prepare( $sql1 );
	    $stmt1->bindValue( "user_id", $last_id );
	    $stmt1->bindValue( "name", $this->name );
	    $stmt1->bindValue( "country", $this->country );
	    $stmt1->bindValue( "age", $this->age );
	    $stmt1->bindValue( "sex", $this->sex );
	    $stmt1->execute();
	    return "Registration Successful <br/> <a href='../templates/login.php'>Login Now</a>";
	}
	catch( PDOException $e )
	{
	    return $e->getMessage();
	}
    }
}

?>

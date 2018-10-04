
function login($username, $password){

    $request = array();

    $request['type'] = "Login";
    $request['username'] = $username;
    $request['password'] = $password;

    $returnedValue = createClientForDb($request);

    if($returnedValue == 1){
        $_SESSION["username"] = $username;
        $_SESSION["logged"] = true;
    }else{
        session_destroy();
    }

    return $returnedValue;
}

//  This function will send register request to RabbitMQ
function register($firstname, $lastname, $username, $email, $password){

    $request = array();

    $request['type'] = "Register";
    $request['username'] = $username;
    $request['password'] = $password;
    $request['firstname'] = $firstname;
    $request['lastname'] = $lastname;
    $request['email'] = $email;

    $returnedValue = createClientForDb($request);

    return $returnedValue;
}

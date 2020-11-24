<?php
/*
    Plugin Name | Custom Reg UWD
    Decription  | Custom registration form made by Henry Chard UWD
    Version     | 1.0
    Author      | Henry Chard
    Business    | Universal Web Design
    */

function registration_form( $username, $password, $email, $website, $first_name, $last_name, $mickname, $bio ) {
    echo
    '<style>
    div {
        margin-bottom:2px;
    }

    input {
        margin-bottom: 4px;
    }
    </style>';
// Below is the basic layout of the form contained in divs and input fields
    echo '
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
    <div>
    <label for="username">Username <strong>*</strong></label>
    <input type="text" name="username" value="' . ( isset( $_POST['username'] ) ? $username : null ) . '">
    </div>
     
    <div>
    <label for="password">Password <strong>*</strong></label>
    <input type="password" name="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
    </div>
     
    <div>
    <label for="email">Email <strong>*</strong></label>
    <input type="text" name="email" value="' . ( isset( $_POST['email']) ? $email : null ) . '">
    </div>
     
    <div>
    <label for="website">Website</label>
    <input type="text" name="website" value="' . ( isset( $_POST['website']) ? $website : null ) . '">
    </div>
     
    <div>
    <label for="firstname">First Name</label>
    <input type="text" name="fname" value="' . ( isset( $_POST['fname']) ? $first_name : null ) . '">
    </div>
     
    <div>
    <label for="website">Last Name</label>
    <input type="text" name="lname" value="' . ( isset( $_POST['lname']) ? $last_name : null ) . '">
    </div>
     
    <div>
    <label for="nickname">Nickname</label>
    <input type="text" name="nickname" value="' . ( isset( $_POST['nickname']) ? $nickname : null ) . '">
    </div>
     
    <div>
    <label for="bio">About / Bio</label>
    <textarea name="bio">' . ( isset( $_POST['bio']) ? $bio : null ) . '</textarea>
    </div>
    <input type="submit" name="submit" value="Register"/>
    </form>
    ';
}
// Below is the validation function for the form containing different if statements to run ensuring the form is filled out corrretly
function registration_validation( $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio )  {
    global $reg_errors;
    $reg_errors = new WP_Error;

    if ( empty( $username ) || empty( $password ) || empty( $email ) ) {
        $reg_errors->add('field', 'Required form field is missing');
    }

    if ( 4 > strlen( $username ) ) {
        $reg_errors->add( 'username_length', 'Username too short. At least 4 characters is required' );
    }

    if ( 5 > strlen( $password)) {
        $reg_erros->add('password', 'Passowrd length must be greater than 5');
    }

    if ( !is_email($email)) {
        $reg_errors->add('email', 'Email is not valid');
    }

    if ( email_exists($email)){
        $reg_errors->add('email', 'Email already in use');
    }

    if ( ! empty($website)) {
        if ( ! filter_var($website, FILTER_VALIDATE_URL)) {
            $reg_errors->add('website', 'Website is not a valid URL');
        }
    }
}

// Below is the complete registration function whic will accept an array of user data
function complete_registration() {
    global $reg_errors, $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio;
    if ( 1 > count($reg_errors->get_error_messages())) {
        $userdata = array(
            'user_login'    => $username,
            'user_email'    => $email,
            'user_pass'     => $password,
            'user_url'      => $website,
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'nickname'      => $nickname,
            'description'   => $bio,
        );
        $user = wp_insert_user( $userdata );
        echo 'Registration Complete. Go to <a href="' . get_site_url() . '/wp-login.php">login page</a>.'; 
    }
}

// Below is the custom registration function that puts all the function above into use


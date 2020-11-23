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

    echo '
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
    <div>
    <label for="username">Username <strong>*</strong></label>
    <input type="text" name="username" value="' . ( isset( $_POST['username'] ) ? $username : null ) . '">
    </div>

    <div>
    <label for="password">Password <strong>*</strong></label>
    '
}

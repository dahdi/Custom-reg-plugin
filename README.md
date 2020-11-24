# Custom reg plugin
 Custom registration plugin for wp - This is created to allow a user to login with a basic form while communiacting with the WordPress database to store the new user information.

 # Installation
 To install the plugin you will need to download the zip file from the GitHub and implement it into your WP site.

 Then add the shortcode for a simple 'Plug & Play'.

# Plugin Usage
In order to implement the plugin in a WP post or page, the shortcode [cr_custom_reg] will need to be added in a code element.

The styles can easily be changed in the source code or within the custom CSS section with the Divi builder (or other plugin)

If you wanted to implement the registration form in a specific aspect within the theme, the following php template tag will need to be added - 
``` PHP
<?php custom_registration_function(); ?>
```
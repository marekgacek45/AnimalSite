<?php 


require('functions.php');
require('./classes/Session.php');


spl_autoload_register(function($class){
    require"classes/{$class}.php";
});


?>
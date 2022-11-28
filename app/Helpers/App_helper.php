<?php 
function show_form_errors($field, $error_collection){

    // Exibe os erros no login
    if(key_exists($field, $error_collection)){
        return $error_collection[$field];
    }
}

function id(){
    return session()->usuario->id;
}
?>
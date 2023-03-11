<?php






//a function that returns true in the case of the user being connected. and vice versa.
function user_is_connected(){
if(! empty($_SESSION['user'])){
    return true;
}else{
    return false;
}

}

// a function that tells you if the user has the admin status 2
function user_is_admin(){
    if(user_is_connected() && $_SESSION['user']['status'] == 2){
        return true;
    }
    return false;
}


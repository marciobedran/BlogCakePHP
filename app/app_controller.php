<?php  
class AppController extends Controller  
{  
    function isLoggedin( )  
    {  
        if ( ! $this->Session->check( 'Author' ) )  
        {  
            $this->flash( 'You must be logged in to do that.', '/authors/login' );  
            exit;  
        }  
    }  
}  
?>
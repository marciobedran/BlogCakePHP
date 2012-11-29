<?php  
class AuthorsController extends AppController  
{  
    function index( )  
    {  
        $this->redirect( '/' );  
    }  
    function login( )  
    {  
        $this->set('error', false);  
        if ( ! empty( $this->data ) )  
        {  
            $author = $this->Author->findByUsername( $this->data['Author']['username'] );  
            if( ! empty( $author['Author']['password'] ) && $author['Author']['password'] == md5($this->data['Author']['password']) )  
            {  
                $this->Session->write( 'Author', $author['Author'] );  
                $this->redirect( '/' );  
            }  
            else  
                $this->set( 'error', true );  
        }  
    }
function logout( )  
{  
    $this->Session->delete( 'Author' );  
	$this->flash( 'You have been logged out.', '/' );
}
function manage()  
{  
    $this->set('error', false);
	$this->isLoggedIn();
    if ( empty( $this->data) )  
    {  
        $this->Author->id = $this->Session->read( 'Author.id' );  
        $this->data = $this->Author->read( );  
    }  
    else  
    {  
        if(  empty ( $this->data['Author']['name'] ) || empty ( $this->data['Author']['email'] ) || empty ( $this->data['Author']['bio'] )  )  
        {  
            $this->set( 'error', true );  
            $this->Author->id = $this->Session->read( 'Author.id' );  
            $this->data = $this->Author->read( );  
        }  
        else  
        {  
            $this->Author->id = $this->Session->read( 'Author.id' );  
            if ( $this->Author->save( $this->data['Author'] ) )  
                $this->flash( 'Your account information has been updated.', '/authors/manage/' );  
        }  
    }  
}
}
?>
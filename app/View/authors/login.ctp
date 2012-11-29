<?php if ($error) { ?>  
<h2>Error</h2>  
<p class='error'>The username and password do not match. Please try again and double check the entered information.</p>  
<?php } ?>  
<?php echo $this->form->formTag('/authors/login/'); ?>  
    <label for="username">Username</label>  
    <?php  
    echo $this->form->input('Author/username');  
    ?>  
    <label for="password">Password</label>  
    <?php  
    echo $this->form->password('Author/password');  
    ?>  
<br/>  
<?php echo $this->form->submit("Login"); ?>  
</form>
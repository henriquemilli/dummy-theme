<style>
    .hidden {
        display: none;
    }
</style>
<div class="hm-form-wrapper">

    <div id="reg-form-wrapper" class="hm-inner-wrapper hidden bg--graph">
        <h3>Crea un account</h3>
        <p class="sub-heading">Hai già un account? <a href="javascript:;" id="login-link">Login</a></p>
        
        <form id="reg-form"  method="POST" target="_self" >
            <?php wp_nonce_field( 'create_user_form_submit', 'rusrfrm992283yu' ); ?>
            
            <div class="hm-field-wrapper">
                <div class="hm-form-div username">
                    <label>Username*</label>
                    <input type="text" name="username" placeholder="username" required>
                </div>
                
                    <div class="hm-form-div name">
                    <label>Nome*</label>
                    <input type="text" name="first_name" placeholder="Nome" required>
                </div>
                
                <div class="hm-form-div surname">
                    <label>Cognome*</label>
                    <input type="text" name="last_name" placeholder="Cognome" required>
                </div>
                
                <div class="hm-form-div mail1">
                    <label>Indirizzo email*</label>
                    <input type="email" name="email" placeholder="esempio@email.it" required>
                </div>
                
                <div class="hm-form-div mail2">    
                    <label>Conferma indirizzo email*</label>
                    <input type="email" name="email_c" placeholder="esempio@email.it" required>
                </div>
                
                <div class="hm-form-div pass1">    
                    <label>Password*</label>
                    <input type="password" name="password" placeholder="******" required>
                </div>
                
                <div class="hm-form-div pass2">    
                    <label>Conferma password*</label>
                    <input type="password" name="password_c" placeholder="******" required>
                </div>
                
            </div>
            <div class="hm-rl-footer">
                <div class="hm-form-div privacy">    
                    <p>Facendo clic su Crea account, confermo di aver letto e accettato la <a href="/privacy-policy">Privacy Policy</a>.</p>
                </div>
                
                <div class="hm-form-div submit">    
                    <input type="submit" value="Crea account">
                </div>
            </div>
        </form>
    
    </div>

    <div id="log-form-wrapper" class="hm-inner-wrapper bg--graph">
        <h3>Login</h3>
        <p class="sub-heading">Non hai un account? <a href="javascript:;" id="create-link">Crea un account</a></p>
        
        <form id="log-form"  method="POST" target="_self" >
            <?php wp_nonce_field( 'login_user_form_submit', 'lusrfrm992283yu' ); ?>

            <div class="hm-field-wrapper">
                <div class="hm-form-div mail">
                    <label>Username*</label>
                    <input type="text" name="username" placeholder="username" required>
                </div>

                <div class="hm-form-div pass">    
                    <label>Password*</label>
                    <input type="password" name="password" placeholder="******" required>
                </div>
            </div>

            <div class="hm-rl-footer">
                <div class="hm-form-div submit">    
                    <input type="submit" value="Accedi">
                </div>
            </div>

        </form>
        
    </div>

    <script type="text/javascript">
        function toggle() {
            document.getElementById("log-form-wrapper").classList.toggle("hidden");
            document.getElementById("reg-form-wrapper").classList.toggle("hidden");
        }
        document.getElementById("create-link").addEventListener("click", toggle)
        document.getElementById("login-link").addEventListener("click", toggle)
    </script>

</div>

<?php
    
if ( isset( $_POST['rusrfrm992283yu']) ) {
    if( wp_verify_nonce( $_POST['rusrfrm992283yu'], 'create_user_form_submit' ) ) {
        
        $username = sanitize_text_field($_POST['username']);
        $first_name = sanitize_text_field($_POST['first_name']);
        $last_name = sanitize_text_field($_POST['last_name']);
        $email = sanitize_text_field($_POST['email']);
        $email_c = sanitize_text_field($_POST['email_c']);
        $password = $_POST['password'];
        $password_c = $_POST['password_c'];

        $valid = TRUE;
        //email validation
        $match = ($email == $email_c);
        if(!$match){
            print('<p class="hm_rl_error">Emails must match.</p>');
            $valid = FALSE;
        }
        //check if that user exists
        if( username_exists( $username ) || email_exists($email) ) {
            print('<p class="hm_rl_error">Username or email already in use.</p>');
            $valid = FALSE;
        }
        //pass validation
        $equal = ($password == $password_c);
        $lenght = strlen($password) >= 6 && strlen($password) <= 16;
        if(!$equal || !$lenght) {
            print('<p class="hm_rl_error">Passwords must match and be at least six characters but less than 16.</p>');
            $valid = FALSE;
        }
        
        if( $valid ) {
            $user_id = wp_create_user( $username, $password, $email );
            $update = array('ID'=>$user_id, 'first_name'=>$first_name, 'last_name'=>$last_name);
            wp_update_user( $update );
            print('<p class="hm_rl_error">Registration successfull. Log-in with your credentials.</p>');
        }
    }
}

if ( isset( $_POST['lusrfrm992283yu']) ) {
    if( wp_verify_nonce( $_POST['lusrfrm992283yu'], 'login_user_form_submit' ) ) {
        
        $username = sanitize_text_field($_POST['username']);
        $password = $_POST['password'];
        $credentials = array('user_login'=>$username, 'user_password'=>$password, 'remember'=>true);
        $result = wp_signon($credentials);
        if( is_wp_error($result) ) {
            print('<p class="hm_rl_error">Credentials not reconized</p>');
        }
    }
}
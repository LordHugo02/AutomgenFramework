<div class="container justify-content-center">
    
    <?php
        
        if(isset($alerts) && !empty($alerts)) {
            
            foreach ($alerts as $typeAlert => $alert) {
                
                if(!empty($alert)) {
                    
                    foreach ($alert as $textAlert) {
                        
                        echo '<div class="alert alert-' . $typeAlert . '" role="alert">' . $textAlert . '</div>';
                        
                    }
                    
                }
                
            }
            
        }
    
    ?>
    
    <form class="mt-4" method="post" action="<?php echo $pub_url . 'user/sign_in';?>">
    
        <input type="hidden" name="valid" value="1">
        
        <div class="card">
            
            <div class="card-header">
                <h1 class="text-center">Connexion</h1>
            </div>
            
            <div class="card-body p-x-2 p-md-4">
                
                <div class="row justify-content-evenly">
                    <div class="col-12 col-sm-6 col-lg-4">
                        <label for="email" class="<?php if(in_array('email', $fieldsNotValid)) echo 'text-danger';?>">Adresse mail</label>
                        <input type="email" class="form-control <?php if(in_array('email', $fieldsNotValid)) echo 'border-danger';?>" id="email" name="email" value="<?php if($email) echo $email;?>" required>
                    </div>
    
                    <div class="col-12 col-sm-6 col-lg-4 mt-2 mt-sm-0">
                        <label for="password" class="<?php if(in_array('password', $fieldsNotValid)) echo 'text-danger';?>">Mot de passe</label>
                        <input type="password" class="form-control <?php if(in_array('password', $fieldsNotValid)) echo 'border-danger';?>" id="password" name="password" minlength="8" pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\[\]\^\<\>\(\)\{\}\#\_\-])[A-Za-z\d@$!%*?&\[\]\^\<\>\(\)\{\}\#\_\-]{8,}/" title="Il faut un mot de passe d'au moins 8 caractères avec minuscule, majuscule et chiffre" autocomplete="off" required>
                    </div>
                </div>
                <!-- /row -->
            
            </div>
            <!-- /card-body -->
            
            <div class="card-footer text-end">
                <a class="btn btn-outline-dark" href="<?php echo $pub_url;?>" role="button">Retour</a>
                <button type="submit" class="btn btn-success" role="button">Sign in</button>
            </div>
        
        </div>
        <!-- /card -->
    
    </form>

</div>
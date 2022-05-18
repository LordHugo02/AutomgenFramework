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
    
    <form class="mt-4" method="post" action="<?php echo $pub_url . 'user/edit_profil';?>">
        
        <input type="hidden" name="valid" value="1">
        
        <div class="card">
            
            <div class="card-header">
                <h1 class="text-center">Modification de profil</h1>
            </div>
            
            <div class="card-body p-x-2 p-md-4">
                
                <div class="row mt-3">
                    <div class="col-12 col-sm-6 col-md-6">
                        <label for="prenom" class="<?php if(in_array('prenom', $fieldsNotValid)) echo 'text-danger';?>">Prénom</label>
                        <input type="text" class="form-control <?php if(in_array('prenom', $fieldsNotValid)) echo 'border-danger';?>" id="prenom" name="prenom" value="<?php if($prenom) echo $prenom;?>">
                    </div>
                    
                    <div class="col-12 col-sm-6 col-md-6">
                        <label for="nom" class="<?php if(in_array('nom', $fieldsNotValid)) echo 'text-danger';?>">Nom</label>
                        <input type="text" class="form-control <?php if(in_array('nom', $fieldsNotValid)) echo 'border-danger';?>" id="nom" name="nom" value="<?php if($nom) echo $nom;?>">
                    </div>
                    
                </div>
                <!-- /row -->
                
                <div class="row mt-3">
                    <div class="col-12 col-sm-6 col-md-6">
                        <label for="date_naissance" class="<?php if(in_array('date_naissance', $fieldsNotValid)) echo 'text-danger';?>">Date de naissance</label>
                        <input type="date" class="form-control <?php if(in_array('date_naissance', $fieldsNotValid)) echo 'border-danger';?>" id="date_naissance" name="date_naissance" max="<?php echo date_format(date_sub(new DateTime(), new DateInterval('P10Y')), 'Y-m-d');?>" value="<?php if($date_naissance) echo $date_naissance;?>">
                    </div>
                    
                    <div class="col-12 col-sm-6 col-md-6">
                        <label for="pseudo" class="<?php if(in_array('pseudo', $fieldsNotValid)) echo 'text-danger';?>">Pseudo</label>
                        <input type="text" class="form-control <?php if(in_array('pseudo', $fieldsNotValid)) echo 'border-danger';?>" id="pseudo" name="pseudo" value="<?php if($pseudo) echo $pseudo;?>">
                    </div>
                </div>
                <!-- row -->
            
            </div>
            <!-- /card-body -->
            
            <div class="card-footer text-end">
                <a class="btn btn-outline-dark" href="<?php echo $pub_url;?>" role="button">Retour</a>
                <button type="submit" class="btn btn-success" role="button">Sauvegarder</button>
            </div>
        
        </div>
        <!-- /card -->
    
    </form>

</div>
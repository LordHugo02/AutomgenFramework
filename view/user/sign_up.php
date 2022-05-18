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

    <form class="mt-4" method="post" action="<?php echo $pub_url . 'user/sign_up';?>">

        <input type="hidden" name="valid" value="1">

        <div class="card">

            <div class="card-header">
                <h1 class="text-center">Inscription</h1>
            </div>

            <div class="card-body p-x-2 p-md-4">

                <div class="row">
                    <div class="col-12">
                        <label for="email" class="<?php if(in_array('email', $fieldsNotValid)) echo 'text-danger';?>">Adresse mail*</label>
                        <input type="email" class="form-control <?php if(in_array('email', $fieldsNotValid)) echo 'border-danger';?>" id="email" name="email" value="<?php if($email) echo $email;?>" required>
                    </div>
                </div>
                <!-- /row -->

                <div class="row mt-3">
                    <div class="col-12 col-sm-6">
                        <label for="password" class="<?php if(in_array('password', $fieldsNotValid)) echo 'text-danger';?>">Mot de passe*</label>
                        <input type="password" class="form-control <?php if(in_array('password', $fieldsNotValid)) echo 'border-danger';?>" id="password" name="password" minlength="8" pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\[\]\^\<\>\(\)\{\}\#\_\-])[A-Za-z\d@$!%*?&\[\]\^\<\>\(\)\{\}\#\_\-]{8,}/" title="Il faut un mot de passe d'au moins 8 caractères avec minuscule, majuscule et chiffre" autocomplete="off" required>
                    </div>

                    <div class="col-12 col-sm-6">
                        <label for="password_confirm" class="<?php if(in_array('password_confirm', $fieldsNotValid)) echo 'text-danger';?>">Confirmation mot de passe*</label>
                        <input type="password" class="form-control <?php if(in_array('password_confirm', $fieldsNotValid)) echo 'border-danger';?>" id="password_confirm" name="password_confirm" minlength="8" pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\[\]\^\<\>\(\)\{\}\#\_\-])[A-Za-z\d@$!%*?&\[\]\^\<\>\(\)\{\}\#\_\-]{8,}/" title="Il faut un mot de passe d'au moins 8 caractères avec minuscule, majuscule et chiffre" autocomplete="off" required>
                    </div>
                </div>
                <!-- /row -->

                <div class="row mt-3">
                    <div class="col-12 col-sm-6 col-md-4">
                        <label for="prenom" class="<?php if(in_array('prenom', $fieldsNotValid)) echo 'text-danger';?>">Prénom</label>
                        <input type="text" class="form-control <?php if(in_array('prenom', $fieldsNotValid)) echo 'border-danger';?>" id="prenom" name="prenom" value="<?php if($prenom) echo $prenom;?>">
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <label for="nom" class="<?php if(in_array('nom', $fieldsNotValid)) echo 'text-danger';?>">Nom</label>
                        <input type="text" class="form-control <?php if(in_array('nom', $fieldsNotValid)) echo 'border-danger';?>" id="nom" name="nom" value="<?php if($nom) echo $nom;?>">
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <label for="date_naissance" class="<?php if(in_array('date_naissance', $fieldsNotValid)) echo 'text-danger';?>">Date de naissance*</label>
                        <input type="date" class="form-control <?php if(in_array('date_naissance', $fieldsNotValid)) echo 'border-danger';?>" id="date_naissance" name="date_naissance" max="<?php echo date_format(date_sub(new DateTime(), new DateInterval('P10Y')), 'Y-m-d');?>" value="<?php if($date_naissance) echo $date_naissance;?>"required>
                    </div>
                </div>
                <!-- /row -->

                <div class="row mt-3">
                    <div class="col-12">
                        <label for="pseudo" class="<?php if(in_array('pseudo', $fieldsNotValid)) echo 'text-danger';?>">Pseudo*</label>
                        <input type="text" class="form-control <?php if(in_array('pseudo', $fieldsNotValid)) echo 'border-danger';?>" id="pseudo" name="pseudo" value="<?php if($pseudo) echo $pseudo;?>" required>
                    </div>
                </div>
                <!-- /row -->

                <hr class="my-4">

                <div class="row">
                    <div class="col-12">
                        <p class="border rounded-3 mb-2 py-1 px-2">Je suis les conditions générales</p>
                        <div class="form-check mt-4">
                            <label class="form-check-label" for="conditions">J'accepte les règles et conditions</label>
                            <input type="checkbox" class="form-check-input" id="conditions" name="conditions" required>
                        </div>
                    </div>
                </div>
                <!-- /row -->

            </div>
            <!-- /card-body -->

            <div class="card-footer text-end">
                <a class="btn btn-outline-dark" href="<?php echo $pub_url;?>" role="button">Retour</a>
                <button type="submit" class="btn btn-success" role="button">Sign up</button>
            </div>

        </div>
        <!-- /card -->

    </form>

</div>
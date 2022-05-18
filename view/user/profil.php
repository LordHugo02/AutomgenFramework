<div class="container justify-content-center">
    
    <!-- affichage de l'identité que si l'utilisateur à mis soit son nom ou son prenom -->
    <?php if ($user->nom() != null) { ?>
        <div class="row text-center">
            <p>Nom : <?= $user->nom() ?></p>
        </div>
        <!-- row -->
    <?php } ?>
    
    <?php if ($user->prenom() != null) { ?>
        <div class="row text-center">
            <p>Prenom : <?= $user->prenom() ?></p>
        </div>
        <!-- row -->
    <?php } ?>
    
    <div class="row text-center">
        <p>Pseudo : <?= $user->pseudo() ?></p>
    </div>
    <!-- row -->
    
    <div class="row text-center">
        <p>email : <?= $user->email() ?></p>
    </div>
    <!-- row -->
    
    <div class="row text-center">
        <p>Date de naissance : <?= $user->date_naissance() ?></p>
    </div>
    <!-- row -->
    
    <div class="d-flex justify-content-center">
         <a class="btn btn-primary" role="button" href="<?php echo $pub_url . 'user/edit_profil';?>">Modifier Profil</a>
    </div>
    <!-- row -->
</div>
<!-- container -->
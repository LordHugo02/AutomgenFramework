<div class="container-fluid text-center">
    
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>QuickyProg</h1>
        </div>
    </div>
    <!-- /row -->
    
    <div class="row justify-content-center">
        <div class="col-8 col-sm-6 col-lg-4">
            <hr>
        </div>
    </div>
    <!-- /row -->
    
    <?php if($connected) { ?>
    <div class="row justify-content-center">
        <div class="col-10 col-sm-8 col-lg-6">
            <?php
                if($user->nom() !== null && $user->prenom() !== null) {
                    echo '<p>Bienvenue ' . $user->nom() . ' ' . $user->prenom() . ' né le ' . $user->date_naissance() . '</p>';
                } else {
                    echo '<p>Bienvenue ' . $user->pseudo() . ' né le ' . $user->date_naissance() . '</p>';
                }
            ?>
        </div>
    </div>
    <!-- /row -->
    <?php } ?>
    
    <div class="row justify-content-center">
        <div class="col-10 col-sm-8 col-lg-6">
            <p>Avec QuickyProg, découvrez, apprenez ou seulement professionnalisez vous dans le monde de la programmation ! Alors ? Qu'attendez-vous ?</p>
        </div>
    </div>
    <!-- /row -->
    
    <div class="row justify-content-center">
        <div class="col-12 d-flex flex-row justify-content-center">
            <i class="fa-1x fas fa-link m-2 hovered-icons"></i>
            <i class="fa-1x fas fa-user-friends m-2 hovered-icons"></i>
            <i class="fa-1x fas fa-paperclip m-2 hovered-icons"></i>
        </div>
    </div>
    <!-- /row -->
    
    <div class="row justify-content-center mt-3">
        <div class="col-12">
            <button type="button" class="btn btn-primary">Découvrir</button>
        </div>
    </div>
    
</div>
<!-- /container-fluid -->

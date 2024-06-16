<div class="container bg-dark bg-gradient border rounded-4 shadow text-center w-md-75 w-lg-50 p-2 p-md-5" style="margin-top:100px;margin-bottom:43px">
    <h3 class="text-primary text-center fw-bold">Résultat :</h3>
    <small class="text-light mb-3">Votre recherche actuelle : <strong><?= strtoupper($_GET['value']) ?></strong></small>
    <?php if (isset($_GET['value']) && !empty($_GET['value'])) { ?>
        <?php if (isset($return) && is_object($return[0])) {
            if (count($return) > 1) {
                for ($i = 0; $i < count($return); $i++) { ?>
                    <hr class="text-light">
                    <h3 class="text-primary"><?= ucfirst($return[$i]->getLastName()) ?></h3>
                    <h4 class="text-light fw-bold phone-number"><?= $return[0]->getPhoneNumber() ?></h4>
                <?php }
            } else { ?>
                <hr class="text-light">
                <h3 class="text-primary"><?= ucfirst($return[0]->getLastName()) ?></h3>
                <h4 class="text-light fw-bold phone-number"><?= $return[0]->getPhoneNumber() ?></h4>
            <?php }
        }
    } else { ?>
        <span class="text-light">Votre recherche n'a rien donnée. Vous recherchez ?</span>
    <?php } ?>
</div>
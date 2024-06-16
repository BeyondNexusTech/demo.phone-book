<div class="container bg-dark bg-gradient border rounded-4 shadow text-center w-md-75 w-lg-50 p-2 p-md-5" style="margin-top:100px;margin-bottom:43px">
    <h3 class="text-primary text-center fw-bold">Modifier</h3>
    <small class="text-light mb-3">Vous souhaitez modifier un nom ou un numéro ?</small>
    <form method="post" id="formEdit" class="w-75 mx-auto my-auto h-100 needs-validation" novalidate>
        <div class="form-floating my-3">
            <input type="text" class="form-control" id="inputLastName" name="last_name" value="<?= $phone->getLastName() ?>" placeholder="Blache" required />
            <label for="inputLastName" class="text-primary">Nom de famille / Société</label>
            <div class="invalid-feedback mb-0">
                Veuillez entrer un nom de famille ou de société.
            </div>
        </div>
        <div class="form-floating my-3">
            <input type="text" class="form-control" id="inputPhoneNumber" name="phone_number" value="<?= $phone->getPhoneNumber() ?>" placeholder="0652601358" required />
            <label for="inputPhoneNumber" class="text-primary">Numéro de téléphone</label>
            <div class="invalid-feedback mb-0">
                Veuillez entrer un numéro de téléphone.
            </div>
        </div>
        <input type="hidden" id="inputId" value="<?= $phone->getId() ?>" required>
        <button type="submit" class="btn btn-sm btn-primary text-light mx-auto mb-3 mb-sm-0 ms-md-3">
            <i class="fas fa-edit"></i> Modifier
        </button>
    </form>
</div>
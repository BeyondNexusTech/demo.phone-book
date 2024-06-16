<div class="container bg-dark bg-gradient border rounded-4 shadow text-center w-md-75 w-lg-50 p-2 p-md-5" style="margin-top:100px;margin-bottom:43px">
    <h3 class="text-primary text-center fw-bold">Bienvenue</h3>
    <small class="text-light mb-3">Vous recherchez un nom ou un numéro ?</small>
    <form method="post" id="formHome" class="w-75 mx-auto my-auto h-100 needs-validation" novalidate>
        <div class="form-floating my-3">
            <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Blache">
            <label for="inputLastName" class="text-primary">Nom de famille / société</label>
            <div class="invalid-feedback mb-0">
                Veuillez entrer un nom de famille ou de société.
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputPhoneNumber" name="phone_number" placeholder="06 52 60 13 58">
            <label for="inputPhoneNumber" class="text-primary">Numéro de téléphone</label>
            <div class="invalid-feedback mb-0">
                Veuillez entrer un numéro de téléphone.
            </div>
        </div>
        <button type="reset" id="cancelBtn" class="btn btn-sm btn-danger text-light mx-auto mb-3 mb-sm-0 ms-md-3">
            <i class="far fa-circle-xmark"></i> Réinitialiser
        </button>
    </form>
</div>
<div class="container bg-dark bg-gradient border rounded-4 shadow text-center d-none w-md-75 w-lg-50 my-5 p-2 p-md-5 result">

</div>
<div class="container bg-dark bg-gradient border rounded-4 shadow text-center w-md-75 w-lg-50 my-5 p-2 p-md-5">
    <h3 class="text-primary fw-bold">Tous les résultats disponibles</h3>
    <table class="table bg-transparent text-light text-start" id="phoneTable" data-bs-theme="dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom de famille / société</th>
                <th scope="col">Numéro de téléphone</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
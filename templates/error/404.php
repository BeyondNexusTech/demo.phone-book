<div class="d-flex flex-column justify-content-center text-center" id="error_content" style="height:calc(100vh - 92px);margin-top:60px;">
    <img src="/images/logos/errors/404.webp" alt="404" class="img-fluid mx-auto" width="400" height="400" style="width:200px;height:200px">
    <h2 class="fs-1"><strong class="text-danger">404.</strong> Oups !</h2>
    <small>La page demandée s'est perdu avec tous ces papiers ...</small>
    <hr class="text-danger w-25 mx-auto">
    <a href="<?= !isset($_SESSION['user']['id']) ? '/' : '/home' ?>" class="btn btn-danger shadow-sm mb-4 mx-auto" style="width:max-content;font-size:12px">Revenir sur le porte-document</a>
</div>
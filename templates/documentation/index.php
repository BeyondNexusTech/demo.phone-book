<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient border-end border-secondary position-fixed" id="navDoc">
    <div class="container-fluid">
        <a class="navbar-brand d-lg-none ms-3" href="/documentation">Documentation</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDoc" aria-controls="navbarDoc" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars fa-xl"></i>
        </button>
        <div class="collapse navbar-collapse mt-2" id="navbarDoc">
            <nav id="navbar-doc" class="navbar navbar-expand-md flex-md-column justify-content-center align-items-md-stretch px-4 py-3">
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link" href="#item-1">Utilisation</a>
                    <nav class="nav nav-pills flex-column">
                        <a class="nav-link link-light ms-3 my-1" href="#item-1-1">Accueil</a>
                        <a class="nav-link link-light ms-3 my-1" href="#item-1-2">JQuery</a>
                        <a class="nav-link link-light ms-3 my-1" href="#item-1-3">Init.php</a>
                    </nav>
                    <a class="nav-link" href="#item-2">Fonctions</a>
                    <nav class="nav nav-pills flex-column">
                        <a class="nav-link link-light ms-3 my-1" href="#item-2-1">Post_Complete()</a>
                        <a class="nav-link link-light ms-3 my-1" href="#item-2-2">Error_Return()</a>
                        <a class="nav-link link-light ms-3 my-1" href="#item-2-3">Success_Return()</a>
                        <a class="nav-link link-light ms-3 my-1" href="#item-2-4">create()</a>
                        <a class="nav-link link-light ms-3 my-1" href="#item-2-5">getData()</a>
                    </nav>
                </nav>
            </nav>
        </div>
    </div>
</nav>
<div class="container-fluid bg-dark bg-gradient text-light px-0" id="docContent">
    <div data-bs-spy="scroll" data-bs-target="#navbar-doc" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
        <div id="item-1" class="text-center py-3 py-md-5">
            <h3 class="text-primary fw-bold mb-3">Documentation sur la Recherche et l'Affichage Dynamique des Numéros</h3>
            <small class="text-light">Ce petit logiciel SAAS est créé suite à la demande d'une société.</small>
        </div>
        <div id="item-1-1" class="bg-transparent">
            <div class="row mx-auto border-top border-secondary">
                <div class="col-12 border-bottom border-secondary p-4">
                    <h4 class="text-center text-primary fw-bold mt-3">Introduction</h4>
                    <p>
                        Ce petit logiciel SAAS est créé suite à la demande d'une société.
                        Il permet de rechercher des numéros de téléphone et des noms de famille en temps réel à travers une interface web.
                        En utilisant jQuery, chaque entrée dans les champs de recherche déclenche une requête API pour vérifier l'existence des données dans la base de données.
                        Les résultats sont affichés dynamiquement sans recharger la page, améliorant ainsi l'expérience utilisateur.
                    </p>
                </div>
                <div class="col-12 p-4">
                    <h6 class="text-primary fw-bold my-3">Affichage de la Page d'Accueil</h6>
                    <p>
                        Sur la page d'accueil, l'intégralité des numéros enregistrés dans la base de données est listée.
                        Vous pouvez retrouver ces numéros en remplissant l'un des deux champs de recherche :
                        le champ pour le nom de famille / société ou celui pour le numéro de téléphone.
                    </p>
                    <h6 class="text-primary fw-bold mt-4 mb-3">Formulaire de Recherche dans le Menu de Navigation</h6>
                    <p>
                        Le formulaire de recherche intégré dans le menu de navigation vous permet également de rechercher des numéros de téléphone, des noms de famille ou de société.
                        Cette recherche est effectuée à l'aide de la variable globale <code>$_GET</code>.
                    </p>
                    <h6 class="text-primary fw-bold mt-4 mb-3">Utilisation du Formulaire de la Page d'Accueil</h6>
                    <p class="mb-0">
                        Le formulaire de recherche présent sur la page d'accueil offre une méthode pratique pour retrouver les numéros de téléphone ou les noms de famille / société en remplissant simplement l'un des champs disponibles.
                    </p>
                    <h5 class="border-bottom py-3">HTML</h5>
                    <strong>Création du formulaire de la page d'accueil</strong>
                    <pre style="max-width:100%">
                        <code class="language-html">&lt;form method="post" id="formHome" class="w-75 mx-auto my-auto h-100 needs-validation" novalidate&gt;
    &lt;div class="form-floating my-3"&gt;
        &lt;input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Blache"&gt;
        &lt;label for="inputLastName" class="text-primary"&gt;Nom de famille&lt;/label&gt;
        &lt;div class="invalid-feedback mb-0"&gt;
            Veuillez entrer un nom de famille ou de société.
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="form-floating mb-3"&gt;
        &lt;input type="text" class="form-control" id="inputPhoneNumber" name="phone_number" placeholder="0652601358"&gt;
        &lt;label for="inputPhoneNumber" class="text-primary"&gt;Numéro de téléphone / Société&lt;/label&gt;
        &lt;div class="invalid-feedback mb-0"&gt;
            Veuillez entrer un numéro de téléphone.
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;button type="reset" id="cancelBtn" class="btn btn-sm btn-danger text-light mx-auto mb-3 mb-sm-0 ms-md-3"&gt;
        &lt;i class="far fa-circle-xmark"&gt;&lt;/i&gt; Réinitialiser
    &lt;/button&gt;
&lt;/form&gt;</code></pre>
                </div>
            </div>
        </div>
        <div id="item-1-2" class="bg-transparent">
            <div class="row mx-auto border-top border-secondary">
                <div class="col-12 p-4">
                    <h5 class="text-primary fw-bold mb-3">Fonctionnement</h5>
                    <p>
                        Le script JavaScript importe plusieurs classes et configure la recherche dynamique en attachant des écouteurs d'événements aux champs de saisie.
                        Lorsqu'une entrée est détectée, une requête API est envoyée pour récupérer les résultats correspondants de la base de données.
                        Si une requête précédente est en cours, elle est annulée pour éviter les conflits.
                    </p>
                    <h5 class="border-bottom py-3">JQuery</h5>
                    <strong>Import des Classes</strong>
                    <pre style="max-width:100%;">
                        <code class="language-javascript">import { ToastGenerator } from "../../class/ToastGenerator.js";
import { CalloutGenerator } from "../../class/CalloutGenerator.js";
import { DataTableManager } from "../../class/DataTableManager.js";
import { DataFormatter } from "../../class/DataFormatter.js";
import { ApiService } from "../../class/ApiService.js";</code>
                    </pre>
                    <strong>Initialisation de la page</strong>
                    <pre style="max-width:100%">
                        <code class="language-javascript">export function homeIndexPage() {
    const formHome = document.querySelector('#formHome');

    formHome.addEventListener('submit', function (event) { event.preventDefault(); });
    inputName.addEventListener('input', handleSearch);
    inputPhone.addEventListener('input', handleSearch);

    /**
     * Handles the search input with debouncing, sending an API request to fetch results.
     *
     * This function is intended to be used as an input event handler for search fields.
     * It debounces the user input to avoid sending too many requests and uses the apiRequest
     * function to fetch results from the server. If a previous request is still pending,
     * it will be aborted before sending a new one.
     */
    let debounceTimeout;
    let activeRequest = null;

    function handleSearch() {
        const query = this.value.trim();
        const resultBox = document.querySelector('.result');

        // Clear the previous debounce timeout to prevent multiple rapid executions
        clearTimeout(debounceTimeout);

        // Set a new debounce timeout to delay the function execution
        debounceTimeout = setTimeout(async () => {
            const calloutGenerator = new CalloutGenerator();
            const apiService = new ApiService();

            // Proceed only if the query is not empty
            if (query.length > 0) {
                // If there's an active request, abort it to avoid conflicts
                if (activeRequest) {
                    activeRequest.abort();
                }

                // Define the API endpoint and collect form data
                const last_name = document.querySelector('#inputLastName');
                const phone_number = document.querySelector('#inputPhoneNumber');
                const data = {
                    search: true,
                    last_name: last_name.value,
                    phone_number: phone_number.value
                };

                // Remove error classes if present
                if (last_name.classList.contains('is-invalid') && phone_number.classList.contains('is-invalid')) {
                    last_name.classList.remove('is-invalid');
                    phone_number.classList.remove('is-invalid');
                }

                // Attach an event listener to the cancel button to clear results when clicked
                const btnCancel = document.querySelector('#cancelBtn');
                btnCancel?.addEventListener('click', function () {
                    resultBox.classList.add('d-none');
                    resultBox.innerHTML = '';
                });

                // Create a new AbortController to handle request cancellation
                const controller = new AbortController();
                const { signal } = controller;
                activeRequest = controller;

                try {
                    // Make the API request with the collected data and signal for aborting
                    const result = await apiService.post('process.php', data, { signal });

                    // Show the result box
                    resultBox.classList.remove('d-none');

                    // Prepare the HTML content for the results
                    let htmlContent = '';
                    if (Array.isArray(result) && result.length > 0) {
                        // Multiple results
                        result.forEach(item => {
                            htmlContent += `
                            &lt;h3 class="text-primary"&gt;${item.last_name.charAt(0).toUpperCase()}${item.last_name.slice(1).toLowerCase()}&lt;/h3&gt;
                            &lt;br/&gt;
                            &lt;h4 class="text-light"&gt;${dataFormatter.format('phone', item.phone_number)}&lt;/h4&gt;`;
                            htmlContent += result.length &gt; 1 ? '&lt;hr class="text-light"&gt;' : '';
                        });
                    } else {
                        // No results found
                        htmlContent += '&lt;h3 class="text-primary fw-bold"&gt;Aucun résultat n\'a pu être trouvé avec ces informations.&lt;/h3&gt;';
                    }
                    resultBox.innerHTML = htmlContent;
                } catch (error) {
                    calloutGenerator.createCallout(`Il y a eu un problème avec la requête : ${error}`);
                } finally {
                    // Reset the active request state
                    activeRequest = null;
                }
            } else {
                // Clear the result box if the query is empty
                resultBox.classList.add('d-none');
                resultBox.innerHTML = '';
            }
        }, 300); // Delay in milliseconds
    }
}</code></pre>
                    <strong>Information Reçues</strong>
                    <p>
                        Lorsqu'un de deux champs est complété, les informations suivantes sont reçues :
                    </p>
                    <ul class="list-group list-group-flush ps-3">
                        <li class="list-item bg-transparent border-0">
                            Nom de famille / Société : <code>$_POST['last_name']</code>
                        </li>
                        <li class="list-item bg-transparent border-0">
                            Numéro de téléphone : <code>$_POST['phone_number']</code>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="item-1-3" class="bg-transparent">
            <div class="row mx-auto border-top border-secondary">
                <div class="col-12 p-4">
                    <h5 class="text-primary fw-bold mb-3">Envoi du POST au fichier <code>process.php</code></h5>
                    <p>
                        Le code JavaScript ci-dessus envoie une requête POST au fichier process.php pour vérifier l'existence des données dans la base de données.
                        Les résultats sont affichés dynamiquement sur la page.
                    </p>
                    <h5 class="text-primary fw-bold mb-3">Traitement de l'Information par le Fichier process.php</h5>
                    <p>
                        Le fichier process.php reçoit les données, les traite et renvoie les résultats en JSON.
                    </p>
                    <h5 class="border-bottom py-3">PHP</h5>
                    <strong>Récupération et Traitement des Données</strong>
                    <pre style="max-width:100%">
                        <code class="language-php">if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phoneBookService = new PhoneBookService();
    try {
        if (isset($_SERVER['CONTENT_TYPE']) && str_contains($_SERVER['CONTENT_TYPE'], 'json')) {
            $rawData = file_get_contents("php://input");
            $datas = json_decode($rawData, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($datas['search'])) {
                    if ($datas['search']) {
                        if (empty($datas['last_name']) && empty($datas['phone_number'])) {
                            throw new Exception('Veuillez saisir une information pour la recherche.');
                        }

                        $function = 'getBySearchTerms';
                        if (!method_exists($phoneBookService, $function)) {
                            throw new Exception("La fonction $function n'existe pas.");
                        }

                        unset($datas['search']);
                        $results = $phoneBookService->getBySearchTerms($datas);
                        echo json_encode($results, JSON_UNESCAPED_UNICODE);
                    } else {
                        json_encode(['success' => false, 'message' => 'La requête de recherche n\'est pas complète.']);
                    }
                }

            } else {
                echo json_encode(['success' => false, 'message' => 'Les données ne sont pas dans un format JSON valide.']);
            }

        } else {
            echo json_encode(['success' => false, 'message' => 'Les données envoyées ne correspondent pas aux formats attendues.']);
        }

    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }

} else {
    echo json_encode(['success' => false, 'message' => 'La requête demandé n\'a pas pû aboutir.']);
}</code></pre>
                </div>
            </div>
        </div>
        <div id="item-2" class="text-center border-top border-bottom border-secondary py-3 py-md-5">
            <h3 class="text-primary fw-bold mb-3">Fonctions PHP Personnalisé</h3>
            <small class="text-light">Vous découvrirez ici tous les traitements d'informations et les fonctions le permettant.</small>
        </div>
        <div id="item-2-1" class="bg-transparent">
            <div class="row mx-auto">
                <div class="col-12 p-4">
                    <h5 class="text-primary fs-4 mb-4">Fonction <code>dd()</code></h5>
                    <strong>Description</strong>
                    <p class="mb-4">
                        La fonction <code>dd</code> est une méthode statique permettant de faire un débogage rapide en affichant de manière formatée une valeur passée en paramètre, puis en terminant le script.
                        Elle est souvent utilisée pour inspecter des variables pendant le développement.
                    </p>
                    <strong>Paramètres</strong>
                    <ul class="list-group list-group-flush mb-4 ps-3">
                        <li class="list-item bg-transparent border-0">
                            <code>$value (mixed)</code> : La valeur à afficher. Peut être de n'importe quel type (tableau, objet, chaîne de caractères, entier, etc.).
                        </li>
                    </ul>
                    <strong>Utilisation</strong>
                    <p>
                        Pour utiliser cette fonction, appelez-la avec la valeur que vous souhaitez afficher :
                    </p>
                    <pre style="max-width:100%">
                        <code class="language-php">/**
 * Displays the contents of a variable and stops script execution.
 *
 * This method outputs a formatted view of the given variable and terminates
 * the script. It is useful for debugging purposes.
 *
 * @param       mixed $value The variable to display.
 * @return      void
 * @throws      void This method does not throw any exceptions.
 * @deprecated  This method is not deprecated.
 * @example     BaseService::dd($array);
 */
#[NoReturn] public static function dd(mixed $value): void
{
    echo '&lt;pre&gt;';
    print_r(htmlspecialchars(print_r($value, true)));
    echo '&lt;/pre&gt;';
    die();
}</code></pre>
                </div>
                <div class="col-12 p-4">
                    <h5 class="text-primary fs-4 mb-4">Fonction <code>dumb()</code></h5>
                    <strong>Description</strong>
                    <p class="mb-4">
                        La fonction <code>dumb</code> est une méthode statique qui permet d'afficher une valeur passée en paramètre de manière formatée en utilisant <code>var_dump</code> et <code>print_r</code>.
                        Cette méthode est principalement utilisée pour le débogage, permettant de voir les informations détaillées d'une variable.
                    </p>
                    <strong>Paramètres</strong>
                    <ul class="list-group list-group-flush mb-4 ps-3">
                        <li class="list-item bg-transparent border-0">
                            <code>$value (mixed)</code> : La valeur à afficher. Peut être de n'importe quel type (tableau, objet, chaîne de caractères, entier, etc.).
                        </li>
                        <li class="list-item bg-transparent border-0">
                            <code>$die (bool)</code> : Un paramètre optionnel qui, s'il est défini sur <code>true</code>, arrête l'exécution du script après l'affichage.
                            Par défaut, il est défini en <code>false</code>.
                        </li>
                    </ul>
                    <strong>Utilisation</strong>
                    <p>
                        Pour utiliser cette fonction, appelez-la avec la valeur que vous souhaitez afficher :
                    </p>
                    <pre style="max-width:100%">
                        <code class="language-php">/**
 * Displays the contents of a variable and optionally stops script execution.
 *
 * This method outputs a detailed view of the given variable using var_dump.
 * Optionally, it can terminate the script after displaying the variable.
 *
 * @param       mixed $value The variable to display.
 * @param       bool $die If true, stops the script after displaying the variable's content. Default is false.
 * @return      void
 * @throws      void This method does not throw any exceptions.
 * @deprecated  This method is not deprecated.
 * @example     BaseService::dumb($array, true);
 */
#[NoReturn] public static function dumb(mixed $value, bool $die = false): void
{
    echo '&lt;pre&gt;';
    var_dump($value);
    echo '&lt;/pre&gt;';
    if ($die) die();
}</code></pre>
                </div>
            </div>
        </div>
        <div id="item-2-2" class="bg-transparent">
            <div class="row mx-auto">
                <div class="col-12 col-lg-4">
                    <h5 class="text-primary fs-4 my-4">Fonction <code>error_return()</code></h5>
                    <p class="w-75">Cette fonction permet à <code>Bootstrap</code> d'afficher l'erreur suite à un retour de fonctions par le biais d'un string que nous pouvons personnaliser. Seulement disponible sans redirection de page.</p>
                </div>
                <div class="col-12 col-lg-8 border-start text-dark">
                    <h5 class="border-bottom py-3">Error_Return()</h5>
                    <small>Fonction permettant le retour d'un texte d'erreur avec la date est l'heure.</small>
                    <pre style="max-width:100%">
                        <code class="language-php">/**
 * Return for error
 * @param   string $error Explanation of the return of the error
 * @return  string
 * @throws  Exception
 * @author  Blache Nolwenn (contact[at]blache-nolwenn.fr)
 * @date    2022-08-26
 */
function error_return(string $error): string
{
    $tmp_time = new DateTime('now', new DateTimeZone('Europe/Paris'));
    echo '
        &lt;div class="toast toast-sm toast-error" style="width: 400px; z-index: 1100;" role="alert" aria-live="assertive" aria-atomic="true"&gt;
            &lt;div class="toast-header bg-danger"&gt;
                &lt;strong class="me-auto text-dark"&gt;Erreur&lt;/strong&gt;
                &lt;small class="text-light pe-2"&gt;' . $tmp_time-&gt;format("H:i:s") . '&lt;/small&gt;
                &lt;button type="button" class="btn btn-close ms-1 me-0" data-bs-dismiss="toast"&gt;&lt;/button&gt;
            &lt;/div&gt;
            &lt;div class="toast-body bg-white-french text-danger ttext-md-start rounded-bottom"&gt;'
                . $error .
            '&lt;/div&gt;
        &lt;/div&gt;
    ';
    return $error;
}</code>
                    </pre>
                </div>
            </div>
        </div>
        <div id="item-2-3" class="bg-transparent">
            <div class="row mx-auto">
                <div class="col-12 col-lg-4">
                    <h5 class="text-primary fs-4 my-4">Fonction <code>success_return()</code></h5>
                    <p class="w-75">Cette fonction permet à <code>Bootstrap</code> d'afficher le succès suite à un retour de fonctions par le biais d'un string que nous pouvons personnaliser. Seulement disponible sans redirection de page.</p>
                </div>
                <div class="col-12 col-lg-8 border-start text-dark">
                    <h5 class="border-bottom py-3">Success_Return()</h5>
                    <small>Fonction permettant le retour d'un texte de succès avec la date est l'heure.</small>
                    <pre style="max-width:100%">
                        <code class="language-php">/**
 * Return for success
 * @param   string $success Explanation of the return of the success
 * @return  string
 * @throws  Exception
 * @author  Blache Nolwenn (contact[at]blache-nolwenn.fr)
 * @date    2022-08-26
 */
function success_return(string $success): string
{
    $tmp_time = new DateTime('now', new DateTimeZone('Europe/Paris'));
    echo '
        &lt;div class="toast toast-sm toast-error" style="width: 400px; z-index: 1100" role="alert" aria-live="assertive" aria-atomic="true"&gt;
            &lt;div class="toast-header bg-success"&gt;
                &lt;strong class="me-auto text-dark"&gt;Information&lt;/strong&gt;
                &lt;small class="text-light pe-2"&gt;' . $tmp_time-&gt;format("h:i:s") . '&lt;/small&gt;
                &lt;button type="button" class="btn btn-close ms-1 me-0" data-bs-dismiss="toast"&gt;&lt;/button&gt;
            &lt;/div&gt;
            &lt;div class="toast-body bg-white-french text-success text-md-start"&gt;'
        . $success .
        '&lt;/div&gt;
        &lt;/div&gt;
    ';
    return $success;
}</code>
                    </pre>
                </div>
            </div>
        </div>
        <div id="item-2-4" class="bg-transparent">
            <div class="row mx-auto">
                <div class="col-12 col-lg-4">
                    <h5 class="text-primary fs-4 my-4">Fonction <code>create()</code></h5>
                    <p class="w-75">Cette fonction permet d'ajouter des données en base de donnée.</p>
                </div>
                <div class="col-12 col-lg-8 border-start text-dark">
                    <h5 class="border-bottom py-3">create()</h5>
                    <small>Fonction permettant l'ajout d'un objet en base de donnée.</small>
                    <pre style="max-width:100%">
                        <code class="language-php">/**
 * Add new data on Phone Book table with the array of data and return the last insert id
 * @param array $datas ['Last_Name', 'Phone_Number']
 * @return string
 */
public static function create(array $datas): string
{
    $req = Db::getDb()->prepare("
           INSERT INTO phone_book(last_name, phone_number)
            VALUES (:last_name, :phone_number)
    ");
    $req->bindValue("last_name", $datas['last_name'], PDO::FETCH_CLASS);
    $req->bindValue("phone_number", $datas['phone_number'], PDO::FETCH_CLASS);
    $req->execute();
    return Db::getDb()->lastInsertId();
}</code>
                    </pre>
                </div>
            </div>
        </div>
        <div id="item-2-5" class="bg-transparent">
            <div class="row mx-auto">
                <div class="col-12 col-lg-4">
                    <h5 class="text-primary fs-4 my-4">Fonction <code>getData()</code></h5>
                    <p class="w-75">Cette fonction permet de récupérer toutes les données en base de donnée par le biais du nom de famille ou du numéro de téléphone.</p>
                </div>
                <div class="col-12 col-lg-8 border-start text-dark">
                    <h5 class="border-bottom py-3">getData()</h5>
                    <small>Fonction permettant le retour d'un objet récupéré sur la base de donnée.</small>
                    <pre style="max-width:100%">
                        <code class="language-php">/**
 * Get the data row in table Phone Book by the phone number value
 * @param array $data
 * @return array
 */
public static function getData(array $data): array
{
    if (isset($data['last_name'])) {
        $req = Db::getDb()->prepare("SELECT * FROM phone_book WHERE last_name = ?");
        $req->execute([$data['last_name']]);
    } elseif (isset($data['phone_number'])) {
        $req = Db::getDb()->prepare("SELECT * FROM phone_book WHERE phone_number = ?");
        $req->execute([$data['phone_number']]);
    }
    return $req->fetchAll(PDO::FETCH_CLASS, Phone_Book::class);
}</code>
                    </pre>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    hljs.highlightAll();document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('pre code').forEach((el) => {
            hljs.highlightElement(el);
        });
    });
</script>
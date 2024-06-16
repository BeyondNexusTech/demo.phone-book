<?php

namespace Src\Controller;

use Src\Service\BaseService;
use Src\Service\PhoneBookService;


class HomeController
{

    /**
     * @return  void
     */
    public function index(): void
    {
        BaseService::render('home/index');
    }

    /**
     * @return  void
     */
    public function search(): void
    {
        $phoneBookService = new PhoneBookService();
        $return = null;
        $value = filter_input(INPUT_GET, 'value', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($value !== null && $value !== false && $value !== '') {
            if (preg_match('/^\+?[0-9\s\-()]+$/', $value)) {
                // Traiter comme un numéro de téléphone
                $return = $phoneBookService->getByPhone($value);
            } else {
                // Traiter comme un nom
                $return = $phoneBookService->getByName($value);
            }
        }
        BaseService::render('home/search', ['return' => $return]);
    }
}
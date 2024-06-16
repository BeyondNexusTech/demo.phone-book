<?php

namespace Src\Controller;

use Src\Service\BaseService;
use Src\Service\PhoneBookService;


class PhoneBookController extends BaseService
{
    /**
     * @return  void
     */
    public function index()
    {
        BaseService::render('phonebook/index');
    }

    /**
     * @return  void
     */
    public function add(): void
    {
        if (count($_POST) > 0) {
            $PhoneBook->create($_POST);
        }
        BaseService::render('phonebook/add');
    }

    /**
     * @return  void
     */
    public function edit(): void
    {
        $phoneBookService = new PhoneBookService();
        $idPhone = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $phone = $phoneBookService->get($idPhone);
        if (count($phone) > 0) {
            BaseService::render('phonebook/edit', ['phone' => $phone[0], 'result' => $result ?? '']);
        } else {
            BaseService::render('error/404');
        }
    }
}
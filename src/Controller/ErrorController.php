<?php

namespace Src\Controller;

use Src\Service\BaseService;


class ErrorController extends BaseService
{
    public function error($error): void
    {
        $this->render('error/' . $error);
    }
}
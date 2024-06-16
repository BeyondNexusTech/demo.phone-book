<?php

namespace Src\Controller;

use Src\Service\BaseService;


class DocumentationController extends BaseService
{
    public function index(): void
    {
        $this->render('documentation/index');
    }
}
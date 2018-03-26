<?php

namespace App\Presenters;

use Nette;
use Nette\Security\User;
use Nette\Database\Context;

class BasePresenter extends Nette\Application\UI\Presenter
{

    private $database;
    private $user;


    public function __construct(Context $database, User $user)
    {
        $this->database = $database;
        $this->user = $user;

    }

    public function beforeRender()
    {

        $this->template->currentUser = $this->user->getIdentity();

    }


}


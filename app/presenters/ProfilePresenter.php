<?php

namespace App\Presenters;

use Nette;
use Nette\Database\Context;
use Nette\Security\User;


class ProfilePresenter extends BasePresenter
{
    private $user;
    public function __construct(Context $database, User $user)
    {
        parent::__construct($database, $user);
        $this->user = $user;
    }
    public function beforeRender()
    {
        if ($this->user->isInRole("administrator"))
        {

        }
    }


}

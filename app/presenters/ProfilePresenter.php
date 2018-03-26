<?php

namespace App\Presenters;

use Nette;
use Nette\Database\Context;
use Nette\Security\User;
use App\Forms;


class ProfilePresenter extends BasePresenter
{
    private $user;
    private $database;
    private $editUserDetailsFactory;

    public function __construct(Context $database, User $user, Forms\EditUserDetailsFactory $editFactory)
    {
        parent::__construct($database, $user);
        $this->user = $user;
        $this->database = $database;
        $this->editUserDetailsFactory = $editFactory;
    }
    public function beforeRender()
    {

    }
    public function renderDefault()
    {

    }
    public function renderAdmin()
    {


            $this->template->role = $this->user->getRoles();


    }
    public function renderEdit()
    {

    }
    protected function createComponentEditUserDetailsForm(): Form
    {
        return $this->editUserDetailsFactory->create(function () {
            $this->redirect('Profile:');
        });
    }



}

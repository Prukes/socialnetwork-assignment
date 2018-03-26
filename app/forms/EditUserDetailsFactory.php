<?php
declare(strict_types=1);

namespace App\Forms;

use Nette;
use Nette\Application\UI\Form;
use Nette\Security\User;


class EditUserDetailsFactory
{
	use Nette\SmartObject;

	/** @var FormFactory */
	private $factory;

	/** @var User */
	private $user;


	public function __construct(FormFactory $factory, User $user)
	{
		$this->factory = $factory;
		$this->user = $user;
	}


	public function create(callable $onSuccess): Form
	{
		$form = $this->factory->create();
		$form->addText('username', 'Username:');
		$form->addUpload('picture', 'Obrázek:');



		$form->addSubmit('send', 'EDIT___!!!');

		$form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {
				$this->database->table("users")->insert(['profilePicture'=>$values->picture,'username'=>$values->username]);
			$onSuccess();
		};

		return $form;
	}
}
<?php

class ProfileController extends \BaseController 
{
	protected $layout 		= 'template.layout';

	public function index()
	{
		$this->layout->content = View::make('users.profile.index')->with([
			'controls' => $this->controls(),
			'user' => $this->current_user,
		]);
	}

	public function save()
	{
		$user = User::find( $id = (int) \Input::get('data.id') );
		if(! $user )
		{
			return Response::json(['success' => false, 'exception' => ['message' => 'ID-ul #' . $id . ' nu exista.']]);
		}
		return Response::json($this->{Input::get('action')}($user, Input::get('data')));
	}

	protected function controls()
	{
		return [
			'nume' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('nume')
				->caption('Nume')
				->placeholder('Numele')
				->class('form-control data-source input-sm')
				->controlsource('nume')
				->controltype('textbox')
				->maxlength(255),

			'prenume' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('prenume')
				->caption('Prenume')
				->placeholder('Prenumele')
				->class('form-control data-source input-sm')
				->controlsource('prenume')
				->controltype('textbox')
				->maxlength(255),
			
			'email' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('email')
				->caption('Email')
				->placeholder('Email')
				->class('form-control data-source input-sm')
				->controlsource('email')
				->controltype('textbox')
				->maxlength(255),

			'telefon' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('telefon')
				->caption('Telefon')
				->placeholder('Telefonul')
				->class('form-control data-source input-sm')
				->controlsource('telefon')
				->controltype('textbox')
				->maxlength(255),

			'old_password' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('old_password')
				->caption('Parola veche')
				->placeholder('Parola veche')
				->class('form-control data-source input-sm')
				->controlsource('old_password')
				->controltype('textbox')
				->maxlength(255),

			'new_password' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('new_password')
				->caption('Parola nouă')
				->placeholder('Parola nouă')
				->class('form-control data-source input-sm')
				->controlsource('new_password')
				->controltype('textbox')
				->maxlength(255),

			'new_password_confirm' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('new_password_confirm')
				->caption('Confirmarea parolei noi')
				->placeholder('Confirmare parolă')
				->class('form-control data-source input-sm')
				->controlsource('new_password_confirm')
				->controltype('textbox')
				->maxlength(255),
		];
	}

	protected function saveGeneralData($user, $data)
	{
		$validator = Validator::make(
			$data, 
			User::generalValidatorRules($user->id), 
			User::generalValidatorMessages()
		);

		if( $validator->passes() )
		{
			try
			{
				foreach($data as $field => $value)
				{
					$user->{$field} = $value;
				}
				$user->save();
				$result = ['success' => true, 'message' => 'Actualizarea s-a realizat cu succes.'];
			}
			catch(Exception $e)
			{
				$result = ['success' => false, 'runtime' => 1, 'exception' => ['message' => $e->getMessage(), 'method' => __METHOD__, 'line' => $e->getLine(), 'file' => $e->getFile()]];
			}
			return $result;
		}
		return ['success' => false, 'runtime' => 0, 'messages' => $validator->messages()];
	}

	protected function savePassword($user, $data)
	{
		$validator = Validator::make(
			$data, 
			User::passwordValidatorRules($user->id, $data['new_password']), 
			User::passwordValidatorMessages()
		);
		if( $validator->passes() )
		{
			try
			{
				$user->password = $data['new_password'];
				$user->save();
				$result = ['success' => true, 'message' => 'Actualizarea parolei s-a realizat cu succes.'];
			}
			catch(Exception $e)
			{
				$result = ['success' => false, 'runtime' => 1, 'exception' => ['message' => $e->getMessage(), 'method' => __METHOD__, 'line' => $e->getLine(), 'file' => $e->getFile()]];
			}
			return $result;
		}
		return ['success' => false, 'runtime' => 0, 'messages' => $validator->messages()];
	}

}
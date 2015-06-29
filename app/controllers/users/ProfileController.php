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

			'parola_veche' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('parola_veche')
				->caption('Parola veche')
				->placeholder('Parola veche')
				->class('form-control data-source input-sm')
				->controlsource('parola_veche')
				->controltype('textbox')
				->maxlength(255),

			'parola_noua' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('parola_noua')
				->caption('Parola nouă')
				->placeholder('Parola nouă')
				->class('form-control data-source input-sm')
				->controlsource('parola_noua')
				->controltype('textbox')
				->maxlength(255),

			'confirmare_parola' => 
				\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('confirmare_parola')
				->caption('Confirmarea parolei noi')
				->placeholder('Confirmare parolă')
				->class('form-control data-source input-sm')
				->controlsource('confirmare_parola')
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
}
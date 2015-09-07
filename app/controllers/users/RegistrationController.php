<?php
use basicAuth\Repo\UserRepositoryInterface;
use basicAuth\formValidation\RegistrationForm;

class RegistrationController extends \BaseController {

	/**
	 * @var $user
	 */
	protected $user;

	/**
	 * @var RegistrationForm
	 */
	private $registrationForm;

	function __construct(UserRepositoryInterface $user, RegistrationForm $registrationForm)
	{
		$this->user = $user;
		$this->registrationForm = $registrationForm;
	}

	public function create()
	{
		return View::make('account.register');
	}

	public function store()
	{
		$input = Input::only('email', 'password', 'password_confirmation', 'prenume', 'nume');
		try {
			$this->registrationForm->validate($input);
		} catch (Exception $e)
    	{
        	return Redirect::back()->withInput()->withErrors($e->getErrors());
    	}

		$input = Input::only('email', 'password', 'prenume', 'nume');
		// !!!!!!!! Temporar pentru logarea pe app
		 $id_organizatie = \Imobiliare\Organizatie::createRecord(['denumire' => 'Organizatia lui: ' . $input['nume']])->id;
		 $input['id_organizatie'] = $id_organizatie;
		$input = array_add($input, 'activated', true);

		$user = $this->user->create($input);

		// Find the group using the group name
    	$usersGroup = Sentry::findGroupByName('Users');

    	// Assign the group to the user
    	$user->addGroup($usersGroup);

		return Redirect::to('login')->withFlashMessage('Utilizator creat cu succes!');


	}

	public function postLogin()
	{
		dd(4);
		

		$credentials = array(
	        'email' => Input::get('email'),
	        'password' => Input::get('password')
	    );

	    try 
	    {
	        $user = Sentry::authenticate($credentials, false);

	        if ($user)
	        {

	            if(Input::get('remember')=='true')
	                Sentry::loginAndRemember($user);     
	        }
 

	    }
	    catch(\Exception $e)
	    {
	        return Redirect::route('home');// View::make('hello')->withErrors(array('login' => $e->getMessage()));;

	    }
	    try
	    {
	        Sentry::login($user, false);
	    }
	    catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
	    {
	        echo 'Login field is required.';
	    }
	    catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
	    {
	        echo 'User not activated.';
	    }
	    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
	    {
	        echo 'User not found.';
	    }


	} 

}
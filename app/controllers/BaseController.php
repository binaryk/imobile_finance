<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	

	protected $current_user = NULL;
	protected $current_org  = NULL; 
	
    public function __construct()
    { 
        $this->beforeFilter('csrf', array('on' => 'post'));
	   	$this->current_user = Sentry::getUser();
	   	$this->current_org = $this->current_user ? Imobiliare\Organizatie::find($this->current_user->id_organizatie) : NULL;
    } 

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}

<?php

namespace App\Http\Controllers;

use App\Jobs\ChangeLocale;

class HomeController extends Controller
{

	/**
	 * Display the home page.
	 *
	 * @return Response
	 */
	public function index(\App\Services\GoogleLogin $ga)
	{
            
            $isLoggedIn = $ga->isLoggedIn() ;
		return view('front.index',compact('isLoggedIn'));
	}

	/**
	 * Change language.
	 *
	 * @param  App\Jobs\ChangeLocaleCommand $changeLocaleCommand
	 * @return Response
	 */
	public function language(
		ChangeLocale $changeLocale)
	{
		$this->dispatch($changeLocale);

		return redirect()->back();
	}

}

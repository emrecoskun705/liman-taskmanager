<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class UsernameController
{
	public function get()
	{
		return respond(Command::runSudo('whoami'), 200);
	}

}

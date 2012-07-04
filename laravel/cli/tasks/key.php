<?php namespace Laravel\CLI\Tasks;

use Laravel\Str;
use Laravel\File;
use Laravel\Request;

class Key extends Task {

	/**
	 * The path to the application config.
	 *
	 * @var string
	 */
	protected $path;

	/**
	 * Create a new instance of the Key task.
	 *
	 * @return void
	 */
	public function __construct()
	{
        if ($environment = Request::env()) {
            $this->path = path('app').'config/'.$environment.'/application'.EXT;
        } else {
            $this->path = path('app').'config/application'.EXT;
        }
	}

	/**
	 * Generate a random key for the application.
	 *
	 * @param  array  $arguments
	 * @return void
	 */
	public function generate($arguments = array())
	{
		if(!file_exists($this->path)) {
			echo "The application.php file in your environment does not exist!";
			echo PHP_EOL;
			return;
		}

		// By default the Crypter class uses AES-256 encryption which uses
		// a 32 byte input vector, so that is the length of string we will
		// generate for the application token unless another length is
		// specified through the CLI.
		$key = Str::random(array_get($arguments, 0, 32));

		$config = File::get($this->path);

		$config = str_replace("'key' => '',", "'key' => '{$key}',", $config, $count);

		File::put($this->path, $config);

		if ($count > 0)
		{
			echo "Configuration updated with secure key!";
		}
		else
		{
			echo "An application key already exists!";
		}

		echo PHP_EOL;
	}

}
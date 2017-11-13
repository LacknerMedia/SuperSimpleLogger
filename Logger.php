<?php

/**
 * Class Logger
 *
 * Super Simple Logging
 */
define("FILE_PATH", "components/com_immobilien/controllers/log.txt");
class Logger
{
	private $file;
	public function __construct()
	{
		try {
			$this->file = fopen(FILE_PATH, 'ab');
		} catch (Exception $e) {
			$this->file = null;

		}
	}
	public function log($msg)
	{
		fwrite($this->file, "[".date('Y-m-d h:i:s')."] \n" . $msg);
		printf('<br> \t Wrote %d bytes to %s', $msg, realpath('components/com_immobilien/controllers/log.txt'));
	}
	public function __destruct()
	{

		fclose($this->file); 
	}
}
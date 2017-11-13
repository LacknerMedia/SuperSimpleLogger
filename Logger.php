<?php

/**
 * Class Logger
 * 
 * Super Simple Logging
 */

define("FILE_PATH", "log.txt");

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
		printf('<br> \t Wrote %d bytes to %s', $msg, realpath(FILE_PATH));
	}
	
	public function __destruct()
	{
		fclose($this->file); 
	}
}
<?php

namespace NightFoxTeam\GitUrl;

class SSH {

	/**
	 * Extracts the host from any valid ssh url
	 *
	 * @param string $url
	 *
	 * @return string|bool - returns the host of an ssh url, or false if the $url is not a valid ssh url
	 */
	public static function host(string $url) : string
	{
		$url = trim($url);
		if (!self::isSSH($url)) {
			return false;
		}

		$protocolIndex = strpos($url, '://');
		if ($protocolIndex !== false) {
			$url = substr($url, $protocolIndex + 3);
		}

		$parts = explode('/', $url);
		$host = array_shift($parts);

		// user@domain
		$splits = explode('@', $host);
		if (count($splits) === 2) {
			$host = $splits[1];
		}

		// domain.com:port
		$splits = explode(':', $host);
		if (count($splits) === 2) {
			$host = $splits[0];
		}

		return $host;
	}

	/**
	 * Determines if an input value is a ssh url or not.
	 *
	 * @param string|array $input The input url or an array of protocols.
	 *
	 * @return bool
	 */
	public static function isSSH($input) : bool
	{

		if (is_array($input)) {
			return in_array('ssh', $input) || in_array('rsync', $input);
		}

		if (!is_string($input)) {
			return false;
		}

		$schemes = Scheme::get($input);
		if (self::isSSH($schemes)) {
			return true;
		}

		$input = substr($input, (int) strpos($input, '://') + 3);

		return strpos($input, '@') < strpos($input, ':');
	}
}

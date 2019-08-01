<?php

namespace NightFoxTeam\GitUrl;

class Scheme {

    /**
     * Returns the protocol schemes of an input url.
     *
     * @param string input The input url.
     * @param bool|int first If `true`, the first protocol will be returned. If number, it will represent the zero-based index of the schemes array.
     * @return array|string The array of schemes or the specified scheme.
     */
	public static function get($input, $first = null) {
		if ($first === true) {
			$first = 0;
		}

		$index = strpos($input, '://');
		$schemes = array_filter(explode('+', substr($input, 0, $index)));

		if (is_numeric($first)) {
			return $schemes[ $first ];
		}

		return $schemes;
	}
}

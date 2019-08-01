<?php

namespace NightFoxTeam\GitUrl;

class GitUrl {

    /**
     * Find the host from a provided git url
     *
     * @param string $url - The url to get the host of
     * @return bool|null|string - Returns the host on success, null if no host is available, or false on rare occasions
     */
	public static function host($url) {
		if (SSH::isSSH($url)) {
			return SSH::host($url);
		}

		// parse_url can handle all non-ssh or relative filepath url instances.
        // Other types of urls including relative filepaths should automatically return null as their host is undefined
		return parse_url($url, PHP_URL_HOST);
	}
}

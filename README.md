# Git Url Host

This package will allow you to parse the host or ip from any git repo

## This is a work in progress. Currently it only supports getting the hostname or ip from a git url

## Installation

You can install the package via composer:

```bash
composer require --dev night-fox-team/git-url
```

## Usage

```php
use NightFoxTeam\GitUrl\GitUrl;

$url = 'https://github.com/night-fox-team/git-url.git';
GitUrl::host($url); // Output: github.com
```

## References

To see a list of all valid urls, please see this [git documentation](https://git-scm.com/docs/git-clone#_git_urls_a_id_urls_a)

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

MIT

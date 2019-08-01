<?php

namespace NightFoxTeam\GitUrl\Tests;

use PHPUnit\Framework\TestCase;
use NightFoxTeam\GitUrl\GitUrl;

class GitUrlTest extends TestCase {

    public function testCanParseHostFromValidUrls() {
        $validUrls = [
            [ 'host.xz', 'ssh://user@host.xz:8080/path/to/repo.git/' ],
            [ 'host.xz', 'ssh://user@host.xz/path/to/repo.git/' ],
            [ 'host.xz', 'git://host.xz:8080/path/to/repo.git/' ],
            [ 'host.xz', 'git://host.xz/path/to/repo.git/' ],

            [ '192.168.0.1', 'ssh://user@192.168.0.1:8080/path/to/repo.git/' ],
            [ '192.168.0.1', 'ssh://user@192.168.0.1/path/to/repo.git/' ],
            [ '192.168.0.1', 'git://192.168.0.1:8080/path/to/repo.git/' ],
            [ '192.168.0.1', 'git://192.168.0.1/path/to/repo.git/' ],

            [ 'host.xz', 'https://host.xz:8080/path/to/repo.git/' ],
            [ 'host.xz', 'https://host.xz/path/to/repo.git/' ],
            [ 'host.xz', 'http://host.xz:8080/path/to/repo.git/' ],
            [ 'host.xz', 'http://host.xz/path/to/repo.git/' ],

            [ 'host.xz', 'ftps://host.xz:8080/path/to/repo.git/' ],
            [ 'host.xz', 'ftps://host.xz/path/to/repo.git/' ],
            [ 'host.xz', 'ftp://host.xz/path/to/repo.git/' ],
            [ 'host.xz', 'ftp://host.xz:8080/path/to/repo.git/' ],

            [ 'host.xz', 'user@host.xz:path/to/repo.git/' ],
            [ 'host.xz', 'host.xz:path/to/repo.git/' ],

            [ 'host.xz', 'ssh://host.xz/path/to/repo.git/' ],
            [ 'host.xz', 'ssh://user@host.xz/path/to/repo.git/' ],
            [ 'host.xz', 'ssh://user@host.xz:8080/path/to/repo.git/' ],
            [ 'host.xz', 'ssh://user@host.xz:8080/~user/path/to/repo.git/' ],

            [ 'host.xz', 'git://host.xz/path/to/repo.git/' ],
            [ 'host.xz', 'git://host.xz/~user/path/to/repo.git/' ],
            [ 'host.xz', 'git://host.xz:8080/path/to/repo.git/' ],
            [ 'host.xz', 'git://host.xz:8080/~user/path/to/repo.git/' ],

            [ 'host.xz', 'host.xz:/~user/path/to/repo.git/' ],
            [ 'host.xz', 'user@host.xz:/~user/path/to/repo.git/' ],
        ];

        foreach ($validUrls as list($expectedHost, $validUrl)) {
            $this->assertEquals(
                $expectedHost,
                GitUrl::host($validUrl)
            );
        }
    }

    public function testPathUrlsReturnNullHost() {
        $validUrls = [
            '/path/to/repo.git/',
            'file:///path/to/repo.git/',
        ];

        foreach ($validUrls as $validUrl) {
            $this->assertEquals(
                null,
                GitUrl::host($validUrl)
            );
        }
    }
}

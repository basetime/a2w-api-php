<?php

use PHPUnit\Framework\TestCase;
use Basetime\A2w\Auth;
use Basetime\A2w\Authed;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\CoversFunction;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

/**
 * Auth test.
 */
#[CoversClass(Auth::class)]
#[CoversFunction('authenticate')]
class AuthTest extends TestCase
{
    #[Test]
    public function testAuthed()
    {
        $mock = new MockHandler([
            new Response(200, ['X-Foo' => 'Bar'], json_encode([
                'idToken' => 'xxxxxxx',
                'refreshToken' => 'xxxxxx',
                'expiresAt' => time() + 3600
            ])),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $guzzle = new \GuzzleHttp\Client(['handler' => $handlerStack]);

        $auth = new Auth(
            'cb680e62-b852-4f2d-bb38-9e80d8e70da3',
            '88415ea7-1f1c-4a16-bf61-762cfc5088d6',
            'https://app.addtowallet.io'
        );
        $auth->setHttpClient($guzzle);
        $auth->setVerify(false);
        $authed = $auth->authenticate();
        $this->assertInstanceOf(Authed::class, $authed);
    }
}

<?php

use PHPUnit\Framework\TestCase;
use Basetime\A2w\Client;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\CoversFunction;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

/**
 * Client test.
 */
#[CoversClass(Client::class)]
#[CoversFunction('fetch')]
class ClientTest extends TestCase
{
    #[Test]
    public function testFetch()
    {
        $mock = new MockHandler([
            new Response(200, ['X-Foo' => 'Bar'], json_encode([
                'idToken' => 'xxxxxxx',
                'refreshToken' => 'xxxxxx',
                'expiresAt' => time() + 3600
            ])),
            new Response(200, [], json_encode([
                'passes' => [],
            ])),
            new RequestException('Error Communicating with Server', new Request('GET', 'test'))
        ]);
        $handlerStack = HandlerStack::create($mock);
        $guzzle = new \GuzzleHttp\Client(['handler' => $handlerStack]);

        $client = new Client(
            'xxxxxxx',
            'xxxxxxx'
        );
        $client->setHttpClient($guzzle);

        $resp = $client->fetch('GET', '/api/v1/campaigns');
        $this->assertIsArray($resp);
        $this->assertArrayHasKey('passes', $resp);
    }
}

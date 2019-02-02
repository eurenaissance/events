<?php

namespace App\Tests\ImageProvider;

use App\ImageProvider\ImageRequestSigner;
use App\Tests\UnitTestCase;

/**
 * @group unit
 */
class ImageRequestSignerTest extends UnitTestCase
{
    public function provideRequests()
    {
        yield 'no_filters' => ['image.jpg', [], '714f4c3d161d77e1e7cd3c6d91243515'];
        yield 'single_filter' => ['image.jpg', ['w' => 100], 'e016294550396c432356045f17e95536'];
        yield 'multiple_filters' => ['image.jpg', ['w' => 100, 'c' => 'foobar'], 'ef819708036958a234a8aafebb7a5274'];
    }

    /**
     * @dataProvider provideRequests
     */
    public function testSign($path, $filters, $expectedSignature)
    {
        $signer = new ImageRequestSigner('secret');

        $this->assertSame($expectedSignature, $signer->signRequest($path, $filters));
    }
}

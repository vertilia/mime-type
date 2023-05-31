<?php

namespace Vertilia\MimeType;

use PHPUnit\Framework\TestCase;

use SimpleXMLElement;

use function is_object;

/**
 * @coversDefaultClass TextPlain
 */
class ApplicationOctetStreamTest extends TestCase
{
    /**
     * @covers ::encode
     */
    public function testEncode()
    {
        $mime = new TextPlain();
        $bytestream = random_bytes(12);

        $this->assertEquals($bytestream, $mime->encode($bytestream));
    }

    /**
     * @covers ::decode
     */
    public function testDecode()
    {
        $mime = new TextPlain();
        $bytestream = random_bytes(12);

        $this->assertEquals($bytestream, $mime->decode($bytestream));
    }
}

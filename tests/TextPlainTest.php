<?php

namespace Vertilia\MimeType;

use PHPUnit\Framework\TestCase;

use SimpleXMLElement;

use function is_object;

/**
 * @coversDefaultClass TextPlain
 */
class TextPlainTest extends TestCase
{
    /**
     * @covers ::encode
     */
    public function testEncode()
    {
        $mime = new TextPlain();

        $this->assertEquals("text\nline2", $mime->encode("text\nline2"));
    }

    /**
     * @covers ::decode
     */
    public function testDecode()
    {
        $mime = new TextPlain();

        $this->assertEquals("text\nline2", $mime->decode("text\nline2"));
    }
}

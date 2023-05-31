<?php

namespace Vertilia\MimeType;

use PHPUnit\Framework\TestCase;
use SimpleXMLElement;

/**
 * @coversDefaultClass ApplicationXml
 */
class ApplicationXmlTest extends TestCase
{
    /**
     * @covers ::encode
     */
    public function testEncode()
    {
        $mime = new ApplicationXml();
        $xml = simplexml_load_string('<a/>');

        $encoded = $mime->encode($xml);
        $this->assertStringContainsString('<?xml version="1.0"?>', $encoded);
        $this->assertStringContainsString('<a/>', $encoded);
    }

    /**
     * @covers ::decode
     */
    public function testDecode()
    {
        $mime = new ApplicationXml();

        $this->assertInstanceOf(SimpleXMLElement::class, $mime->decode('<?xml version="1.0"?><a/>'));
        $this->assertInstanceOf(SimpleXMLElement::class, $mime->decode('<a/>'));
        $this->assertFalse($mime->decode(''));
    }
}

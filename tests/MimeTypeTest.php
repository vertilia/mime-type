<?php

namespace Vertilia\MimeType;

use Vertilia\MimeType\MimeType;
use PHPUnit\Framework\TestCase;

class MimeTypeTest extends TestCase
{
    public function testGet()
    {
        $this->assertInstanceOf(ApplicationJson::class, MimeType::get('application/json'));
        $this->assertInstanceOf(ApplicationXWwwFormUrlencoded::class, MimeType::get('application/x-www-form-urlencoded'));
        $this->assertInstanceOf(ApplicationXWwwFormUrlencoded::class, MimeType::get('application/form-data'));
        $this->assertInstanceOf(ApplicationXml::class, MimeType::get('application/xml'));
        $this->assertInstanceOf(TextPlain::class, MimeType::get('text/html'));
        $this->assertInstanceOf(ApplicationOctetStream::class, MimeType::get('unknown'));
    }
}

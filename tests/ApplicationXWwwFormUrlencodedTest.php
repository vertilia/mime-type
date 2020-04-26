<?php

namespace Vertilia\MimeType;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass ApplicationXWwwFormUrlencoded
 */
class ApplicationXWwwFormUrlencodedTest extends TestCase
{
    /**
     * @dataProvider content2WayProvider
     * @dataProvider contentDecodeProvider
     * @covers ::decode
     * @param string $encoded
     * @param mixed $decoded
     */
    public function testDecode($encoded, $decoded)
    {
        $mime = new ApplicationXWwwFormUrlencoded();
        $value = $mime->decode($encoded, $options);
        $this->assertEquals($decoded, $value);
    }

    /**
     * @dataProvider content2WayProvider
     * @dataProvider contentEncodeProvider
     * @covers ::encode
     * @param string $encoded
     * @param mixed $decoded
     */
    public function testEncode($encoded, $decoded)
    {
        $mime = new ApplicationXWwwFormUrlencoded();
        $this->assertEquals($encoded, $mime->encode($decoded, $options));
    }

    /** data provider */
    public function content2WayProvider()
    {
        return [
            // empty
            ['', []],
            ['a=', ['a' => '']],

            // numbers
            ['a=0', ['a' => 0]],
            ['a=1', ['a' => 1]],
            ['a=0.1', ['a' => 0.1]],
            ['a=1.5', ['a' => 1.5]],

            // strings
            ['a=value', ['a' => 'value']],
            ['a=value+1', ['a' => 'value 1']],

            // arrays
            ['a=b', ['a' => 'b']],
            ['a=1&b%5B0%5D=2&b%5B1%5D=3&b%5B2%5D=4', ['a' => 1, 'b' => [2, 3, 4]]],
            ['_=a', ['_' => 'a']],
        ];
    }

    /** data provider */
    public function contentDecodeProvider()
    {
        return [
            // naming convention
            ['a.b=42', ['a_b' => 42]],
            ['a b=42', ['a_b' => 42]],
            ['a-b=42', ['a-b' => 42]],

            // arrays decoding
            ['a[]=1&b[]=val+2&c[a][b]=c', ['a' => [1], 'b' => ['val 2'], 'c' => ['a' => ['b' => 'c']]]],

            // error
            ['=a', []],
        ];
    }

    /** data provider */
    public function contentEncodeProvider()
    {
        return [
            // naming convention
            ['a_b=42', ['a_b' => 42]],
            ['a-b=42', ['a-b' => 42]],
            ['a.b=42', ['a.b' => 42]],
            ['_=a', ['_' => 'a']],
            ['=a', ['' => 'a']],
            ['-=a', ['-' => 'a']],

            // arrays encoding
            ['a%5B0%5D=1&b%5B0%5D=val+2&c%5Ba%5D%5Bb%5D=c', ['a' => [1], 'b' => ['val 2'], 'c' => ['a' => ['b' => 'c']]]],
        ];
    }
}

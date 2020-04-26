<?php

namespace Vertilia\MimeType;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass ApplicationJson
 */
class ApplicationJsonTest extends TestCase
{
    /**
     * @dataProvider content2WayProvider
     * @covers ::encode
     * @param string $encoded
     * @param mixed $options
     * @param mixed $decoded
     */
    public function testEncode($encoded, $options, $decoded)
    {
        $mime = new ApplicationJson($options);
        $this->assertTrue($encoded === $mime->encode($decoded));
    }

    /**
     * @dataProvider content2WayProvider
     * @covers ::decode
     * @param string $encoded
     * @param mixed $options
     * @param mixed $decoded
     */
    public function testDecode($encoded, $options, $decoded)
    {
        $mime = new ApplicationJson(null, $options);
        $value = $mime->decode($encoded);
        $this->assertTrue(
            \is_object($value)
                ? ($decoded == $value)
                : ($decoded === $value)
        );
    }

    /** data provider */
    public function content2WayProvider()
    {
        return [
            // empty
            ['null', null, null],
            ['false', null, false],
            ['""', null, ''],
            ['0', null, 0],

            // literals
            ['true', null, true],
            ['"value"', null, 'value'],
            ['1', null, 1],
            ['0.1', null, 0.1],
            ['1.5', null, 1.5],

            // arrays
            ['[]', null, []],
            ['[2,3,4]', null, [2, 3, 4]],
            ['["one",2,"three"]', null, ["one", 2, "three"]],

            // objects
            ['{"a":"b"}', \JSON_OBJECT_AS_ARRAY, ['a' => 'b']],
            ['{"a":1,"b":[2,3,4]}', \JSON_OBJECT_AS_ARRAY, ['a' => 1, 'b' => [2, 3, 4]]],
            ['{"":"a"}', \JSON_OBJECT_AS_ARRAY, ['' => 'a']],

            ['{"a":"b"}', null, (object)['a' => 'b']],
            ['{"a":1,"b":[2,3,4]}', null, (object)['a' => 1, 'b' => [2, 3, 4]]],
            ['{"":"a"}', null, (object)['' => 'a']],
        ];
    }
}

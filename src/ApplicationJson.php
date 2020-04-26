<?php
declare(strict_types=1);

namespace Vertilia\MimeType;

class ApplicationJson implements MimeTypeInterface
{
    protected $encode_options = 0;
    protected $decode_options = 0;

    public function __construct($encode_options = null, $decode_options = null)
    {
        $this->encode_options = (int)$encode_options ?: 0;
        $this->decode_options = (int)$decode_options ?: 0;
    }

    public function encode($content): string
    {
        return \json_encode($content, $this->encode_options);
    }

    public function decode(string $content)
    {
        return \json_decode(
            $content,
            (bool)($this->decode_options & \JSON_OBJECT_AS_ARRAY),
            512,
            $this->decode_options
        );
    }
}

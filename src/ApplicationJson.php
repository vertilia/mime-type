<?php
declare(strict_types=1);

namespace Vertilia\MimeType;

class ApplicationJson implements MimeTypeInterface
{
    protected int $encode_options = 0;
    protected int $decode_options = 0;

    public function __construct(int $encode_options = null, int $decode_options = null)
    {
        $this->encode_options = $encode_options ?: 0;
        $this->decode_options = $decode_options ?: 0;
    }

    /**
     * @param mixed $content
     * @return string
     */
    public function encode($content): string
    {
        return json_encode($content, $this->encode_options);
    }

    /**
     * @param string $content
     * @return mixed
     */
    public function decode(string $content)
    {
        return json_decode(
            $content,
            (bool)($this->decode_options & JSON_OBJECT_AS_ARRAY),
            512,
            $this->decode_options
        );
    }
}

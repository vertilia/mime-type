<?php
declare(strict_types=1);

namespace Vertilia\MimeType;

class ApplicationXWwwFormUrlencoded implements MimeTypeInterface
{
    public function decode(string $content)
    {
        \parse_str($content, $values);
        return $values;
    }

    public function encode($content): string
    {
        return \http_build_query($content);
    }
}

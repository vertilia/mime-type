<?php
declare(strict_types=1);

namespace Vertilia\MimeType;

class ApplicationXWwwFormUrlencoded implements MimeTypeInterface
{
    public static function decode(string $content, $options = null)
    {
        \parse_str($content, $values);
        return $values;
    }

    public static function encode($content, $options = null): string
    {
        return \http_build_query($content);
    }
}

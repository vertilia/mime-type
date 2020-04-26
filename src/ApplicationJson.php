<?php
declare(strict_types=1);

namespace Vertilia\MimeType;

class ApplicationJson implements MimeTypeInterface
{
    public static function decode(string $content, $options = null)
    {
        return \json_decode($content, (bool)($options & \JSON_OBJECT_AS_ARRAY), 512, $options ?: 0);
    }

    public static function encode($content, $options = null): string
    {
        return \json_encode($content, $options ?: 0);
    }
}

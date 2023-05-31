<?php

declare(strict_types=1);

namespace Vertilia\MimeType;

class ApplicationXWwwFormUrlencoded implements MimeTypeInterface
{
    public function encode($content): string
    {
        return http_build_query($content);
    }

    public function decode(string $content): array
    {
        parse_str($content, $values);
        return $values;
    }
}

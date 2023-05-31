<?php

declare(strict_types=1);

namespace Vertilia\MimeType;

class ApplicationOctetStream implements MimeTypeInterface
{
    public function encode($content): string
    {
        return (string)$content;
    }

    public function decode(string $content): string
    {
        return $content;
    }
}

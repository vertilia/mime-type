<?php

declare(strict_types=1);

namespace Vertilia\MimeType;

interface MimeTypeInterface
{
    /**
     * @param mixed $content
     * @return string
     */
    public function encode($content): string;

    /**
     * @param string $content
     * @return mixed
     */
    public function decode(string $content);
}

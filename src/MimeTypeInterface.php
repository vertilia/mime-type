<?php
declare(strict_types=1);

namespace Vertilia\MimeType;

interface MimeTypeInterface
{
    /**
     * @param string $content
     * @param int $options
     * @return mixed
     */
    public static function decode(string $content, $options = null);

    /**
     * @param mixed $content
     * @param int $options
     * @return string
     */
    public static function encode($content, $options = null): string;
}

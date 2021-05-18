<?php
declare(strict_types=1);

namespace Vertilia\MimeType;

class ApplicationXWwwFormUrlencoded implements MimeTypeInterface
{
    /**
     * @param mixed $content
     * @return string
     */
    public function encode($content): string
    {
        return http_build_query($content);
    }

    /**
     * @param string $content
     * @return mixed
     */
    public function decode(string $content)
    {
        parse_str($content, $values);
        return $values;
    }
}

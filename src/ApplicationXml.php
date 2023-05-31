<?php

declare(strict_types=1);

namespace Vertilia\MimeType;

use SimpleXMLElement;
use UnexpectedValueException;

class ApplicationXml implements MimeTypeInterface
{
    /**
     * @param mixed $content
     * @return string
     * @throws UnexpectedValueException
     */
    public function encode($content): string
    {
        if (!$content instanceof SimpleXMLElement) {
            throw new UnexpectedValueException('Content should be of type SimpleXMLElement');
        } else {
            return $content->asXML();
        }
    }

    /**
     * @param string $content
     * @return SimpleXMLElement|false
     */
    public function decode(string $content)
    {
        return simplexml_load_string($content, null, LIBXML_NOENT | LIBXML_NONET | LIBXML_NOWARNING);
    }
}

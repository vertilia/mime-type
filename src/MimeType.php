<?php

declare(strict_types=1);

namespace Vertilia\MimeType;

use UnexpectedValueException;

class MimeType
{
    /**
     * @param string $mime_type ex: "application/json"
     * @return MimeTypeInterface
     * @throws UnexpectedValueException
     */
    public static function get(string $mime_type): MimeTypeInterface
    {
        switch ($mime_type) {
            case 'application/json':
            case 'application/ld+json':
            case 'text/javascript':
                return new ApplicationJson();
            case 'application/x-www-form-urlencoded':
            case 'application/form-data':
                return new ApplicationXWwwFormUrlencoded();
            case 'application/xml':
                return new ApplicationXml();
            default:
                return substr($mime_type, 0, 5) === 'text/'
                    ? new TextPlain()
                    : new ApplicationOctetStream();
        }
    }
}

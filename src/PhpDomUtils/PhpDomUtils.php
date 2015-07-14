<?php

/**
 * (c) Toni Van de Voorde (toni.vdv@gmail.com)
 */

namespace PhpDomUtils;

class PhpDomUtils
{

    /**
     * @static
     *
     * @param \DOMDocument $dom
     * @param array|string $value
     * @param \DOMElement  $domElement
     */
    static function fillDom(\DOMDocument $dom, $value, \DOMElement $domElement = null)
    {

        $domElement = null === $domElement ? $dom : $domElement;

        if (is_array($value)) {

            foreach ($value as $index => $valueElement) {

                if (is_int($index)) {

                    if ($index == 0) {
                        $node = $domElement;
                    } else {

                        $node = $dom->createElement($domElement->tagName);

                        /** @noinspection PhpUndefinedMethodInspection */
                        $domElement->parentNode->appendChild($node);

                    }

                } else {
                    $node = $dom->createElement($index);
                    $domElement->appendChild($node);
                }

                PhpDomUtils::fillDom($dom, $valueElement, $node);

            }

        } else {

            $domElement->appendChild($dom->createTextNode($value));

        }
    }

}

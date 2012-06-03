# Php Dom Utils #

[![Build Status](https://secure.travis-ci.org/tonivdv/PhpDomUtils.png?branch=master)](http://travis-ci.org/tonivdv/PhpDomUtils)

Provides an easy way to fill a DOMDocument with an array

    $array = array(
      "nodes" => array(
        "node" => array(
          0 => "text1",
          1 => "text2"
        )));

    $dom = new \DOMDocument('1.0', 'utf-8');

    PhpDomUtils::fillDom($dom, $array);

    echo $dom->saveXML();

Above example would output:

    <?xml version="1.0" encoding="utf-8"?>
    <nodes>
      <node>text1</node>
      <node>text2</node>
    </nodes>
<?php

/**
 * (c) Toni Van de Voorde (toni.vdv@gmail.com)
 */

namespace ToniVdv\PhpDomUtils\Tests;

use ToniVdv\PhpDomUtils\PhpDomUtils;

class PhpDomUtilsTest extends \PHPUnit_Framework_TestCase {

  /**
   * @test
   */
  public function fillDomSimple() {

    $dom = $this->createDom();

    PhpDomUtils::fillDom($dom, $this->getArrayFixture());

    $expectedOutput = '<?xml version="1.0" encoding="utf-8"?><nodes><node>text1</node><node>text2</node></nodes>';

    $this->assertEquals($expectedOutput, $this->oneLine($dom->saveXML()));
  }

  /**
   * @test
   */
  public function fillDomWithDomElement() {

    $dom = $this->createDom();
    $domElement = $dom->createElement("helloworld");
    $dom->appendChild($domElement);

    PhpDomUtils::fillDom($dom, $this->getArrayFixture(), $domElement);

    $expectedOutput = '<?xml version="1.0" encoding="utf-8"?><helloworld><nodes><node>text1</node><node>text2</node></nodes></helloworld>';

    $this->assertEquals($expectedOutput, $this->oneLine($dom->saveXML()));
  }

  private function getArrayFixture() {
    return $array = array(
      "nodes" => array(
        "node" => array(
          0 => "text1",
          1 => "text2"
        )));
  }

  private function createDom() {
    return new \DOMDocument('1.0', 'utf-8');
  }

  private function oneLine($string) {
    return preg_replace('~[[:cntrl:]]~', '', $string);
  }
}

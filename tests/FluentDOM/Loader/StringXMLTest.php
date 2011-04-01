<?php
/**
* XML string loader test for FluentDOM
*
* @version $Id$
* @license http://www.opensource.org/licenses/mit-license.php The MIT License
* @copyright Copyright (c) 2009 Bastian Feder, Thomas Weinert
*
* @package FluentDOM
* @subpackage unitTests
*/

/**
* load necessary files
*/
require_once(dirname(__FILE__).'/../../FluentDOMTestCase.php');
require_once(dirname(__FILE__).'/../../../src/FluentDOM/Loader/StringXML.php');

/**
* Test class for FluentDOMLoaderStringXML.
*
* @package FluentDOM
* @subpackage unitTests
*/
class FluentDOMLoaderStringXMLTest extends FluentDOMTestCase {

  public function testLoad() {
    $loader = new FluentDOMLoaderStringXML();
    $contentType = 'text/xml';
    $dom = $loader->load('<sample/>', $contentType);
    $this->assertTrue($dom instanceof DOMDocument);
    $this->assertEquals('sample', $dom->documentElement->nodeName);
  }

  public function testLoadInvalid() {
    $loader = new FluentDOMLoaderStringXML();
    $contentType = 'text/xml';
    $result = $loader->load('foobar', $contentType);
    $this->assertNull($result);
  }

  public function testLoadEmpty() {
    $loader = new FluentDOMLoaderStringXML();
    $contentType = 'text/xml';
    try {
      $result = $loader->load('', $contentType);
      $this->fail('An expected exception has not been raised.');
    } catch (InvalidArgumentException $e) {
      $this->assertEquals('The source XML string is empty.', $e->getMessage());
    }
  }
}

?>

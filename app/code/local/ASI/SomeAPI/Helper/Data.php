<?php
class ASI_SomeAPI_Helper_Data extends Mage_Core_Helper_Abstract {
    public function arrayToXml($array, $rootElement = null, $xml = null) {
        $_xml = $xml;

        if ($_xml === null) {
            $_xml = new SimpleXMLElement($rootElement !== null ? $rootElement : '<root/>');
        }

        foreach ($array as $k => $v) {
            if (is_array($v)) { //nested array
                $this->arrayToXml($v, $k, $_xml->addChild($k));
            } else {
                $_xml->addChild($k, $v);
            }
        }

        return $_xml->asXML();
    }
}
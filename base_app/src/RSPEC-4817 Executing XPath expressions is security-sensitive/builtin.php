<?php

function evaluate_xpath($doc, $xpathstring, $xmlstring)
{
    $xpath = new DOMXpath($doc);
    $xpath->query($xpathstring); // Questionable
    $xpath->evaluate($xpathstring); // Questionable
    // There is no risk if the xpath is hardcoded
    $hardcoded_xpath = "/users/user[@name='alice']";
    $xpath->query($hardcoded_xpath); // Compliant
    $xpath->evaluate($hardcoded_xpath); // Compliant

    $xml = new SimpleXMLElement($doc);
    $xml->xpath($xpathstring); // Questionable
    // There is no risk if the xpath is hardcoded
    $xml->xpath($hardcoded_xpath); // Compliant

    // simplexml_load_file returns a SimpleXMLElement
    $xml2 = simplexml_load_file('test.xml');
    $xml2->xpath($xpathstring); // Questionable
    // There is no risk if the xpath is hardcoded
    $xml2->xpath($hardcoded_xpath); // Compliant

    // simplexml_load_string returns a SimpleXMLElement
    $xml3 = simplexml_load_string($xmlstring);
    $xml3->xpath($xpathstring); // Questionable
    // There is no risk if the xpath is hardcoded
    $xml3->xpath($hardcoded_xpath); // Compliant

    // simplexml_import_dom returns a SimpleXMLElement
    $xml4 = simplexml_import_dom($xmlstring);
    $xml4->xpath($xpathstring); // Questionable
    // There is no risk if the xpath is hardcoded
    $xml4->xpath($hardcoded_xpath); // Compliant
}
?>
<?php

/**
 * Supported-calendar-data property
 *
 * This property is a representation of the supported-calendar-data property
 * in the CalDAV namespace. SabreDAV only has support for text/calendar;2.0
 * so the value is currently hardcoded.
 *
 * @package Sabre
 * @subpackage CalDAV
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Sabre_CalDAV_Property_SupportedCalendarData extends Sabre_DAV_Property {

    /**
     * Serializes the property in a DOMDocument
     *
     * @param Sabre_DAV_Server $server
     * @param DOMElement $node
     * @return void
     */
    public function serialize(Sabre_DAV_Server $server,DOMElement $node) {

        $doc = $node->ownerDocument;

        $prefix = isset($server->xmlNamespaces[Sabre_CalDAV_Plugin::NS_CALDAV])?$server->xmlNamespaces[Sabre_CalDAV_Plugin::NS_CALDAV]:'cal';

        $caldata = $doc->createElement($prefix . ':calendar-data');
        $caldata->setAttribute('content-type','text/calendar');
        $caldata->setAttribute('version','2.0');

        $node->appendChild($caldata);
    }

}

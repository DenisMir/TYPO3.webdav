<?php

/**
 * Calendars collection
 *
 * This object is responsible for generating a list of calendar-homes for each
 * user.
 *
 * @package Sabre
 * @subpackage CalDAV
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Sabre_CalDAV_CalendarRootNode extends Sabre_DAVACL_AbstractPrincipalCollection {

    /**
     * CalDAV backend
     *
     * @var Sabre_CalDAV_Backend_BackendInterface
     */
    protected $caldavBackend;

    /**
     * Constructor
     *
     * This constructor needs both an authentication and a caldav backend.
     *
     * By default this class will show a list of calendar collections for
     * principals in the 'principals' collection. If your main principals are
     * actually located in a different path, use the $principalPrefix argument
     * to override this.
     *
     *
     * @param Sabre_DAVACL_IPrincipalBackend $principalBackend
     * @param Sabre_CalDAV_Backend_BackendInterface $caldavBackend
     * @param string $principalPrefix
     */
    public function __construct(Sabre_DAVACL_IPrincipalBackend $principalBackend,Sabre_CalDAV_Backend_BackendInterface $caldavBackend, $principalPrefix = 'principals') {

        parent::__construct($principalBackend, $principalPrefix);
        $this->caldavBackend = $caldavBackend;

    }

    /**
     * Returns the nodename
     *
     * We're overriding this, because the default will be the 'principalPrefix',
     * and we want it to be Sabre_CalDAV_Plugin::CALENDAR_ROOT
     *
     * @return string
     */
    public function getName() {

        return Sabre_CalDAV_Plugin::CALENDAR_ROOT;

    }

    /**
     * This method returns a node for a principal.
     *
     * The passed array contains principal information, and is guaranteed to
     * at least contain a uri item. Other properties may or may not be
     * supplied by the authentication backend.
     *
     * @param array $principal
     * @return Sabre_DAV_INode
     */
    public function getChildForPrincipal(array $principal) {

        return new Sabre_CalDAV_UserCalendars($this->principalBackend, $this->caldavBackend, $principal['uri']);

    }

}

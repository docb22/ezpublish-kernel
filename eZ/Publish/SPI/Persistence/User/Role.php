<?php
/**
 * File containing the eZ\Publish\SPI\Persistence\User\Role class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\SPI\Persistence\User;

use eZ\Publish\SPI\Persistence\MultiLanguageValueBase;
use eZ\Publish\SPI\Persistence\ValueObject;

/**
 */
class Role extends MultiLanguageValueBase
{
    /**
     * ID of the user rule
     *
     * @var mixed
     */
    public $id;

    /**
     * Policies associated with the role
     *
     * @var \eZ\Publish\SPI\Persistence\User\Role\Policy[]
     */
    public $policies = array();

    /**
     * Contains an array of group IDs that have this role assigned.
     *
     * @var mixed[] In LE implementation, id's are contentId's
     */
    public $groupIds = array();

    /**
     * Contains an array of user group IDs that have this role assigned.
     *
     * @var mixed[] In LE implementation, id's are contentId's
     */
    public $userIds = array();

}

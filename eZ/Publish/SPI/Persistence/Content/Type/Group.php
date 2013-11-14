<?php
/**
 * File containing the ContentTypeGroup class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\SPI\Persistence\Content\Type;

use eZ\Publish\SPI\Persistence\MultiLanguageValueBase;
use eZ\Publish\SPI\Persistence\ValueObject;

/**
 */
class Group extends MultiLanguageValueBase
{
    /**
     * Primary key
     *
     * @var mixed
     */
    public $id;

    /**
     * Created date (timestamp)
     *
     * @var int
     */
    public $creationDate;

    /**
     * Modified date (timestamp)
     *
     * @var int
     */
    public $modificationDate;

    /**
     * Creator user id
     *
     * @var mixed
     */
    public $creatorId;

    /**
     * Modifier user id
     *
     * @var mixed
     *
     */
    public $modifierId;
}

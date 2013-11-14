<?php
/**
 * File containing the Section class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\SPI\Persistence\Content;

use eZ\Publish\SPI\Persistence\MultiLanguageValueBase;
use eZ\Publish\SPI\Persistence\ValueObject;

/**
 */
class Section extends MultiLanguageValueBase
{
    /**
     * Id of the section
     *
     * @var int
     */
    public $id;
}

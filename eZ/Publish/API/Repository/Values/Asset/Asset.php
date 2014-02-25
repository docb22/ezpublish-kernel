<?php
/**
 * File containing the eZ\Publish\API\Repository\Values\Asset\Asset class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\API\Repository\Values\Asset;

use eZ\Publish\API\Repository\Values\ValueObject;

/**
 * This class represents an asset value
 *
 * @property_read int|string $id
 * @property_read string $assetTypeIdentifier
 * @property_read \eZ\Publish\API\Repository\Values\Asset\Variant[] $variants
 *
 */
class Asset extends ValueObject
{
    /**
     * the unique id of the asset
     *
     * @var int|string
     */
    protected $id;

    /**
     * the asset type identifier
     *
     * @var string
     */
    protected $assetTypeIdentifier;

    /**
     * the list of already generated variants
     *
     * @var \eZ\Publish\API\Repository\Values\Asset\Variant[]
     */
    protected $variants;
}

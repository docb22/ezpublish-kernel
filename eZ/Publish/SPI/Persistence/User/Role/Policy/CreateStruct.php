<?php
/**
 * File containing the eZ\Publish\SPI\Persistence\User\Role\Policy\CreateStruct class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */


namespace eZ\Publish\SPI\Persistence\User\Role\Policy;

/**
 * This class is used to create a policy for a role
 *
 * @package eZ\Publish\SPI\Persistence\User\Role\Policy
 */
class CreateStruct
{

    /**
     * Name of module, associated with the Policy
     *
     * Eg: content
     *
     * @var string
     */
    public $module;

    /**
     * Name of the module function Or all functions with '*'
     *
     * Eg: read
     *
     * @var string
     */
    public $function;

    /**
     * Array of policy limitations, which is just a random hash map.
     *
     * The limitation array may look like:
     * <code>
     *  array(
     *      'Subtree' => array(
     *          '/1/2/',
     *          '/1/4/',
     *      ),
     *      'Foo' => array( 'Bar' ),
     *      …
     *  )
     * </code>
     *
     * Where the keys are the limitation identifiers, and the respective values
     * are an array of limitation values
     *
     * @var array|string If string, then only the value '*' is allowed, meaning all limitations.
     *                   Can not be a empty array as '*' should be used in this case.
     */
    public $limitations;

}
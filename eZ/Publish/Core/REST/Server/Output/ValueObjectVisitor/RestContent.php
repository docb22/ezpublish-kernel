<?php
/**
 * File containing the ContentInfo ValueObjectVisitor class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\REST\Server\Output\ValueObjectVisitor;

use eZ\Publish\Core\REST\Common\Output\ValueObjectVisitor;
use eZ\Publish\Core\REST\Common\Output\Generator;
use eZ\Publish\Core\REST\Common\Output\Visitor;

/**
 * Visits the RestContent value object
 */
class RestContent extends ValueObjectVisitor
{
    /**
     * Visit struct returned by controllers
     *
     * @param \eZ\Publish\Core\REST\Common\Output\Visitor $visitor
     * @param \eZ\Publish\Core\REST\Common\Output\Generator $generator
     * @param mixed $data
     */
    public function visit( Visitor $visitor, Generator $generator, $data )
    {
        $restContent = $data;
        $contentInfo = $restContent->contentInfo;
        $mainLocation = $restContent->mainLocation;
        $currentVersion = $restContent->currentVersion;

        $mediaType = ( $restContent->currentVersion === null ? 'ContentInfo' : 'Content' );

        $generator->startObjectElement( 'Content', $mediaType );

        $visitor->setHeader( 'Content-Type', $generator->getMediaType( $mediaType ) );

        $generator->startAttribute(
            'href',
            $this->urlHandler->generate( 'object', array( 'object' => $contentInfo->id ) )
        );
        $generator->endAttribute( 'href' );

        $generator->startAttribute( 'remoteId', $contentInfo->remoteId );
        $generator->endAttribute( 'remoteId' );
        $generator->startAttribute( 'id', $contentInfo->id );
        $generator->endAttribute( 'id' );

        $generator->startObjectElement( 'ContentType' );
        $generator->startAttribute(
            'href',
            $this->urlHandler->generate(
                'type',
                array( 'type' => $contentInfo->contentType->id )
            )
        );
        $generator->endAttribute( 'href' );
        $generator->endObjectElement( 'ContentType' );

        $generator->startValueElement( 'Name', $contentInfo->name );
        $generator->endValueElement( 'Name' );

        $generator->startObjectElement( 'Versions', 'VersionList' );
        $generator->startAttribute(
            'href',
            $this->urlHandler->generate( 'objectVersions', array( 'object' => $contentInfo->id ) )
        );
        $generator->endAttribute( 'href' );
        $generator->endObjectElement( 'Versions' );

        $generator->startObjectElement( 'CurrentVersion', 'Version' );
        $generator->startAttribute(
            'href',
            $this->urlHandler->generate(
                'objectCurrentVersion',
                array( 'object' => $contentInfo->id )
            )
        );
        $generator->endAttribute( 'href' );

        // Embed current version, if available
        if ( $currentVersion !== null )
        {
            $visitor->visitValueObject( $currentVersion );
        }

        $generator->endObjectElement( 'CurrentVersion' );

        $generator->startObjectElement( 'Section' );
        $generator->startAttribute(
            'href',
            $this->urlHandler->generate( 'section', array( 'section' => $contentInfo->sectionId ) )
        );
        $generator->endAttribute( 'href' );
        $generator->endObjectElement( 'Section' );

        $generator->startObjectElement( 'MainLocation', 'Location' );
        $generator->startAttribute(
            'href',
            $this->urlHandler->generate( 'location', array( 'location' => $mainLocation->pathString ) )
        );
        $generator->endAttribute( 'href' );
        $generator->endObjectElement( 'MainLocation' );

        $generator->startObjectElement( 'Locations', 'LocationList' );
        $generator->startAttribute(
            'href',
            $this->urlHandler->generate( 'objectLocations', array( 'object' => $contentInfo->id ) )
        );
        $generator->endAttribute( 'href' );
        $generator->endObjectElement( 'Locations' );

        $generator->startObjectElement( 'Owner', 'User' );
        $generator->startAttribute(
            'href',
            $this->urlHandler->generate( 'user', array( 'user' => $contentInfo->ownerId ) )
        );
        $generator->endAttribute( 'href' );
        $generator->endObjectElement( 'Owner' );

        $generator->startValueElement(
            'lastModificationDate',
            $contentInfo->modificationDate->format( 'c' )
        );
        $generator->endValueElement( 'lastModificationDate' );

        $generator->startValueElement(
            'publishedDate',
            ( $contentInfo->publishedDate !== null
                ? $contentInfo->publishedDate->format( 'c' )
                : null )
        );
        $generator->endValueElement( 'publishedDate' );

        $generator->startValueElement(
            'mainLanguageCode',
            $contentInfo->mainLanguageCode
        );
        $generator->endValueElement( 'mainLanguageCode' );

        $generator->startValueElement(
            'alwaysAvailable',
            ( $contentInfo->alwaysAvailable ? 'true' : 'false' )
        );
        $generator->endValueElement( 'alwaysAvailable' );

        $generator->endObjectElement( 'Content' );
    }
}

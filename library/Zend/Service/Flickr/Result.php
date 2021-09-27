<?php

/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Service
 * @subpackage Flickr
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */


/**
 * @category   Zend
 * @package    Zend_Service
 * @subpackage Flickr
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Service_Flickr_Result
{
    /**
     * The photo's Flickr ID.
     */
    public string $id;

    /**
     * The photo owner's NSID.
     */
    public string $owner;

    /**
     * A key used in URI construction.
     */
    public string $secret;

    /**
     * The servername to use for URI construction.
     */
    public string $server;

    /**
     * The photo's title.
     */
    public string $title;

    /**
     * Whether the photo is public.
     */
    public string $ispublic;

    /**
     * Whether the photo is visible to you because you are a friend of the owner.
     */
    public string $isfriend;

    /**
     * Whether the photo is visible to you because you are family of the owner.
     */
    public string $isfamily;

    /**
     * The license the photo is available under.
     */
    public string $license;

    /**
     * The date the photo was uploaded.
     */
    public string $dateupload;

    /**
     * The date the photo was taken.
     */
    public string $datetaken;

    /**
     * The screenname of the owner.
     */
    public string $ownername;

    /**
     * The server used in assembling icon URLs.
     */
    public string $iconserver;

    /**
     * A 75x75 pixel square thumbnail of the image.
     */
    public \Zend_Service_Flickr_Image $Square;

    /**
     * A 100 pixel thumbnail of the image.
     */
    public \Zend_Service_Flickr_Image $Thumbnail;

    /**
     * A 240 pixel version of the image.
     */
    public \Zend_Service_Flickr_Image $Small;

    /**
     * A 500 pixel version of the image.
     */
    public \Zend_Service_Flickr_Image $Medium;

    /**
     * A 640 pixel version of the image.
     */
    public \Zend_Service_Flickr_Image $Large;

    /**
     * The original image.
     */
    public \Zend_Service_Flickr_Image $Original;

    /**
     * Original Zend_Service_Flickr object.
     */
    protected \Zend_Service_Flickr $_flickr;

    /**
     * Parse the Flickr Result
     *
     * @param  DOMElement          $image
     * @param  Zend_Service_Flickr $flickr Original Zend_Service_Flickr object with which the request was made
     * @return void
     */
    public function __construct(DOMElement $image, Zend_Service_Flickr $flickr)
    {
        $xpath = new DOMXPath($image->ownerDocument);

        foreach ($xpath->query('./@*', $image) as $property) {
            $this->{$property->name} = (string) $property->value;
        }

        $this->_flickr = $flickr;

        foreach ($this->_flickr->getImageDetails($this->id) as $k => $v) {
            $this->$k = $v;
        }
    }
}

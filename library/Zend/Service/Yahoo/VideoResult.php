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
 * @subpackage Yahoo
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */


/**
 * @see Zend_Service_Yahoo_Result
 */
require_once 'Zend/Service/Yahoo/Result.php';


/**
 * @category   Zend
 * @package    Zend_Service
 * @subpackage Yahoo
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Service_Yahoo_VideoResult extends Zend_Service_Yahoo_Result
{
    /**
     * Summary info for the video
     */
    public string $Summary;

    /**
     * The URL of the webpage hosting the video
     */
    public string $RefererUrl;

    /**
     * The size of the files in bytes
     */
    public string $FileSize;

    /**
     * The type of file (bmp, gif, jpeg, etc.)
     */
    public string $FileFormat;

    /**
     * The height of the video in pixels
     */
    public string $Height;

    /**
     * The width of the video in pixels
     */
    public string $Width;

    /**
     * The duration of the video in seconds
     */
    public string $Duration;

    /**
     * The number of audio channels in the video
     */
    public string $Channels;

    /**
     * Whether the video is streamed or not
     */
    public bool $Streaming;

    /**
     * The thubmnail video for the article, if it exists
     *
     * @var Zend_Service_Yahoo_Video
     */
    public $Thumbnail;

    /**
     * Video result namespace
     */
    protected string $_namespace = 'urn:yahoo:srchmv';


    /**
     * Initializes the video result
     *
     * @param  DOMElement $result
     * @return void
     */
    public function __construct(DOMElement $result)
    {
        $this->_fields = array('Summary', 'RefererUrl', 'FileSize', 'FileFormat', 'Height', 'Width', 'Duration', 'Channels', 'Streaming', 'Thumbnail');

        parent::__construct($result);

        $this->_setThumbnail();
    }
}

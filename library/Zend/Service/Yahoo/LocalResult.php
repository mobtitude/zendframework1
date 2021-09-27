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
class Zend_Service_Yahoo_LocalResult extends Zend_Service_Yahoo_Result
{
    /**
     * Street address of the result
     */
    public string $Address;

    /**
     * City in which the result resides
     */
    public string $City;

    /**
     * State in which the result resides
     */
    public string $State;

    /**
     * Phone number for the result
     */
    public string $Phone;

    /**
     * User-submitted rating for the result
     */
    public string $Rating;

    /**
     * The distance to the result from your specified location
     */
    public string $Distance;

    /**
     * A URL of a map for the result
     */
    public string $MapUrl;

    /**
     * The URL for the business website, if known
     */
    public string $BusinessUrl;

    /**
     * The URL for linking to the business website, if known
     */
    public string $BusinessClickUrl;

    /**
     * Local result namespace
     */
    protected string $_namespace = 'urn:yahoo:lcl';


    /**
     * Initializes the local result
     *
     * @param  DOMElement $result
     * @return void
     */
    public function __construct(DOMElement $result)
    {
        $this->_fields = array('Address','City', 'City', 'State', 'Phone', 'Rating', 'Distance', 'MapUrl',
                               'BusinessUrl', 'BusinessClickUrl');

        parent::__construct($result);
    }
}

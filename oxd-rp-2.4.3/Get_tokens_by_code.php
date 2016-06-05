<?php
/**
 * Gluu-oxd-library
 *
 * An open source application library for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015, Gluu inc, USA, Austin
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	Gluu-oxd-library
 * @version 2.4.3
 * @author	Vlad Karapetyan
 * @author		vlad.karapetyan.1988@mail.ru
 * @copyright	Copyright (c) 2015, Gluu inc federation (https://gluu.org/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://gluu.org/
 * @since	Version 2.4.3
 * @filesource
 */

/**
 * Client tokens code class
 *
 * Class is connecting to oXD-server via socket, and getting authorization url from gluu-server.
 *
 * @package		Gluu-oxd-library
 * @subpackage	Libraries
 * @category	Registration site in gluu server via oXD server
 * @author		Vlad Karapetyan
 * @author		vlad.karapetyan.1988@mail.ru
 * @see	        Client_Socket_OXD_RP
 * @see	        Client_OXD_RP
 * @see	        Oxd_RP_config
 */

require_once 'Client_OXD_RP.php';

class Get_tokens_by_code extends Client_OXD_RP
{
    /**
     * @var string $request_oxd_id                           This parameter you must get after registration site in gluu-server
     */
    private $request_oxd_id = null;
    /**
     * @var string $request_code                             This parameter you must get from URL, after redirecting authorization url
     */
    private $request_code = null;
    /**
     * @var string $request_state                            This parameter you must get from URL, after redirecting authorization url
     */
    private $request_state = null;
    /**
     * @var string $request_scopes                           For getting needed scopes data from gluu-server
     */
    private $request_scopes  = null;

    /**
     * Response parameter from oXD-server
     * It need to using for get_user_info and logout classes
     *
     * @var string $response_access_token
     */
    private $response_access_token;
    /**
     * Response parameter from oXD-server
     * Showing user expires time
     *
     * @var string $response_expires_in
     */
    private $response_expires_in;
    /**
     * Response parameter from oXD-server
     * It need to using for get_user_info and logout classes
     *
     * @var string $response_id_token
     */
    private $response_id_token;
    /**
     * Response parameter from oXD-server
     * Showing user claimses and data
     *
     * @var string $response_expires_in
     */
    private $response_id_token_claims;

    /**
     * Constructor
     *
     * Initialize base url for log file directory and oxd-rp-setting.json file.
     *
     * @param string $base_url
     * @return	void
     */
    public function __construct($base_url='./')
    {
        parent::__construct($base_url); // TODO: Change the autogenerated stub
    }

    /**
     * @return string
     */
    public function getRequestScopes()
    {
        return $this->request_scopes;
    }

    /**
     * @param string $request_scopes
     * @return	void
     */
    public function setRequestScopes($request_scopes)
    {
        $this->request_scopes = $request_scopes;
    }

    /**
     * @return string
     */
    public function getRequestOxdId()
    {
        return $this->request_oxd_id;
    }

    /**
     * @param string $request_oxd_id
     * @return	void
     */
    public function setRequestOxdId($request_oxd_id)
    {
        $this->request_oxd_id = $request_oxd_id;
    }

    /**
     * @return string
     */
    public function getRequestState()
    {
        return $this->request_state;
    }

    /**
     * @param string $request_state
     * @return	void
     */
    public function setRequestState($request_state)
    {
        $this->request_state = $request_state;
    }

    /**
     * @return string
     */
    public function getRequestCode()
    {
        return $this->request_code;
    }

    /**
     * @param string $request_code
     * @return	void
     */
    public function setRequestCode($request_code)
    {
        $this->request_code = $request_code;
    }

    /**
     * @return string
     */
    public function getResponseAccessToken()
    {
        $this->response_access_token = $this->getResponseData()->access_token;
        return $this->response_access_token;
    }

    /**
     * @return string
     */
    public function getResponseExpiresIn()
    {
        $this->response_expires_in = $this->getResponseData()->expires_in;
        return $this->response_expires_in;
    }

    /**
     * @return string
     */
    public function getResponseIdToken()
    {
        $this->response_id_token = $this->getResponseData()->id_token;
        return $this->response_id_token;
    }

    /**
     * @return string
     */
    public function getResponseIdTokenClaims()
    {
        $this->response_id_token_claims = $this->getResponseData()->id_token_claims;
        return $this->response_id_token_claims;
    }

    /**
     * Protocol command to oXD server
     * @return void
     */
    public function setCommand()
    {
        $this->command = 'get_tokens_by_code';
    }
    /**
     * Protocol parameter to oXD server
     * @return void
     */
    public function setParams()
    {
        $this->params = array(
            "oxd_id" => $this->getRequestOxdId(),
            "code" => $this->getRequestCode(),
            "state" => $this->getRequestState(),
            "scopes" => $this->getRequestScopes()
        );
    }

}
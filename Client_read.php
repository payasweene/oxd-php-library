<?php

require_once 'Client.php';

class Client_read extends Client
{
    /**start parameter for request!**/
    private $request_registration_client_uri = null;
    private $request_registration_access_token = null;
    /**end request parameter**/

    /**start parameter for response!**/
    private $response_client_id;
    private $response_client_secret;
    private $response_registration_access_token;
    private $response_client_secret_expires_at;
    private $response_registration_client_uri;
    private $response_client_id_issued_at;

    /**end response parameter**/

    public function __construct()
    {
        /**
         * Client_read constructor.
         * @param $ip ='127.0.0.1', $port=8099
         **/
        parent::__construct(); // TODO: Change the autogenerated stub
    }

    /**
     * @return mixed
     */
    public function getResponseClientId()
    {
        $this->response_client_id = $this->getResponseData()->client_id;
        return $this->response_client_id;
    }

    /**
     * @return mixed
     */
    public function getResponseClientSecret()
    {
        $this->response_client_secret = $this->getResponseData()->client_secret;
        return $this->response_client_secret;
    }

    /**
     * @return mixed
     */
    public function getResponseRegistrationAccessToken()
    {
        $this->response_registration_access_token = $this->getResponseData()->registration_access_token;
        return $this->response_registration_access_token;
    }

    /**
     * @return mixed
     */
    public function getResponseClientSecretExpiresAt()
    {
        $this->response_client_secret_expires_at = $this->getResponseData()->client_secret_expires_at;
        return $this->response_client_secret_expires_at;
    }

    /**
     * @return mixed
     */
    public function getResponseRegistrationClientUri()
    {
        $this->response_registration_client_uri = $this->getResponseData()->registration_client_uri;
        return $this->response_registration_client_uri;
    }

    /**
     * @return mixed
     */
    public function getResponseClientIdIssuedAt()
    {
        $this->response_registration_client_uri = $this->getResponseData()->registration_client_uri;
        return $this->response_client_id_issued_at;
    }

    /**
     * @return mixed
     */
    public function getRequestRegistrationClientUri()
    {
        return $this->request_registration_client_uri;
    }

    /**
     * @param mixed $request_registration_client_uri
     */
    public function setRequestRegistrationClientUri($request_registration_client_uri)
    {
        $this->request_registration_client_uri = $request_registration_client_uri;
    }

    /**
     * @return mixed
     */
    public function getRequestRegistrationAccessToken()
    {
        return $this->request_registration_access_token;
    }

    /**
     * @param mixed $registration_access_token
     */
    public function setRequestRegistrationAccessToken($request_registration_access_token)
    {
        $this->request_registration_access_token = $request_registration_access_token;
    }

    /**
     * @param mixed $command
     */
    public function setCommand()
    {
        $this->command = 'client_read';
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    public function setParams()
    {
        $this->params = array(
            "registration_client_uri" => $this->getRequestRegistrationClientUri(),
            "registration_access_token" => $this->getRequestRegistrationAccessToken()
        );
    }
}

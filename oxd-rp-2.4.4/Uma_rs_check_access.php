<?php

/**
 * Created  Vlad Karapetyan
 * Date: 03/06/2016
 */
require_once 'Client_OXD_RP.php';

class Uma_rs_check_access extends Client_OXD_RP{
    /**start parameter for request!**/
    private $request_oxd_id = null;
    private $request_rpt = null;
    private $request_path = null;
    private $request_http_method = null;
    /**end request parameter**/

    /**start parameter for response!**/
    private $response_access;
    /**end response parameter**/

    public function __construct($base_url='./')
    {
        parent::__construct($base_url); // TODO: Change the autogenerated stub
    }

    /**
     * @return mixed
     */
    public function getRequestOxdId()
    {
        return $this->request_oxd_id;
    }

    /**
     * @param mixed $request_oxd_id
     */
    public function setRequestOxdId($request_oxd_id)
    {
        $this->request_oxd_id = $request_oxd_id;
    }

    /**
     * @return null
     */
    public function getRequestRpt()
    {
        return $this->request_rpt;
    }

    /**
     * @param null $request_rpt
     */
    public function setRequestRpt($request_rpt)
    {
        $this->request_rpt = $request_rpt;
    }

    /**
     * @return null
     */
    public function getRequestPath()
    {
        return $this->request_path;
    }

    /**
     * @param null $request_path
     */
    public function setRequestPath($request_path)
    {
        $this->request_path = $request_path;
    }

    /**
     * @return null
     */
    public function getRequestHttpMethod()
    {
        return $this->request_http_method;
    }

    /**
     * @param null $request_http_method
     */
    public function setRequestHttpMethod($request_http_method)
    {
        $this->request_http_method = $request_http_method;
    }

    /**
     * @return mixed
     */
    public function getResponseAccess()
    {
        $this->response_access = $this->getResponseData()->access;
        return $this->response_access;
    }

    public function setCommand()
    {
        $this->command = 'uma_rs_check_access';
    }

    public function setParams()
    {
        $this->params = array(
            "oxd_id" => $this->getRequestOxdId(),
            "rpt" => $this->getRequestRpt(),
            "path" => $this->getRequestPath(),
            "http_method" => $this->getRequestHttpMethod()
        );
    }

}
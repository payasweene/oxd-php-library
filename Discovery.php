<?php

require_once 'Client.php';

class Discovery extends Client
{
    /**start parameter for request!**/
    private $request_discovery_url = null;
    /**end request parameter**/

    /**start parameter for response!**/
    private $response_issuer;
    private $response_authorization_endpoint;
    private $response_token_endpoint;
    private $response_userinfo_endpoint;
    private $response_clientinfo_endpoint;
    private $response_check_session_iframe;
    private $response_end_session_endpoint;
    private $response_jwks_uri;
    private $response_registration_endpoint;
    private $response_validate_token_endpoint;
    private $response_federation_metadata_endpoint;
    private $response_federation_endpoint;
    private $response_id_generation_endpoint;
    private $response_scopes_supported;
    private $response_types_supported;
    private $response_grant_types_supported;
    private $response_subject_types_supported;
    private $response_service_documentation;
    private $response_claims_locales_supported;
    private $response_ui_locales_supported;
    private $response_claims_parameter_supported;
    private $response_request_parameter_supported;
    private $response_request_uri_parameter_supported;
    private $response_require_request_uri_registration;
    private $response_op_policy_uri;
    private $response_op_tos_uri;

    /**end response parameter**/

    public function __construct()
    {
        /**
         * Discovery constructor.
         * @param $ip='127.0.0.1', $port=8099
         **/
        parent::__construct(); // TODO: Change the autogenerated stub
    }

    /**
     * @return null
     */
    public function getRequestDiscoveryUrl()
    {
        return $this->request_discovery_url;
    }

    /**
     * @param null $request_discovery_url
     */
    public function setRequestDiscoveryUrl($request_discovery_url)
    {
        $this->request_discovery_url = $request_discovery_url;
    }

    /**
     * @return mixed
     */
    public function getResponseIssuer()
    {
        $this->response_issuer = $this->getResponseData()->issuer;
        return $this->response_issuer;
    }

    /**
     * @return mixed
     */
    public function getResponseAuthorizationEndpoint()
    {
        $this->response_authorization_endpoint = $this->getResponseData()->authorization_endpoint;
        return $this->response_authorization_endpoint;
    }

    /**
     * @return mixed
     */
    public function getResponseTokenEndpoint()
    {
        $this->response_token_endpoint = $this->getResponseData()->token_endpoint;
        return $this->response_token_endpoint;
    }

    /**
     * @return mixed
     */
    public function getResponseUserinfoEndpoint()
    {
        $this->response_userinfo_endpoint = $this->getResponseData()->userinfo_endpoint;
        return $this->response_userinfo_endpoint;
    }

    /**
     * @return mixed
     */
    public function getResponseClientinfoEndpoint()
    {
        $this->response_clientinfo_endpoint = $this->getResponseData()->clientinfo_endpoint;
        return $this->response_clientinfo_endpoint;
    }

    /**
     * @return mixed
     */
    public function getResponseCheckSessionIframe()
    {
        $this->response_check_session_iframe = $this->getResponseData()->check_session_iframe;
        return $this->response_check_session_iframe;
    }

    /**
     * @return mixed
     */
    public function getResponseEndSessionEndpoint()
    {
        $this->response_end_session_endpoint = $this->getResponseData()->end_session_endpoint;
        return $this->response_end_session_endpoint;
    }

    /**
     * @return mixed
     */
    public function getResponseJwksUri()
    {
        $this->response_jwks_uri = $this->getResponseData()->jwks_uri;
        return $this->response_jwks_uri;
    }

    /**
     * @return mixed
     */
    public function getResponseRegistrationEndpoint()
    {
        $this->response_registration_endpoint = $this->getResponseData()->registration_endpoint;
        return $this->response_registration_endpoint;
    }

    /**
     * @return mixed
     */
    public function getResponseValidateTokenEndpoint()
    {
        $this->response_validate_token_endpoint = $this->getResponseData()->validate_token_endpoint;
        return $this->response_validate_token_endpoint;
    }

    /**
     * @return mixed
     */
    public function getResponseFederationMetadataEndpoint()
    {
        $this->response_federation_metadata_endpoint = $this->getResponseData()->federation_metadata_endpoint;
        return $this->response_federation_metadata_endpoint;
    }

    /**
     * @return mixed
     */
    public function getResponseFederationEndpoint()
    {
        $this->response_federation_endpoint = $this->getResponseData()->federation_endpoint;
        return $this->response_federation_endpoint;
    }

    /**
     * @return mixed
     */
    public function getResponseIdGenerationEndpoint()
    {
        $this->response_id_generation_endpoint = $this->getResponseData()->id_generation_endpoint;
        return $this->response_id_generation_endpoint;
    }

    /**
     * @return mixed
     */
    public function getResponseScopesSupported()
    {
        $this->response_scopes_supported = $this->getResponseData()->scopes_supported;
        return $this->response_scopes_supported;
    }

    /**
     * @return mixed
     */
    public function getResponseTypesSupported()
    {
        $this->response_types_supported = $this->getResponseData()->response_types_supported;
        return $this->response_types_supported;
    }

    /**
     * @return mixed
     */
    public function getResponseGrantTypesSupported()
    {
        $this->response_grant_types_supported = $this->getResponseData()->grant_types_supported;
        return $this->response_grant_types_supported;
    }

    /**
     * @return mixed
     */
    public function getResponseSubjectTypesSupported()
    {
        $this->response_subject_types_supported = $this->getResponseData()->subject_types_supported;
        return $this->response_subject_types_supported;
    }

    /**
     * @return mixed
     */
    public function getResponseServiceDocumentation()
    {
        $this->response_service_documentation = $this->getResponseData()->service_documentation;
        return $this->response_service_documentation;
    }

    /**
     * @return mixed
     */
    public function getResponseClaimsLocalesSupported()
    {
        $this->response_claims_locales_supported = $this->getResponseData()->claims_locales_supported;
        return $this->response_claims_locales_supported;
    }

    /**
     * @return mixed
     */
    public function getResponseUiLocalesSupported()
    {
        $this->response_ui_locales_supported = $this->getResponseData()->ui_locales_supported;
        return $this->response_ui_locales_supported;
    }

    /**
     * @return mixed
     */
    public function getResponseClaimsParameterSupported()
    {
        $this->response_claims_parameter_supported = $this->getResponseData()->claims_parameter_supported;
        return $this->response_claims_parameter_supported;
    }

    /**
     * @return mixed
     */
    public function getResponseRequestParameterSupported()
    {
        $this->response_request_parameter_supported = $this->getResponseData()->request_parameter_supported;
        return $this->response_request_parameter_supported;
    }

    /**
     * @return mixed
     */
    public function getResponseRequestUriParameterSupported()
    {
        $this->response_request_uri_parameter_supported = $this->getResponseData()->request_uri_parameter_supported;
        return $this->response_request_uri_parameter_supported;
    }

    /**
     * @return mixed
     */
    public function getResponseRequireRequestUriRegistration()
    {
        $this->response_require_request_uri_registration = $this->getResponseData()->require_request_uri_registration;
        return $this->response_require_request_uri_registration;
    }

    /**
     * @return mixed
     */
    public function getResponseOpPolicyUri()
    {
        $this->response_op_policy_uri = $this->getResponseData()->op_policy_uri;
        return $this->response_op_policy_uri;
    }

    /**
     * @return mixed
     */
    public function getResponseOpTosUri()
    {
        $this->response_op_tos_uri = $this->getResponseData()->op_tos_uri;
        return $this->response_op_tos_uri;
    }


    public function setCommand()
    {
        $this->command = 'discovery';
    }

    public function setParams()
    {
        $this->params = array(
            "discovery_url" => $this->getRequestDiscoveryUrl()
        );
    }

}
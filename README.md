<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div id="dokuwiki__site">

    <div id="dokuwiki__top" class="dokuwiki site mode_show  ">
        <div class="">
            <div class="pad group">
                <div class="page group">
                    <!-- wikipage start -->

                    <h1>
                        <a id="user-content-oxd-php" class="anchor" href="#oxd-php" aria-hidden="true"><span class="octicon octicon-link"></span></a>oxd-php
                    </h1>
                    <p>Need to download and install gluu server in Your web server. For more information <a target="_blank" href="http://www.gluu.org/docs/">click me</a>.</p>
                    <p>Need to download and install OXD server in Your web server. For more information <a target="_blank" href="http://ox.gluu.org/doku.php?id=oxd:rp">click me</a>.</p>
                    <p>For OXD server configuration <a target="_blank" href="http://ox.gluu.org/doku.php?id=oxd:home&s[]=mvn">click me</a>. </p>
                    <p>PHP Client Library for the <a target="_blank" href="https://github.com/GluuFederation/oxd-php">Gluu oxD Server</a>.</p>
                    <h2 class="sectionedit5" id="oxd_server_configuration">oxd-php configuration</h2>
                    <div class="level2">

                        <p>
                            Configuration file is located in �oxd-php/oxd-configuration.json� file in distribution package.
                        </p>

                        <p>
                            (Save this as a file called <code>oxd-configuration.json</code>)
                        </p>
                        <dl class="file">
                            <dt>
                                <a href="/doku.php?do=export_code&amp;id=oxd:home&amp;codeblock=2" title="Download Snippet" class="mediafile mf_json">oxd-configuration.json</a></dt>
                            <dd><pre class="code file json">{
  "ip": "127.0.0.1",
  "port":8099,
  "gluuServerUrl":"",
  "amHost":"",
  "userId":"",
  "userSecret":"",
  "clientId":"",
  "clientSecret":"",
  "clientRedirectURL":"",
  "logoutRedirectUrl":"",
  "appType":"",
  "license_server_endpoint":"",
  "license_id":"",
  "license_check_period_in_hours": "",
  "public_key":"",
  "public_password":"",
  "license_password":""
}</pre>
                            </dd></dl>
                        <ul>
                            <li class="level1"><div class="li"> port - port of oxd socket</div>
                            </li>
                            <li class="level1"><div class="li"> ip - flag to restrict communication to localhost only (if false then it's not restricted to localhost only)</div>
                            </li>
                        </ul>

                    </div>
                    <div class="level1">
                        <p>
                            <strong>Goal</strong> :
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> It should be super simple to use library (
                                    <a href="https://github.com/GluuFederation/oxd-python" target="_blank">python</a>&nbsp;&nbsp;/&nbsp;&nbsp;
                                    <a href="https://github.com/GluuFederation/oxd-php">php</a>) by web
                                    <span class="search_hit">site</span>
                                </div>
                            </li>
                            <li class="level1"><div class="li"> implementation of new library (on any language) should be simplified</div>
                            </li>
                        </ul>

                        <p>
                            <a href="http://ox.gluu.org/lib/exe/detail.php?id=oxd%3Arp&amp;media=oxd:oxd-rp.png" class="media" title="oxd:oxd-rp.png">
                                <img src="http://ox.gluu.org/lib/exe/fetch.php?media=oxd:oxd-rp.png" class="media" alt=""></a>
                        </p>

                    </div>
                    <h2 class="sectionedit2" id="web_site">Web <span class="search_hit">site</span></h2>
                    <div class="level2">

                        <p>
                            Web <span class="search_hit">site</span> communicates with oxd via library (python/php). Library must provide all convenient methods to web <span class="search_hit">site</span> code which will in background call oxd. Concrete library depends on programming language used by <span class="search_hit">site</span>. Here for simplicity we will PHP as sample.
                        </p>

                        <p>
                            First of all web <span class="search_hit">site</span> must <span class="search_hit">register</span> itself on oxd with registration command (via library (
                            <a href="https://github.com/GluuFederation/oxd-python" target="_blank">python</a>&nbsp;&nbsp;/&nbsp;&nbsp;
                            <a href="https://github.com/GluuFederation/oxd-php">php</a>). With registration it gets oxd_id from oxd server. oxd_id must be passed to all commands.
                        </p>

                        <p>
                            Web <span class="search_hit">site</span> configuration:
                        </p>
<pre class="code">   oxd_address : localhost:8090
   oxd_id : 6F9619FF-8B86-D011-B42D-00CF4FC964FF</pre>

                        <p>
                            oxd_id (6F9619FF-8B86-D011-B42D-00CF4FC964FF) - GUID for web <span class="search_hit">site</span>. It can be any GUID that does not exist yet in oxd.
                        </p>

                    </div>
                    <p>
                        <strong>oxd-php</strong>
                        is a thin wrapper around the communication protocol of oxD server.
                        This can be used to access the OpenID connect &amp;
                        UMA Authorization end points of the Gluu Server via the oxD RP.
                        This library provides the function calls required by a website to access user information from a OpenID Connect Provider (OP) by using the OxD as the Relying Party (RP).
                    </p>
                    <div class="level2">

                        <p>
                            PHP classes for comunicating with oxd.
                        </p>
                        <p>
                            Connecting to oxd server is doing via class Client_Socket_OXD <a href="#Client_Socket_OXD" title="oxd:communication_protocol ?" class="wikilink1">Client_Socket_OXD.php</a>
                        </p>
                        <h3 class="sectionedit100" id="Client_Socket_OXD">Client_Socket_OXD.php</h3>

                        <div class="level100">
                            <p>
                                Client_Socket_OXD class is base class for connecting to oxd server. It is given all parameters from oxd-configuration.json for connection and parameters saving to static values in class Oxd_config
                                <a href="#Oxd_config" title="oxd:communication_protocol ?" class="wikilink1">Oxd_config.php</a></div>.
                            </p>
                            <ul>
                                <li class="level1">
                                    <div class="li"> <h4>Parameter:</h4></div>
                                    <ul>
                                        <li>
                                            <h4>Name: $socket;</h4>
                                            <p>Type: static object;</p>
                                            <p>Default value = null;</p>
                                            <p>Description: oxd socket connection;</p>
                                        </li>
                                    </ul>
                                </li>
                                <li class="level1">
                                    <div class="li"><h4> Functions:</h4></div>
                                    <ul>
                                        <li>
                                            <h4>Name: static_variables;</h4>
                                            <p>Description: Setting configurations static parameters;</p>
                                        </li>
                                        <li>
                                            <h4>Name: oxd_socket_connection;</h4>
                                            <p>Description: Setting configurations to oxd socket;</p>
                                        </li>
                                        <li>
                                            <h4>Name: oxd_socket_request;</h4>
                                            <p>Description: Sending request to oxd server;</p>
                                        </li>
                                        <li>
                                            <h4>Name: oxd_socket_request;</h4>
                                            <p>Description: Getting response from oxd server;</p>
                                        </li>
                                        <li>
                                            <h4>Name: disconnect;</h4>
                                            <p>Description: Disconnecting open socket;</p>
                                        </li>
                                        <li>
                                            <h4>Name: error_message;</h4>
                                            <p>Description: Showing last error message;</p>
                                        </li>
                                        <li>
                                            <h4>Name: log;</h4>
                                            <p>Description: Saving process in log file every day(example logs/oxd-php-server-{date}.log);</p>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <h3 class="sectionedit100" id="Oxd_config">Oxd_config.php</h3>
                    <div class="level100">
                    <pre class="code">
class Oxd_config
{
    public static $localhostIp;
    public static $localhostPort;
    public static $gluuServerUrl;
    public static $amHost;
    public static $userId;
    public static $userSecret;
    public static $clientId;
    public static $clientSecret;
    public static $clientRedirectURL;
    public static $logoutRedirectUrl;
    public static $discoveryUrl;
    public static $umaDiscoveryUrl;
    public static $appType;
}
                        </pre>
                        </div>
                        <p>
                            Base class for protocols is abstract Client_OXD.php, for which extends all protocols classes. <a href="#client_oxd" title="oxd:communication_protocol ?" class="wikilink1">Client_OXD</a>
                        </p>
                        <ul>
                            <li class="level1"><div class="li"> <a href="#register_client" title="oxd:communication_protocol ?" class="wikilink1">Register_client.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#client_read" title="oxd:communication_protocol ?" class="wikilink1">Client_read.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#obtain_pat" title="oxd:communication_protocol ?" class="wikilink1">Obtain_pat.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#obtain_aat" title="oxd:communication_protocol ?" class="wikilink1">Obtain_aat.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#register_resource" title="oxd:communication_protocol ?" class="wikilink1">Register_resource.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#check_status_of_rpt" title="oxd:communication_protocol ?" class="wikilink1">Rpt_status.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#check_status_of_id_token" title="oxd:communication_protocol ?" class="wikilink1">Id_token_status.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#check_status_of_access_token" title="oxd:communication_protocol ?" class="wikilink1">Access_token_status.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#register_permission_ticket" title="oxd:communication_protocol ?" class="wikilink1">Register_ticket.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#discovery" title="oxd:communication_protocol ?" class="wikilink1">Discovery.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#authorization_code_flow" title="oxd:communication_protocol ?" class="wikilink1">Authorization_code_flow.php</a></div>
                            </li>
                        </ul>

                    <h3 class="sectionedit100" id="client_oxd">Clinet_OXD.php</h3>

                    <div class="level100">
                        <p>
                            Client_oxd class is abstract class,which extends from Client_Socket_OXD class.
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Name: $command_types;</h4>
                                        <p>Type:array;</p>
                                        <p>Default value = array(
                                            'register_client', 'client_read', 'obtain_pat', 'obtain_aat',
                                            'obtain_rpt', 'authorize_rpt', 'register_resource', 'rpt_status',
                                            'id_token_status', 'access_token_status', 'register_ticket', 'discovery',
                                            'authorization_code_flow', 'get_authorization_url', 'get_tokens_by_code',
                                            'get_user_info', 'register_site',;</p>
                                        <p>Description: all protocol names. need for checking protocol type;</p>
                                    </li>
                                    <li>
                                        <h4>Name: $command;</h4>
                                        <p>Type:string;</p>
                                        <p>Default value = null;</p>
                                        <p>Description: request command to oxd;</p>
                                    </li>
                                    <li>
                                        <h4>Name: $resp_json;</h4>
                                        <p>Type:string(json);</p>
                                        <p>Default value = null;</p>
                                        <p>Description: response, which coming from oxd;</p>
                                    </li>
                                    <li>
                                        <h4>Name: $resp_object;</h4>
                                        <p>Type:array;</p>
                                        <p>Default value = null;</p>
                                        <p>Description: response object, which parsed from $resp_json;</p>
                                    </li>
                                    <li>
                                        <h4>Name: $resp_status;</h4>
                                        <p>Type:string;</p>
                                        <p>Default value = null;</p>
                                        <p>Description: response status, can be Ok or Error;</p>
                                    </li>
                                    <li>
                                        <h4>Name: $data;</h4>
                                        <p>Type:array;</p>
                                        <p>Default value = null;</p>
                                        <p>Description: response data;</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Name: setCommand;</h4>
                                        <p>Type:abstract;</p>
                                        <p>Param:string;</p>
                                        <p>Description: Setting protocol type;</p>
                                    </li>
                                    <li>
                                        <h4>Name: getCommand;</h4>
                                        <p>Return:string;</p>
                                        <p>Description: Getting protocol type;</p>
                                    </li>
                                    <li>
                                        <h4>Name: setParams;</h4>
                                        <p>Type:abstract;</p>
                                        <p>Param:array;</p>
                                        <p>Description: Setting params for protocol;</p>
                                    </li>
                                    <li>
                                        <h4>Name: getParams;</h4>
                                        <p>Return:array;</p>
                                        <p>Description: Getting  params for protocol;</p>
                                    </li>
                                    <li>
                                        <h4>Name: getData;</h4>
                                        <p>Return:array;</p>
                                        <p>Description: Getting data for sanding to oxd;</p>
                                    </li>
                                    <li>
                                        <h4>Name: is_JSON;</h4>
                                        <p>Param:string;</p>
                                        <p>Description: Chaking is string is json;</p>
                                    </li>
                                    <li>
                                        <h4>Name: request;</h4>
                                        <p>Description: Sanding request to oxd;</p>
                                    </li>
                                    <li>
                                        <h4>Name: getRespJSON;</h4>
                                        <p>Return:string;</p>
                                        <p>Description: Getting response from oxD server, returning JSON object;</p>
                                    </li>
                                    <li>
                                        <h4>Name: getRespObject;</h4>
                                        <p>Return:array;</p>
                                        <p>Description: Getting response from oxD server, returning array object;</p>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <h3 class="sectionedit100" id="register_client">Register_client.php</h3>

                    <div class="level100">

                        <p>
                            Register_client class extends from Clinet_OXD class, which _constructor accept parent _constructor params .
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request register_client protocol;</h4>
                                        <p>$req_discoveryUrl, $req_redirectUrl, $req_logout_redirect_url, $req_client_name, $req_resp_types, $req_app_type, $req_grant_types, $req_contacts, $req_jwks_uri;</p>
                                        <p>Type:string;</p>
                                        <p>Default value = null;</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>$resp_client_id, $resp_client_secret, $resp_registration_access_token, $resp_client_secret_expires_at, $resp_registration_client_uri, $resp_client_id_issued_at;</p>
                                        <p>Type:string;</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Register_client_test:
require_once_once '../Register_Client.php';

$register_client = new Register_client();

$register_client->setReqDiscoveryUrl("https://ce.gluu.info/.well-known/openid-configuration");
$register_client->setReqRedirectUrl("https://rs.gluu.info/cb");
$register_client->setReqLogoutRedirectUrl("https://rs.gluu.info/cb2");
$register_client->setReqClientName("Vlad");
$register_client->setReqResponseTypes("code id_token token");
$register_client->setReqAppType("web");
$register_client->setReqGrantTypes("authorization_code implicit");
$register_client->setReqContacts("mike@gluu.org, vlad@gluu.org");
$register_client->setReqJwksUri("https://ce.gluu.info/jwks");

$register_client->request();

echo $register_client->getRespStatus();
print_r($register_client->getRespData());
print_r($register_client->getRespObject());
print_r($register_client->getRespJSON());

echo $register_client->getRespClientId();
echo $register_client->getRespClientSecret();
echo $register_client->getRespRegistrationAccessToken();
echo $register_client->getRespClientSecretExpiresAt();
echo $register_client->getRespRegistrationClientUri();
echo $register_client->getRespClientIdIssuedAt();

$register_client->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="client_read">Client_read.php</h3>

                    <div class="level100">

                        <p>
                            Client_read class extends from Clinet_OXD class, which _constructor accept parent _constructor params .
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request client_read protocol;</h4>
                                        <p>$req_registration_client_uri, $req_registration_access_token</p>
                                        <p>Type:string;</p>
                                        <p>Default value = null;</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>$resp_client_id, $resp_client_secret, $resp_registration_access_token, $resp_client_secret_expires_at, $resp_registration_client_uri, $resp_client_id_issued_at</p>
                                        <p>Type:string;</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Client_read_test:
require_once '../Client_read.php';

$client_read = new Client_read();
$client_read->setReqRegistrationClientUri('https://ce.gluu.info/oxauth/seam/resource/restv1/oxauth/register?client_id=@!EDFB.879F.2DAE.D95A!0001!0442.B31E!0008!778C.9634');
$client_read->setReqRegistrationAccessToken('8117eacd-8095-45cc-b637-a5822ee82d80');

$client_read->request();

echo $client_read->getRespStatus();

print_r($client_read->getRespData());
print_r($client_read->getRespObject());
print_r($client_read->getRespJSON());

echo $client_read->getRespClientId();
echo $client_read->getRespClientIdIssuedAt();
echo $client_read->getRespClientSecret();
echo $client_read->getRespClientSecretExpiresAt();
echo $client_read->getRespRegistrationAccessToken();
echo $client_read->getRespRegistrationClientUri();

$client_read->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="Obtain_trait">Obtain_trait.php</h3>

                    <div class="level100">

                        <p>
                            Obtain_trait is a trait  .
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request obtain_pat, obtain_aat protocol;</h4>
                                        <p>$req_discovery_url, $req_uma_discovery_url, $req_redirect_url, $req_client_id, $req_client_secret, $req_user_id, $req_user_secret</p>
                                        <p>Type:string;</p>
                                        <p>Default value = null;</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>$resp_expires_in_seconds, $resp_authorization_code, $resp_scope</p>
                                        <p>Type:string;</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>

                    <h3 class="sectionedit100" id="obtain_pat">Obtain_pat.php</h3>

                    <div class="level100">

                        <p>
                            Obtain_pat class extends from Clinet_OXD class, which _constructor accept parent _constructor params .
                        </p>
                        <p>
                            Obtain_pat class use <a href="#Obtain_trait">Obtain_trait.php</a> .
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request obtain_pat protocol;</h4>
                                        <p>Obtain_trait request parameters;</p>
                                        <p>Type:string;</p>
                                        <p>Default value = null;</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Obtain_trait response parameters $req_registration_client_uri, $req_registration_access_token;</p>
                                        <p>Type:string;</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Obtain_pat_test:
require_once '../Obtain_pat.php';

$obtain_pat = new Obtain_pat();

$obtain_pat->setReqDiscoveryUrl("https://ce.gluu.info/.well-known/openid-configuration");
$obtain_pat->setReqUmaDiscoveryUrl("http://ce.gluu.info/.well-known/uma-configuration");
$obtain_pat->setReqRedirectUrl("https://rs.gluu.info/cb");
$obtain_pat->setReqClientId("@!1111!0008!0068.3E20");
$obtain_pat->setReqClientSecret("32c2fb17-409d-48a2-b793-a639c8ac6cb2");
$obtain_pat->setReqUserId("vlad");
$obtain_pat->setReqUserSecret("secret");

$obtain_pat->request();

echo $obtain_pat->getRespStatus();
print_r($obtain_pat->getRespData());
print_r($obtain_pat->getRespObject());
print_r($obtain_pat->getRespJSON());

echo $obtain_pat->getRespPatToken();
echo $obtain_pat->getRespExpiresInSeconds();
echo $obtain_pat->getRespPatRefreshToken();
echo $obtain_pat->getRespAuthorizationCode();
echo $obtain_pat->getRespScope();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="obtain_aat">Obtain_aat.php</h3>

                    <div class="level100">

                        <p>
                            Obtain_aat class extends from Clinet_OXD class, which _constructor accept parent _constructor params .
                        </p>
                        <p>
                            Obtain_aat class use <a href="#Obtain_trait">Obtain_trait.php</a> .
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request obtain_aat protocol;</h4>
                                        <p>Obtain_trait request parameters;</p>
                                        <p>Type:string;</p>
                                        <p>Default value = null;</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Obtain_trait response parameters request parameters and $resp_aat_token, $resp_aat_refresh_token;</p>
                                        <p>Type:string;</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Obtain_pat_test:
require_once '../Obtain_aat.php';

$obtain_aat = new Obtain_aat();

$obtain_aat->setReqDiscoveryUrl("https://ce.gluu.info/.well-known/openid-configuration");
$obtain_aat->setReqUmaDiscoveryUrl("http://ce.gluu.info/.well-known/uma-configuration");
$obtain_aat->setReqRedirectUrl("https://rs.gluu.info/cb");
$obtain_aat->setReqClientId("@!1111!0008!0068.3E20");
$obtain_aat->setReqClientSecret("32c2fb17-409d-48a2-b793-a639c8ac6cb2");
$obtain_aat->setReqUserId("vlad");
$obtain_aat->setReqUserSecret("secret");

$obtain_aat->request();

echo $obtain_aat->getRespStatus();
print_r($obtain_aat->getRespData());
print_r($obtain_aat->getRespObject());
print_r($obtain_aat->getRespJSON());

echo $obtain_aat->getRespAatToken();
echo $obtain_aat->getRespExpiresInSeconds();
echo $obtain_aat->getRespAatRefreshToken();
echo $obtain_aat->getRespAuthorizationCode();
echo $obtain_aat->getRespScope();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="register_resource">Register_resource.php</h3>

                    <div class="level100">

                        <p>
                            Register_resource class extends from Clinet_OXD class, which _constructor accept parent _constructor params .
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request client_read protocol;</h4>
                                        <p>Type:string: $req_uma_discovery_url, $req_pat, $req_name</p>
                                        <p>Type:array: $req_scopes</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>$resp_resource_status, $resp_id, $resp_rev;</p>
                                        <p>Type:string;</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Register_resource_test:
require_once '../Register_resource.php';

$register_resource = new Register_resource();

$register_resource->setReqUmaDiscoveryUrl("https://ce.gluu.info/.well-known/uma-configuration");
$register_resource->setReqPat("eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1L");
$register_resource->setReqName("My Resource");
$register_resource->setReqScopes([
    "http://photoz.example.com/dev/scopes/view",
    "http://photoz.example.com/dev/scopes/all"
]);

$register_resource->request();

echo $register_resource->getRespStatus();

print_r($register_resource->getRespData());
print_r($register_resource->getRespObject());
print_r($register_resource->getRespJSON());

echo $register_resource->getResourceResponseStatus();
echo $register_resource->getRespId();
echo $register_resource->getRespRev();

$register_resource->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="check_status_of_rpt">Rpt_status.php</h3>

                    <div class="level100">

                        <p>
                            Rpt_status class extends from Clinet_OXD class, which _constructor accept parent _constructor params .
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request rpt_status protocol;</h4>
                                        <p>Type:string: $req_uma_discovery_url, $req_pat, $req_rpt</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Type:string: $resp_active, $resp_expires_at, $resp_issued_at;</p>
                                        <p>Type:array: $resp_permissions;</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Rpt_status_test:
require_once '../Rpt_status.php';

$rpt_status = new Rpt_status();

$rpt_status->setReqUmaDiscoveryUrl("https://ce.gluu.info/.well-known/uma-configuration");
$rpt_status->setReqPat("eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0");
$rpt_status->setReqRpt("KV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1Lm9yZy9veGF1dGgvc2VhbS9yZXNvdXJjZS9yZXN0djEvb3hhd");

$rpt_status->request();

echo $rpt_status->getRespStatus();
print_r($rpt_status->getRespData());
print_r($rpt_status->getRespObject());
print_r($rpt_status->getRespJSON());

echo $rpt_status->getRespActive();
echo $rpt_status->getRespExpiresAt();
echo $rpt_status->getRespIssuedAt();
echo $rpt_status->getRespPermissions();

$rpt_status->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="check_status_of_id_token">Id_token_status.php</h3>

                    <div class="level100">

                        <p>
                            Id_token_status class extends from Clinet_OXD class, which _constructor accept parent _constructor params .
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request id_token_status protocol;</h4>
                                        <p>Type:string: $req_discovery_url, $req_id_token</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Type:string: $resp_active, $resp_expires_at, $resp_issued_at,$resp_claims(JSON);</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Id_token_status_test:
require_once '../Id_token_status.php';

$id_token_status = new Id_token_status();

$id_token_status->setReqDiscoveryUrl('https://ce.gluu.info/.well-known/openid-configuration');
$id_token_status->setReqIdToken('eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0');

$id_token_status->request();

echo $id_token_status->getRespStatus();

print_r($id_token_status->getRespData());
print_r($id_token_status->getRespObject());
print_r($id_token_status->getRespJSON());

echo $id_token_status->getRespActive();
echo $id_token_status->getRespExpiresAt();
echo $id_token_status->getRespIssuedAt();
echo $id_token_status->getRespClaims();

$id_token_status->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="check_status_of_access_token">Access_token_status.php</h3>

                    <div class="level100">

                        <p>
                            Access_token_status class extends from Clinet_OXD class, which _constructor accept parent _constructor params .
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request access_token_status protocol;</h4>
                                        <p>Type:string: $req_discovery_url, $req_id_token, $req_access_token</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Type:string: $resp_active, $resp_expires_at, $resp_issued_at;</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Access_token_status_test:
require_once '../Access_token_status.php';

$access_token_status = new Access_token_status();
$access_token_status->setReqDiscoveryUrl('https://ce.gluu.info/.well-known/openid-configuration');
$access_token_status->setReqIdToken('NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1Lm9yZy9veGF1dGgvc2VhbS9yZXNvdXJjZS9yZ');
$access_token_status->setReqAccessToken('KV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0dHBzOi8vc2VlZC5nbHV1Lm9yZy9veGF1dGgvc2VhbS9yZXNvdXJjZS9yZXN0djEvb3hhd');
$access_token_status->request();

echo $access_token_status->getRespStatus();

print_r($access_token_status->getRespData());
print_r($access_token_status->getRespObject());
print_r($access_token_status->getRespJSON());

echo $access_token_status->getRespActive();
echo $access_token_status->getRespExpiresAt();
echo $access_token_status->getRespIssuedAt();

$access_token_status->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="register_permission_ticket">Register_ticket.php</h3>

                    <div class="level100">

                        <p>
                            Register_ticket class extends from Clinet_OXD class, which _constructor accept parent _constructor params .
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request register_ticket protocol;</h4>
                                        <p>Type:string: $req_uma_discovery_url, $req_pat, $req_am_host, $req_rs_host, $req_resource_set_id, $req_http_method, $req_url</p>
                                        <p>Type:array: $req_scopes</p>
                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Type:string: $resp_ticket;</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Register_ticket_test:
require_once '../Register_ticket.php';

$register_ticket = new Register_ticket();

$register_ticket->setReqUmaDiscoveryUrl("https://ce.gluu.info/.well-known/uma-configuration");
$register_ticket->setReqPat("eyJ0eXAiOiJKV1MiLCJhbGciOiJSUzI1NiIsImprdSI6Imh0");
$register_ticket->setReqAmHost("ce.gluu.info");
$register_ticket->setReqRsHost("rs.gluu.org");
$register_ticket->setReqResourceSetId("1366810445313");
$register_ticket->setReqScopes([
    "http://photoz.example.com/dev/scopes/view",
    "http://photoz.example.com/dev/scopes/add"
]);
$register_ticket->setReqHttpMethod("DELETE");
$register_ticket->setReqUrl("http://example.com/object/1234");

$register_ticket->request();

echo $register_ticket->getRespStatus();
print_r($register_ticket->getRespData());
print_r($register_ticket->getRespObject());
print_r($register_ticket->getRespJSON());

echo $register_ticket->getRespTicket();

$register_ticket->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="discovery">Discovery.php</h3>

                    <div class="level100">

                        <p>
                            Discovery class extends from Clinet_OXD class, which _constructor accept parent _constructor params .
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request discovery protocol;</h4>
                                        <p>Type:string: $req_discovery_url</p>
                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Type:string: $resp_issuer, $resp_authorization_endpoint, $resp_token_endpoint, $resp_userinfo_endpoint,
                                            $resp_clientinfo_endpoint, $resp_check_session_iframe, $resp_end_session_endpoint, $resp_jwks_uri, $resp_registration_endpoint,
                                            $resp_validate_token_endpoint, $resp_federation_metadata_endpoint, $resp_federation_endpoint, $resp_id_generation_endpoint,
                                            $resp_service_documentation, $resp_claims_locales_supported, $resp_ui_locales_supported, $resp_claims_parameter_supported,
                                            $resp_req_parameter_supported, $resp_req_uri_parameter_supported, $resp_require_req_uri_registration,
                                            $resp_op_policy_uri, $resp_op_tos_uri;</p>
                                        <p>Type:array: $resp_scopes_supported, $resp_types_supported, $resp_grant_types_supported, $resp_subject_types_supported;</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Discovery_test:
require_once '../Discovery.php';
$discovery = new Discovery();
$discovery->setReqDiscoveryUrl('https://ce.gluu.info/.well-known/openid-configuration');
$discovery->request();

echo $discovery->getRespStatus();

print_r($discovery->getRespData());
print_r($discovery->getRespObject());
print_r($discovery->getRespJSON());

echo $discovery->getRespIssuer();
echo $discovery->getRespTokenEndpoint();
echo $discovery->getRespUserinfoEndpoint();
echo $discovery->getRespClientinfoEndpoint();
echo $discovery->getRespCheckSessionIframe();
echo $discovery->getRespEndSessionEndpoint();
echo $discovery->getRespJwksUri();
echo $discovery->getRespRegistrationEndpoint();
echo $discovery->getRespValidateTokenEndpoint();
echo $discovery->getRespFederationMetadataEndpoint();
echo $discovery->getRespFederationEndpoint();
echo $discovery->getRespIdGenerationEndpoint();
print_r($discovery->getRespScopesSupported());
print_r($discovery->getRespTypesSupported());
print_r($discovery->getRespGrantTypesSupported());
print_r($discovery->getRespSubjectTypesSupported());
print_r($discovery->getRespServiceDocumentation());
print_r($discovery->getRespClaimsLocalesSupported());
print_r($discovery->getRespUiLocalesSupported());
echo $discovery->getRespClaimsParameterSupported();
echo $discovery->getRespRequestParameterSupported();
echo $discovery->getRespRequestUriParameterSupported();
echo $discovery->getRespRequireRequestUriRegistration();
echo $discovery->getRespOpPolicyUri();
echo $discovery->getRespOpTosUri();

$discovery->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="authorization_code_flow">Authorization_code_flow.php</h3>

                    <div class="level100">

                        <p>
                            Authorization_code_flow class extends from Clinet_OXD class, which _constructor accept parent _constructor params .
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request authorization_code_flow protocol;</h4>
                                        <p>Type:string: $req_discovery_url, $req_redirect_url, $req_client_id, $req_client_secret, $req_user_id, $req_user_secret, $req_scope, $req_nonce, $req_acr</p>
                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Type:string: $resp_access_token, $resp_expires_in_seconds, $resp_id_token, $resp_refresh_token, $resp_authorization_code, $resp_scope;</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Authorization_code_flow_test:
require_once '../Authorization_code_flow.php';

$authorization_code_flow = new Authorization_code_flow();
$authorization_code_flow->setReqDiscoveryUrl("https://ce.gluu.info/.well-known/openid-configuration");
$authorization_code_flow->setReqRedirectUrl("https://rs.gluu.info/cb1");
$authorization_code_flow->setReqClientId("@!DDB8.4688.02CB.F371!0001!F279.92D9");
$authorization_code_flow->setReqClientSecret("32c2fb17-409d-48a2-b793-a639c8ac6cb2");
$authorization_code_flow->setReqUserId("admin");
$authorization_code_flow->setReqUserSecret("secret");
$authorization_code_flow->setReqScope("openid email");
$authorization_code_flow->setReqNonce("409d-48a2-b793");
$authorization_code_flow->setReqAcr('basic');

$authorization_code_flow->request();

echo $authorization_code_flow->getRespStatus();

print_r($authorization_code_flow->getRespData());
print_r($authorization_code_flow->getRespObject());
print_r($authorization_code_flow->getRespJSON());

echo $authorization_code_flow->getRespAccessToken();
echo $authorization_code_flow->getRespExpiresInSeconds();
echo $authorization_code_flow->getRespIdToken();
echo $authorization_code_flow->getRespRefreshToken();
echo $authorization_code_flow->getRespAuthorizationCode();
echo $authorization_code_flow->getRespScope();

$authorization_code_flow->disconnect();
                        </pre>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
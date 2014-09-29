<?php

	/**
	 * autoloader
	 */
	function __autoload( $class_name ) {
		$include_path = str_replace( array( '\\', '_', '..', '.' ), array( '/' ), $class_name );
		include $include_path . '.php';
	}

	/**
	 * get config
	 */
	$config_file = __DIR__ . '/../config/config.ini';

	if ( !file_exists( $config_file ) ) {
		echo
			'no <code>config.ini</code> file found.<br />' .
			'copy the <code>config/config.ini.sample</code> to <code>config/config.ini</code>.<br />' .
			'replace the values in the file as appropriate.';

		exit();
	}

	$config = parse_ini_file( __DIR__ . '/../config/config.ini' );

	/**
	 * get token
	 */
	$Curl = new Php\Curl();

	try {

		$response_json = $Curl->post(
			'https://datamarket.accesscontrol.windows.net/v2/OAuth2-13/',
			array(
				'client_id' => $config['client-id'],
				'client_secret' => $config['client-secret'],
				'scope' => 'http://api.microsofttranslator.com',
				'grant_type' => 'client_credentials'
			),
			true
		);

		$response_headers = $Curl->getCurlInfo();

		// Array	(
		//  [token_type] => http://schemas.xmlsoap.org/ws/2009/11/swt-token-profile-1.0
		//  [access_token] => http%3a%2f%2fschemas.xmlsoap.org%2fws%2f2005%2f05%2fidentity%2fclaims%2fnameidentifier=MyTestApp&http%3a%2f%2fschemas.microsoft.com%2faccesscontrolservice%2f2010%2f07%2fclaims%2fidentityprovider=https%3a%2f%2fdatamarket.accesscontrol.windows.net%2f&Audience=http%3a%2f%2fapi.microsofttranslator.com&ExpiresOn=1411783839&Issuer=https%3a%2f%2fdatamarket.accesscontrol.windows.net%2f&HMACSHA256=TILzaJCmZ1Bo3iy2ZXJ%2be5Qm%2bMOsQqRojOkvIgQs1R8%3d
		//  [expires_in] => 599
		//  [scope] => http://api.microsofttranslator.com
		// )
		$response_as_array = json_decode( $response_json, true );

		// Array (
		//  [0] => http://schemas.xmlsoap.org/ws/2005/05/identity/claims/nameidentifier=MyTestApp
		//  [1] => http://schemas.microsoft.com/accesscontrolservice/2010/07/claims/identityprovider=https://datamarket.accesscontrol.windows.net/
		//  [2] => Audience=http://api.microsofttranslator.com
		//  [3] => ExpiresOn=1411784004
		//  [4] => Issuer=https://datamarket.accesscontrol.windows.net/
		//  [5] => HMACSHA256=oXTRwuN8M83uqWb+8oLv+2wyUyZsO8IEXG4QQ6A7jWE=
		// )
		$access_token_as_array = explode( '&', urldecode( $response_as_array['access_token'] ) );

		$access_token_as_key_value = array();

		foreach( $access_token_as_array as $item ) {
			$pieces = explode( '=', $item, 2 );
			$access_token_as_key_value[ $pieces[0] ] = $pieces[1];
		}

		// Array (
		//	[http://schemas.xmlsoap.org/ws/2005/05/identity/claims/nameidentifier] => MyTestApp
		//	[http://schemas.microsoft.com/accesscontrolservice/2010/07/claims/identityprovider] => https://datamarket.accesscontrol.windows.net/
		//	[Audience] => http://api.microsofttranslator.com
		//	[ExpiresOn] => 1411785408
		//	[Issuer] => https://datamarket.accesscontrol.windows.net/
		//	[HMACSHA256] => eaGCOcjECyFh+ICrDkLBe2EjUqNQ/C6D8I+2KHTTKCY=
		// )
		$access_token_as_json = json_encode( $access_token_as_key_value );

	} catch( Exception $e ) {

	}

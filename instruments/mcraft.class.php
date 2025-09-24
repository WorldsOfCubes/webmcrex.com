<?php
class Minecraft_API_Exception extends Exception {
	protected $message = '';
	protected $code = '';

	public function __construct($message, $code = '') {
		parent::__construct($message);
		$this->code = $code;
	}

	public function getErrorCode() {
		return $this->code;
	}

	public function __toString() {
		return 'API Error [' . $this->code . ']: ' . $this->message;
	}
}

class Minecraft_API_Auth {
	const SERVER = 'https://authserver.mojang.com/';
	const CLIENT_TOKEN = 'cc895124-e94b-416d-8c55-bc0888af2ab9';

	const ERROR_METHOD_NOT_ALLOWED = 'Method Not Allowed';
	const ERROR_NOT_FOUND = 'Not Found';
	const ERROR_FORBIDDEN_OPERATION_EXCEPTION = 'ForbiddenOperationException';
	const ERROR_ILLEGAL_ARGUMENT_EXCEPTION = 'IllegalArgumentException';
	const ERROR_UNSUPPORTED_MEDIA_TYPE = 'Unsupported Media Type';
	public $mcUsername;

	public function request($entryPoint, $body) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, self::SERVER . $entryPoint);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_FAILONERROR, false);
		$response = curl_exec($curl);

		if (curl_getinfo($curl, CURLINFO_HTTP_CODE) == 204) {
			// Ok, empty response
			$response = "{}";
		} else if (!$response) {
			throw new Exception('Request to server failed: ' . curl_error($curl));
		}

		curl_close($curl);

		$response = json_decode($response, true);

		if ($response === null) {
			throw new Exception('Request to server failed: unable to parse response as JSON.');
		} else if (array_key_exists('error', $response)) {
			throw new Minecraft_API_Exception($response['errorMessage'], $response['error']);
		}

		return $response;
	}

	public function authenticate($login, $password) {
		$response = $this->request('authenticate', array(
			'agent' => array('name' => 'Minecraft', 'version' => 1),

			'username' => $login,
			'password' => $password,

			'clientToken' => self::CLIENT_TOKEN,
		));

		if (array_key_exists('accessToken', $response)) {
			$this->mcUsername = $response['selectedProfile']['name'];
			return $response['accessToken'];
		} else {
			return null;
		}
	}

	public function invalidate($accessToken) {
		return $this->request('invalidate', array(
				'accessToken' => $accessToken,
				'clientToken' => self::CLIENT_TOKEN,
			)) === array();
	}

	public function verifyCredentials($login, $password) {
		try {
			if ( ($accessToken = $this->authenticate($login, $password)) !== null ) {
				$this->invalidate($accessToken);
				return true;
			} else {
				return false;
			}
		} catch (Minecraft_API_Exception $e) {
			if ($e->getErrorCode() == self::ERROR_FORBIDDEN_OPERATION_EXCEPTION) {
				return false;
			}
		}
	}
}
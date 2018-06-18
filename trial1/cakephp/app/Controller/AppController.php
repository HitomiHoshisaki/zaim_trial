<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    function __construct($request, $response) {
		parent::__construct($request, $response);

		App::import('Vendor', 'Consumer', array('file' => 'HTTP/OAuth/Consumer.php'));

		# 使用者情報
		$server = $_SERVER['SERVER_NAME'];
		# AWS
		if($server === '13.114.178.205') {
			$consumer_key = 'b26c1fd054b32e13367ec0b16069c9eeaa0921cd';
			$consumer_secret = '71837cdca589d56ec6cc20c87d5a6bc4d4f2b9b7';
		# Vagrant	
		} elseif($server === '192.168.33.10') {
			$consumer_key = '525532a11791b3e1020578eea0a38c9107661c55';
			$consumer_secret = '3fb57014ff9978879cabf860ba1a6e0ac5979dbd';
		# localhost
		} else { 
			$consumer_key = 'b69a26665aacd6731e6a4051cb397e548fd1bce8';
			$consumer_secret = '88e1af266f5d6eb4b8e5ee41aa58d3c94587a12a';	
		}

        # 初期化
        $this->set('title_for_layout', 'シンプル家計簿');
		$this->oauth = new HTTP_OAuth_Consumer($consumer_key, $consumer_secret);
		$this->accept_ssl();
    }

    /**
	 * SSL通信を可能にする
	 */
	private function accept_ssl() {
		$http_request = new HTTP_Request2();
		$http_request->setAdapter('curl');
		$http_request->setConfig('ssl_verify_peer', false);
		$consumer_request = new HTTP_OAuth_Consumer_Request;
		$consumer_request->accept($http_request);
		$this->oauth->accept($consumer_request);
	}
}

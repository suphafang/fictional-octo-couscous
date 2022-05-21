<?php

    Class Encryption {
        private $secret_key = 'my@simple#secret-key234';
        private $secret_iv = 'my@simple#secret-iv345';
        private $encrypt_method = "AES-256-CBC";
        private $key;
        private $iv;

        public function __construct() {
            $this->key = hash('sha256', $this->secret_key);
            $this->iv = substr(hash( 'sha256', $this->secret_iv ), 0, 16);
        }
        public function encrypt(string $text) {
            return base64_encode(openssl_encrypt(substr(md5(microtime()),-1) . $text, $this->encrypt_method, $this->key, 0, $this->iv));
        }
        public function decrypt(string $hash) {
            return substr(openssl_decrypt( base64_decode($hash), $this->encrypt_method, $this->key, 0, $this->iv), 1);
        }
    }

?>
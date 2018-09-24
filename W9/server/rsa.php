<?php

function get_rsa_publickey($filename){
	return openssl_pkey_get_public('file://'.$filename);
}
function get_rsa_privatekey($filename){
	return openssl_pkey_get_private('file://'.$filename);
}
function rsa_encryption($plaintext, $publicKey){
	openssl_public_encrypt($plaintext, $encrypted, $publicKey);
	openssl_free_key($publicKey);
	return base64_encode($encrypted);
}
function rsa_decryption($encrypted, $privateKey){
	openssl_private_decrypt(base64_decode($encrypted), $decrypted, $privateKey);
	openssl_free_key($privateKey);
	return $decrypted;
}

?>
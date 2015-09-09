<?php

/**
 * it's a very simple gpg decrypt code
 *
 * just run this in shell:
 *
 * 		php sample.php
 *
 */

ini_set('display_errors','On');
error_reporting(E_ALL^E_NOTICE^E_WARNING);

require_once 'GPG.php';
require_once 'GPGAbstract.php';


$your_gpg_encrypted_file = 'your_gpg_encrypted_file_location';
$your_user_key = 'your_user_key';
$your_passphrase = 'your_passphrase';


$gpg = new Crypt_GPG();

//导入私钥
$key = getKey();
$gpg->importKey($key);

//指定解密私钥和解密私钥的密码
$gpg->addDecryptKey($your_user_key,$your_passphrase);

//需要解密的文件
$encrypted = file_get_contents($your_gpg_encrypted_file);

//执行解密动作
$data = $gpg->decrypt($encrypted);

var_dump($data);exit;


function getKey(){
	return "-----BEGIN PGP PRIVATE KEY BLOCK-----
Version: GnuPG v1.4.7 (MingW32)


your encrypted private key

should be some of letters and numbers

paste it right in here.


-----END PGP PRIVATE KEY BLOCK-----";
	}

<?php

namespace App\Common\Util;


class CryptUtil
{
    public static function encodeRSAPublicKey($string, $publicKey)
    {
        $pubKey = openssl_pkey_get_public($publicKey);
        openssl_public_encrypt($string, $encrypted, $pubKey);

        return base64_encode($encrypted);
    }

    public static function decodeRSAPrivateKey($string, $privateKey)
    {
        $privKey = openssl_pkey_get_private($privateKey);
        openssl_private_decrypt(base64_decode($string), $decrypted, $privKey);

        return $decrypted;
    }

    public static function encodeRSAPrivateKey($string, $privateKey)
    {
        $privKey = openssl_pkey_get_private($privateKey);
        openssl_private_encrypt($string, $encrypted, $privKey);
        return base64_encode($encrypted);
    }

    public static function decodeRSAPublicKey($string, $publicKey)
    {
        $pubKey = openssl_pkey_get_public($publicKey);
        openssl_public_decrypt(base64_decode($string), $decrypted, $pubKey);
        return $decrypted;
    }

}
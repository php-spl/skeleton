<?php

namespace App\Auth;

use Web\Security\Hash;

use function parse_url;

class HMACService 
{
    public static function parseUrl($src)
    {
        $source = parse_url($src);

        if($source) {
            $target['url'] = $source['scheme']. '://' .$source['host'].$source['path'];
            $target['host'] = $source['host'];
            return $target;
        }
        return false;
    }

    public static function validate($user_id, $user_name, $key)
    {
        if($user_id && $user_name && $key) {
            $hmac['user_id'] = $user_id;
            $hmac['user_name'] = urlencode($user_name);
            $hmac['key'] = $key;
            $hmac['sig'] = Hash::make($hmac['user_id']  .  $hmac['user_name'], $hmac['key']);
            return $hmac;
        }
        return false;
    }
}
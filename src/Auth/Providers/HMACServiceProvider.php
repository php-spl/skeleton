<?php

namespace App\Auth\Providers;

use Web\Security\Hash;

use App\Host\Models\Host;

use function parse_url;
use function session;

class HMACServiceProvider 
{
    protected static $auth;

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

    public static function register($src, $user_id, $user_name)
    {
        $target = self::parseUrl($src);
        $host = Host::factory()->getHost($target['host']);

         // Generate signature from authentication info + secret key
        if($target && $host) {
            $hmac['user_id'] = $user_id;
            $hmac['user_name'] = urlencode($user_name);
            $hmac['key'] = $host->secret;
            $hmac['sig'] = Hash::make($hmac['user_id']  .  $hmac['user_name'], $hmac['key']);
            return $target['url'] . "?auth=hmac&src={$target['url']}&user_id={$hmac['user_id']}&user_name={$hmac['user_name']}&sig={$hmac['sig']}";
        }
        
        return false;
    }

    public static function login($src, $user_id, $user_name, $sig)
    {
        if($user_id) {
            $target = self::parseUrl($src);
            $host = Host::factory()->getHost($target['host']);

            if(!$host) {
                return false;
            }

            // See if they have the right signature
            $user = $user_id . $user_name . $host->secret;
            $hmac = Hash::equals($user, $sig);

            if($hmac) {
                if(session()->has('user')) {
                    session()->delete('user');
                }
                session()->set('user', $user_id);
                return true;
            } else {
                session()->set('error', 'Error in SSO login!');
                return false;
            }
        }
        return false;
    }
}
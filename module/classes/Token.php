<?php

class Token {
    public static function generate($sessionName = null) {
        return Session::put($sessionName, md5(uniqid()));
    }

    public static function check($token, $tokenName) {

        if(Session::exists($tokenName) && $token === Session::get($tokenName)) {
            Session::delete($tokenName);
            return true;
        }

        return false;
    }
}
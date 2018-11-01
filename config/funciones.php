<?php

function obtenerIP() {
    if ($_SERVER["HTTP_X_FORWARDED_FOR"]) {
        if ($pos = strpos($_SERVER["HTTP_X_FORWARDED_FOR"], " ")) {
            $ip_local = substr($_SERVER["HTTP_X_FORWARDED_FOR"], 0, $pos) . " - IP Pública: " . substr($_SERVER["HTTP_X_FORWARDED_FOR"], $pos + 1);
            return $ip_local;
        } else {
            $ip_publica = $_SERVER["HTTP_X_FORWARDED_FOR"];
            return $ip_publica;
        }
    } else {
        $ip_publica = $_SERVER["REMOTE_ADDR"];
        return $ip_publica;
    }
}

function obtenDNS() {
    $dns = $_SERVER['HTTP_USER_AGENT'];
    return $dns;
}

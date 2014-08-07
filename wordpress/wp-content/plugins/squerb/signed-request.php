<?php
class Signed_Request {

    private $secret;

    function __construct($secret) {
        $this->secret = $secret;
    }

    /**
     * Base64 url encode a string:
     * NO padding, '=' is stripped
     * + is replaced by -
     * / is replaced by _
     */
    function base64_url_encode($input) {
        return trim(strtr(base64_encode($input), '+/=', '-_'), '=');
    }

    function signature($data) {
        return hash_hmac('sha256', $data, $this->secret);
    }

    function generateSignedRequest($data) {
        $edata = $this->base64_url_encode($data);
        $sig = $this->signature($edata);
        $esig = $this->base64_url_encode($sig);
        return "{$esig}.{$edata}";
    }
}
?>

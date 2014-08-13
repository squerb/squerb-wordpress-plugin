<?php
/**
 * Plugin Name: Squerb
 * Plugin URI: http://squerb.com
 * Description: Add a Squerb Widget to your Wordpress Site
 * Version: 1.0
 * Author: Squerb, Inc.
 * Author URI: http://squerb.com
 * License: GPL2
 *  Copyright 2014 Squerb (email : info@squerb.com)
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License, version 2, as 
 *  published by the Free Software Foundation.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

class Squerb {
    
    private $squerb_options;

    function __construct() {
        $this->squerb_options = get_option('squerb_options');
    }

    function apiHost() {
        return $this->squerb_options['api_host'];
    }

    function apiKey() {
        return $this->squerb_options['api_key'];
    }

    function apiSecret() {
        return $this->squerb_options['api_secret'];
    }

    public function squerbit($atts) {
        extract( shortcode_atts( array(
            'url' => '',
            'title' => '',
            'category' => ''
        ), $atts ) );

        return $this->squerbitButton($url, $title, $category);
    }

    function squerbitButton($url, $title, $category) {

        if (preg_match('/&squerb_category=(.*)($|&)/', $url, $matches)) {
            $category = $matches[1];
        }

        return <<<EOF
<script>
var SQUERBIT = SQUERBIT || {};
SQUERBIT.openBookmarklet = SQUERBIT.openBookmarklet || function(url, title, category) {
  SQUERBIT.url = url;
  SQUERBIT.title = title;
  SQUERBIT.category = category;
  var e=document.createElement("script");
  e.src="{$this->apiHost()}/assets/bookmarklet.js?"+Date.now();
  document.documentElement.appendChild(e);
}
</script>
<a onclick='SQUERBIT.openBookmarklet("{$url}","{$title}","{$category}")' href="javascript:void(0);">
 <img src="{$this->apiHost()}/assets/squerb-button.png" width="123" height="20" />
</a>
EOF;
    }

    public function mandala($atts) {
        extract( shortcode_atts( array(
            'url' => '',
            'title' => '',
            'category' => '',
            'topicId' => ''
        ), $atts ) );

        return $this->js("squerbit") . $this->iframe($url, $title, $category, $topicId);
    }

    function signedRequest() {
        $signed_request = new Signed_Request($this->apiSecret());

        global $current_user;
        get_currentuserinfo();

        $user_info = array(
            'id' => $current_user->ID,
            'username' => $current_user->user_login,
            'email' => $current_user->user_email,
            'first_name' => $current_user->user_firstname,
            'last_name' => $current_user->user_lastname
        );
        $json = json_encode($user_info);
        return $signed_request->generateSignedRequest($json);
    }
}

$squerb = new Squerb();

function squerb_func($atts) {
    global $squerb;
    return $squerb->squerbit($atts);
}

// Usage: [squerb_topic topic_id="t4oc"]
add_shortcode('squerbit', 'squerb_func');

function squerb_reeldeal_func($attr) {
    global $squerb;
    return $squerb->reeldeal_app();
}

include dirname(__FILE__) . '/squerb-options.php';
include dirname(__FILE__) . '/signed-request.php'

?>
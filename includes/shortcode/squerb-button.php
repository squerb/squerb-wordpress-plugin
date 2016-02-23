<?php

class ShortcodeSquerbButton {

  private $squerb_options;

  function __construct() {
    $this->squerb_options = get_option('squerb_widgets_options');
  }

  function apiKey() {
    return $this->squerb_options['api_key'];
  }

  function apiSecret() {
    return $this->squerb_options['api_secret'];
  }

  function currentUrl() {
    return apply_filters('the_permalink', get_permalink());
  }

  public function squerb_button($atts) {
    $atts = shortcode_atts( array(
      'topic_id' => '',
      'url' => $this->currentUrl(),
      ), $atts );

    return $this->squerbButtonHTMLSnippet($atts['url'], $atts['topic_id']);
  }

  function squerbButtonHTMLSnippet($url, $topic_id) {
    add_action('wp_footer', array($this, 'squerbButtonJSHook'));

    return "<div data-squerb-button='{$topic_id}'"
      . " data-url='{$url}'"
      . " data-api-key='{$this->apiSecret()}'"
      . " data-api-secret='{$this->apiSecret()}'"
      . '></div>';
  }

  function squerbButtonJSHook() {
    echo '<script src="https://widgets.squerb.com/topic_page.js"></script>';
  }
}

?>

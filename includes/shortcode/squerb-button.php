<?php

class SquerbWidgetsShortcodeSquerbButton {

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
      'page_url' => $this->currentUrl(),
      ), $atts );

    return $this->squerbButtonHTMLSnippet($atts['page_url'], $atts['topic_id']);
  }

  function squerbButtonHTMLSnippet($page_url, $topic_id) {
    add_action('wp_footer', array($this, 'squerbButtonJSHook'));

    return "<div data-squerb-button='{$topic_id}'"
      . " data-page-url='{$page_url}'"
      . " data-api-key='{$this->apiKey()}'"
      . " data-api-secret='{$this->apiSecret()}'"
      . '></div>';
  }

  function squerbButtonJSHook() {
    echo '<script src="https://widgets.squerb.com/topic_page.js"></script>';
  }
}

?>

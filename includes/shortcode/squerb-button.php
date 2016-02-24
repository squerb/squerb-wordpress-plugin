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
      'squerb_text' => '',
      'page_url' => $this->currentUrl(),
      ), $atts );

    return $this->squerbButtonHTMLSnippet(
      $atts['page_url'],
      $atts['topic_id'],
      $atts['squerb_text']
    );
  }

  function squerbButtonHTMLSnippet($page_url, $topic_id, $squerb_text) {
    wp_enqueue_script('squerb-widgets-topic-page', 'https://widgets.squerb.com/topic_page.js', array(), false, true);

    return "<div data-squerb-button='{$topic_id}'"
      . ($squerb_text ? " data-squerb-text='{$squerb_text}'" : '')
      . " data-page-url='{$page_url}'"
      . " data-api-key='{$this->apiKey()}'"
      . " data-api-secret='{$this->apiSecret()}'"
      . '></div>';
  }
}

?>

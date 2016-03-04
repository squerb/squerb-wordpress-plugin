<?php

class SquerbWidgetsShortcodeSquerbTopicBox {

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

  public function squerb_topic_box($atts) {
    $atts = shortcode_atts( array(
      'topic_id' => '',
      'tour_id' => '',
      'squerb_text' => '',
      'no_topic_page' => '',
      'show_topic_page' => '',
      'show_participants' => '',
      'show_opinions' => '',
      'api_key' => '',
      'api_secret' => '',
      'page_url' => $this->currentUrl()
      ), $atts );

    return $this->squerbTopicBoxHTMLSnippet(
      $atts['topic_id'],
      $atts['tour_id'],
      $atts['squerb_text'],
      $atts['no_topic_page'],
      $atts['show_topic_page'],
      $atts['show_participants'],
      $atts['show_opinions'],
      $atts['api_key'],
      $atts['api_secret'],
      $atts['page_url']
    );
  }

  function squerbTopicBoxHTMLSnippet($topic_id, $tour_id, $squerb_text, $no_topic_page, $show_topic_page, $show_participants, $show_opinions, $api_key, $api_secret, $page_url) {
    wp_enqueue_script('squerb-widgets-topic-page', 'https://widgets.squerb.com/topic_page.js', array(), false, true);

    return "<div data-topic-box='{$topic_id}'"
      . ($tour_id ? " data-tour-id='{$tour_id}'" : '')
      . ($squerb_text ? " data-squerb-text='{$squerb_text}'" : '')
      . ($no_topic_page ? " data-no-topic-page='{$no_topic_page}'" : '')
      . ($show_topic_page ? " data-show-topic-page='{$show_topic_page}'" : '')
      . ($show_participants ? " data-show-participants='{$show_participants}'" : '')
      . ($show_opinions ? " data-show-opinions='{$show_opinions}'" : '')
      . ($api_key ? " data-api-key='{$api_key}'" : '')
      . ($api_secret ? " data-api-secret='{$api_secret}'" : '')
      . " data-page-url='{$page_url}'"
      . '></div>';
  }
}

?>

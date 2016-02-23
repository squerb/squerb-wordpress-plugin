<?php

class SquerbWidgetsShortcodeSquerbTopicBox {

  public function squerb_topic_box($atts) {
    $atts = shortcode_atts( array(
      'topic_id' => '',
      'squerb_text' => '',
      'no_topic_page' => '',
      'show_topic_page' => '',
      'show_participants' => '',
      'show_opinions' => ''
      ), $atts );

    return $this->squerbTopicBoxHTMLSnippet(
      $atts['topic_id'],
      $atts['squerb_text'],
      $atts['no_topic_page'],
      $atts['show_topic_page'],
      $atts['show_participants'],
      $atts['show_opinions']
    );
  }

  function squerbTopicBoxHTMLSnippet($topic_id, $squerb_text, $no_topic_page, $show_topic_page, $show_participants, $show_opinions) {
    add_action('wp_footer', array($this, 'squerbTopicBoxJSHook'));

    return "<div data-topic-box='{$topic_id}'"
      . ($squerb_text ? " data-squerb-text='{$squerb_text}'" : '')
      . ($no_topic_page ? " data-no-topic-page='{$no_topic_page}'" : '')
      . ($show_topic_page ? " data-show-participants='{$show_topic_page}'" : '')
      . ($show_participants ? " data-show-participants='{$show_participants}'" : '')
      . ($show_opinions ? " data-show-opinions='{$show_opinions}'" : '')
      . '></div>';
  }

  function squerbTopicBoxJSHook() {
    echo '<script src="https://widgets.squerb.com/topic_page.js"></script>';
  }
}

?>

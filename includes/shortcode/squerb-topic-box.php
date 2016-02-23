<?php

class ShortcodeSquerbTopicBox {

  public function squerb_topic_box($atts) {
    $atts = shortcode_atts( array(
      'topic_id' => ''
      ), $atts );

    return $this->squerbButtonHTMLSnippet($atts['topic_id']);
  }

  function squerbButtonHTMLSnippet($topic_id) {
    add_action('wp_footer', array($this, 'squerbButtonJSHook'));

    return "<div data-topic-box='{$topic_id}'"
      . '></div>';
  }

  function squerbButtonJSHook() {
    echo '<script src="https://widgets.squerb.com/topic_page.js"></script>';
  }
}

?>

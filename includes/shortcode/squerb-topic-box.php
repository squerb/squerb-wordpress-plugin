<?php

class SquerbWidgetsShortcodeSquerbTopicBox {

  public function squerb_topic_box($atts) {
    $atts = shortcode_atts( array(
      'topic_id' => ''
      ), $atts );

    return $this->squerbTopicBoxHTMLSnippet($atts['topic_id']);
  }

  function squerbTopicBoxHTMLSnippet($topic_id) {
    add_action('wp_footer', array($this, 'squerbTopicBoxJSHook'));

    return "<div data-topic-box='{$topic_id}'"
      . '></div>';
  }

  function squerbTopicBoxJSHook() {
    echo '<script src="https://widgets.squerb.com/topic_page.js"></script>';
  }
}

?>

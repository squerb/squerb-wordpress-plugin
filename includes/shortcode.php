<?php

  include dirname(__FILE__) . '/shortcode/squerb-button.php';
  include dirname(__FILE__) . '/shortcode/squerb-topic-box.php';

  add_shortcode('squerb_button', array(new ShortcodeSquerbButton(),  'squerb_button'));
  add_shortcode('squerb_topic_box', array(new ShortcodeSquerbTopicBox(), 'squerb_topic_box'));

?>

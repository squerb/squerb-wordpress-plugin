<?php

  include dirname(__FILE__) . '/shortcode/squerb-button.php';
  include dirname(__FILE__) . '/shortcode/squerb-topic-box.php';

  add_shortcode(
    'squerb_button',
    array(new SquerbWidgetsShortcodeSquerbButton(),  'squerb_button')
  );

  add_shortcode(
    'squerb_topic_box',
    array(new SquerbWidgetsShortcodeSquerbTopicBox(), 'squerb_topic_box')
  );

?>

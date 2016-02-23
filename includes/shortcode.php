<?php

  include dirname(__FILE__) . '/shortcode/squerb-button.php';

  add_shortcode('squerb_button', array(new ShortcodeSquerbButton(),  'squerb_button'));

?>

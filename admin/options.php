<?php
class SquerbWidgetsOptions
{

  private $options;

  public function __construct()
  {
    add_action('admin_menu', array($this, 'addOptionsPage'));
    add_action('admin_init', array($this, 'initOptions'));
  }

  function addOptionsPage()
  {
    add_options_page(
      'Settings Admin',
      'Squerb',
      'manage_options',
      'squerb-widgets-settings',
      array($this, 'addOptionsForm')
      );
  }

  function initOptions()
  {
    register_setting(
      'squerb_widgets_option_group',
      'squerb_widgets_options'
      );

    add_settings_section(
      'setting_section_id',
      'Squerb’s Widgets Settings',
      array($this, 'printSectionInfo'),
      'squerb-widgets-settings'
      );

    add_settings_field(
      'api_key',
      'API Key',
      array($this, 'apiKeyCallback'),
      'squerb-widgets-settings',
      'setting_section_id'
      );

    add_settings_field(
      'api_secret',
      'API Secret',
      array($this, 'apiSecretCallback'),
      'squerb-widgets-settings',
      'setting_section_id'
      );
  }

  function addOptionsForm()
  {
    $this->options = get_option('squerb_widgets_options');

    ?>
    <div class="wrap">
      <?php screen_icon(); ?>
      <form method="post" action="options.php">
        <?php
        settings_fields('squerb_widgets_option_group');
        do_settings_sections('squerb-widgets-settings');
        submit_button();
        ?>
      </form>
    </div>
    <?php
  }

  function printSectionInfo()
  {
    print 'Enter your settings below:';
  }

  function apiKeyCallback()
  {
    printf(
      '<input type="text" id="api_key" name="squerb_widgets_options[api_key]" value="%s" size="40" />',
      isset($this->options['api_key']) ? esc_attr($this->options['api_key']) : ''
      );
  }

  function apiSecretCallback()
  {
    printf(
      '<input type="text" id="api_secret" name="squerb_widgets_options[api_secret]" value="%s" size="40" />',
      isset($this->options['api_secret']) ? esc_attr($this->options['api_secret']) : ''
      );
  }

}

if ( is_admin() )
  $squerb_widgets_options = new SquerbWidgetsOptions();

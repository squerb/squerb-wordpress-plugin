<?php
class MySettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin',
            'Squerb',
            'manage_options',
            'my-setting-admin',
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'squerb_options' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>Squerb Settings</h2>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields( 'squerb_option_group' );
                do_settings_sections( 'my-setting-admin' );
                submit_button();
                ?>
            </form>
        </div>
    <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting(
            'squerb_option_group', // Option group
            'squerb_options', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'General Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'my-setting-admin' // Page
        );

        add_settings_field(
            'api_host',
            'API Host URL',
            array( $this, 'api_host_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section
        );

        add_settings_field(
            'api_key',
            'API Key',
            array( $this, 'api_key_callback' ),
            'my-setting-admin',
            'setting_section_id'
        );

        add_settings_field(
            'api_secret',
            'API Secret',
            array( $this, 'api_secret_callback' ),
            'my-setting-admin',
            'setting_section_id'
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
//        $new_input = array();
//        if( isset( $input['api_host'] ) )
//            $new_input['api_host'] = $input['api_host'];
//
//        if( isset( $input['api_key'] ) )
//            $new_input['api_key'] = sanitize_text_field( $input['api_key'] );
//
//        if( isset( $input['api_secret'] ) )
//            $new_input['api_secret'] = sanitize_text_field( $input['api_secret'] );
//
//        return $new_input;
        return $input;
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below to enable the Squerb Widget:';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function api_host_callback()
    {
        printf(
            '<input type="text" id="api_host" name="squerb_options[api_host]" value="%s" size="40"/>',
            isset( $this->options['api_host'] ) ? esc_attr( $this->options['api_host']) : ''
        );
    }

    public function api_key_callback()
    {
        printf(
            '<input type="text" id="api_key" name="squerb_options[api_key]" value="%s" size="40" />',
            isset( $this->options['api_key'] ) ? esc_attr( $this->options['api_key']) : ''
        );
    }

    public function api_secret_callback()
    {
        printf(
            '<input type="text" id="api_secret" name="squerb_options[api_secret]" value="%s" size="20" />',
            isset( $this->options['api_secret'] ) ? esc_attr( $this->options['api_secret']) : ''
        );
    }

}

if (is_admin())
    $my_settings_page = new MySettingsPage();
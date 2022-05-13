<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://unitycode.tech
 * @since      1.0.0
 *
 * @package    Cwui
 * @subpackage Cwui/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cwui
 * @subpackage Cwui/admin
 * @author     jnz93 <box@unitycode.tech>
 */
class Cwui_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		/**
		 * Adição do menu na dashboard admin
		 */
		add_action( 'admin_menu', array( $this, 'registerDashboardMenu' ) );
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Cwui_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cwui_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cwui-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Cwui_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cwui_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cwui-admin.js', array( 'jquery' ), $this->version, false );

	}

		/**
	 * Registro do menu na dashboard wordpress
	 * 
	 */
	public function registerDashboardMenu()
	{

		$pageTitle 	= 'Customize Wordpress UI';
		$menuTitle 	= 'Customize Wordpress UI';
		$capability = '10';
		$menuSlug 	= 'cwui-admin';
		$iconUrl 	= 'dashicons-layout';
		$position	= '20';

		add_menu_page( $pageTitle, $menuTitle, $capability, $menuSlug, array( $this, 'cbCwuiPage' ), $iconUrl, $position );
	}

	/**
	 * Callback para página do plugin
	 * 
	 */
	public function cbCwuiPage()
	{
		require_once plugin_dir_path( __FILE__ ) . 'partials/cwui-admin-display.php';
	}


}

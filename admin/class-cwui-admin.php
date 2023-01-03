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

        # Instânciando classes
        new Cwui_AdminPanel();
        
		/**
		 * Adição do menu na dashboard admin
		 */
		add_action( 'admin_menu', array( $this, 'registerDashboardMenu' ) );

		/**
		 * Registrando o grupo de configurações para o formulário da página
		 */
		add_action( 'admin_init', [ $this, 'registerSettingsOptionGroup' ] );

		/**
		 * Customizar página de login
		 */
		add_action( 'login_enqueue_scripts', [ $this, 'customizeAdminLoginPage' ] );

		/**
		 * Customizar Footer da página de login
		 */
		add_action( 'login_footer', [ $this, 'customizeFooter' ] );

		/**
		 * Customizar link no logotipo da página de login
		 */
		add_filter( 'login_headerurl', [ $this, 'customizeLogoLink'] );

		/**
		 * Customizar texto no logotipo da página de login
		 */
		add_filter( 'login_headertext', [ $this, 'customizeLogoText'] );

		/**
		 * Customizar #wpadminbar
		 */
		add_action( 'wp_before_admin_bar_render', [ $this, 'customizeWpAdminBar' ] );

		/**
		 * Substituir nome "Betheme" no menu
		 */
		add_action( 'admin_init', [ $this, 'customizeBethemeNameOnMenu'] );

		/**
		 * Substituir texto no rodapé da dashboard
		 */
		add_filter( 'admin_footer_text', [ $this, 'customizeDashboardFooterText'] );

		/**
		 * Customizar widgets na dashboard admin
		 */
		add_filter( 'wp_dashboard_setup', [ $this, 'removeDashboardWidgets' ] );

		/**
		 * Add widgets na dashboard admin
		 */
		add_action( 'wp_dashboard_setup',[ $this, 'dashboardAddWidgets' ] );
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

	/**
	 * Registrando o grupo de options para validar a submissão do form de configurações
	 * 
	 */
	public function registerSettingsOptionGroup()
	{
		$settingsGroup 		= '_cwui_settings';
		$optionsGroup 		= [
			'_cwui_background_login_page',
			'_cwui_url_logotipo',
			'_cwui_height_logotipo',
			'_cwui_width_logotipo',
			'_cwui_padding_logotipo',
			'_cwui_margin_logotipo',
            # Admin Menu Logotipo
            '_cwui_menu_logotipo_url',
            '_cwui_menu_logotipo_height',
            '_cwui_menu_logotipo_width',
            '_cwui_menu_logotipo_padding',
            '_cwui_menu_logotipo_margin',
            '_cwui_menu_logotipo_show',
            # Footer Admin
			'_cwui_show_link_wordpress',
			'_cwui_footer_text',
			'_cwui_footer_text_classes',
			'_cwui_footer_text_style',
			'_cwui_footer_text_container_classes',
			'_cwui_footer_text_container_style',
			'_cwui_url_logotipo_icon',
			'_cwui_url_logotipo_icon_footer',
			'_cwui_url_text_footer',
			'_cwui_url_betheme_menu_logo_replace',
			'_cwui_betheme_menu_label_replace',
			'_cwui_widget_welcome_image_url',
			'_cwui_widget_welcome_title',
			'_cwui_widget_contact_title',
			'_cwui_widget_contact_content',
		];

		foreach( $optionsGroup as $option ){
			register_setting( $settingsGroup, $option );
		}

	}

	/**
	 * Customizar a página de login "/wp-login.php"
	 * 
	 * @hook
	 */
	public function customizeAdminLoginPage()
	{
		$sufix 			= 'px';
		$bodyBgColor	= get_option('_cwui_background_login_page');
		$logoUrl 		= get_option('_cwui_url_logotipo');
		$height 		= get_option('_cwui_height_logotipo') . $sufix;
		$width 			= get_option('_cwui_width_logotipo') . $sufix;
		$padding 		= get_option('_cwui_padding_logotipo');
		$margin 		= get_option('_cwui_margin_logotipo');
		$showLink 		= get_option('_cwui_show_link_wordpress');
		$bgSize 		= $width . ' ' . $height;
		$bgRepeat 		= 'no-repeat';
		?>
		<style type="text/css">
			/* Substituindo a logotipo */
			#login h1 a, .login h1 a {
				background-image: url(<?php echo $logoUrl; ?>);
				background-size: <?php echo $bgSize; ?>;
				background-repeat: <?php echo $bgRepeat; ?>;
				height: <?php echo $height; ?>;
				width: <?php echo $width; ?>;
				padding: <?php echo $padding; ?>;
			}

			/* Alterar cor do body */
			<?php if( strlen($bodyBgColor) > 1 ): ?>
				body{
					background: <?php echo $bodyBgColor . ' !important'; ?>
				}
			<?php endif; ?>

			/* Remover link #backtoblog */
			<?php if( $showLink ): ?>
				#backtoblog{
					display: none !important;
				}
			<?php endif; ?>
		</style>
		<?php
	}

	/**
	 * Customizar o link no logotipo da página de login "/wp-login.php"
	 * 
	 * @filter 	login_headerurl
	 */
	public function customizeLogoLink()
	{
		$link = get_site_url();
		
		return $link;
	}

	/**
	 * Customizar Texto dentro do link da logotipo na página de login "/wp-login.php"
	 * 
	 * @filter login_headertext
	 */
	public function customizeLogoText()
	{
		$siteName = get_bloginfo( 'name' );

		return $siteName;
	}

	/**
	 * Customizar rodapé da página de login
	 * 
	 * @action 	login_footer
	 */
	public function customizeFooter()
	{
		$text 			= get_option( '_cwui_footer_text' );
		$classText 		= get_option( '_cwui_footer_text_classes' );
		$styleText 		= get_option( '_cwui_footer_text_style' );
		$classContainer = get_option( '_cwui_footer_text_container_classes' );
		$styleContainer = get_option( '_cwui_footer_text_container_style' );

		$output = '<div '. ( strlen($classContainer) > 0 ? 'class="'. $classContainer .'"' : '' ) .' '. ( strlen($styleContainer) > 1 ? 'style="'. $styleContainer .'"' : '') .'>
				<p '. ( strlen($classText) > 0 ? 'class="'. $classText .'"' : '' ) .' '. ( strlen($styleText) > 1 ? 'style="'. $styleText .'"' : '') .'>'. $text .'</p>
			</div>';

		echo $output;
	}

	/**
	 * Customizar Logotipo(#wp-admin-bar-wp-logo) e esconder submenu(.ab-sub-wrapper) na #wpadminbar
	 * Dashboard Admin
	 * 
	 */
	public function customizeWpAdminBar()
	{
		$iconUrl			= get_option( '_cwui_url_logotipo_icon' );
		$iconBethemeLabel	= get_option( '_cwui_url_betheme_menu_logo_replace' );
		?>
		<style type="text/css">
			#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before{
				content: url('<?php echo $iconUrl ?>') !important;
				top: 2px;
			}
			#wpadminbar #wp-admin-bar-wp-logo > a.ab-item{
				pointer-events: none;
				cursor: default;
			}
			#wpadminbar #wp-admin-bar-wp-logo div.ab-sub-wrapper{
				display: none !important;
			}

			<?php if( strlen($iconBethemeLabel) > 1 ):?>
				#toplevel_page_betheme a.menu-top div.wp-menu-image{
					background-image: url( <?php echo $iconBethemeLabel ?>) !important;
				}
			<?php endif; ?>
		</style>
		<?php
	}

	/**
	 * Customizar/Substituir o nome "Betheme" no menu
	 * Dashboard Admin > Admin Menu
	 */
	public function customizeBethemeNameOnMenu()
	{
		global $menu;
		$label 		= get_option( '_cwui_betheme_menu_label_replace' );
		
		// Define your changes here
		if( strlen($label) > 1 ){
			$updates = array(
				"Betheme" => array(
					'name' => __( $label, 'textdomain' )
				)
			);
		
			foreach ($menu as $k => $props) {
		
				// Check for new values
				$new_values = (isset($updates[$props[0]])) ? $updates[$props[0]] : false;
				if (!$new_values) continue;
		
				// Change menu name
				$menu[$k][0] = $new_values['name'];
			}
		}
	}

	/**
	 * Customizar Texto localizado no rodapé da dashboard wp
	 * 
	 * @filter	admin_footer_text
	 */
	public function customizeDashboardFooterText()
	{
		$iconUrl 	= get_option('_cwui_url_logotipo_icon_footer');
		$text 		= get_option('_cwui_url_text_footer');

		$output 	= '';
		if( strlen($iconUrl) > 1 ){
			$output .= '<img style="width: 20px; height: 20px; margin-right: 4px" src="'. $iconUrl .'" alt="">';
		}

		if( strlen($text) > 1 ){
			$output .= '<span>'. $text .'</span>';
		}

		return $output;
	}

	/**
	 * Customizar Widgets na dashboard inicial
	 * 
	 * @filter	default_hidden_meta_boxes
	 */
	public function removeDashboardWidgets()
	{
		remove_action( 'welcome_panel', 'wp_welcome_panel' ); // Welcome Panel
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); # Novidades e eventos
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); # Rascunho rápido 
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' ); # Atividade
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' ); # Agora
		remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' ); # Status do diagnóstico
	}

	/**
	 * Adição de novos widgets customs na dashboard admin
	 * 
	 * @action 	wp_dashboard_setup
	 */
	public function dashboardAddWidgets()
	{
		$widgetTitle 		= get_option( '_cwui_widget_welcome_title' );
		$widgetContactTitle = get_option( '_cwui_widget_contact_title' );
		if( strlen($widgetTitle) > 1 ){
			wp_add_dashboard_widget( 'cwui_dashboard_welcome', __( $widgetTitle, 'textodmain' ), [ $this, 'customWidgetForDashboard' ] );
		}

		if( strlen($widgetContactTitle) ){
			wp_add_dashboard_widget( 'cwui_dashboard_contact', __( $widgetContactTitle, 'textdomain' ), [ $this, 'customWidgetDashboardContact'] );
		}
	}

	/**
	 * Callback Welcome widget dashboard
	 */
	public function customWidgetForDashboard() 
	{
		$imgUrl = get_option( '_cwui_widget_welcome_image_url' );
		_e( '<img style="max-width: 100%; "src="'. $imgUrl .'">', 'textdomain' );
	}

	/**
	 * Callback Contact Widget Dashboard
	 */
	public function customWidgetDashboardContact()
	{
		$contactContent = get_option( '_cwui_widget_contact_content' );
		_e( $contactContent, 'textdomain' );
	}
}

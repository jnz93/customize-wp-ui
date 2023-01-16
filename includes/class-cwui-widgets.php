<?php
/**
 * Customizações do painel administrativo do wordpress
 * 
 * @link       https://unitycode.tech
 * @since      1.0.0
 *
 * @package    Cwui
 * @subpackage Cwui/admin
 */
class Cwui_Widgets{

    public function __construct()
    {
        # Dashboard Widgets
		add_action( 'wp_dashboard_setup', [$this, 'dashboardAddWidgets'] );
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
        // $sysInfoTitle       = get_option( '_cwui_widget_sysinfo_title' );
        $sysInfoTitle       = 'Informações do sistema';
		if( strlen($widgetTitle) > 1 ){
			wp_add_dashboard_widget( 'cwui_dashboard_welcome', __( $widgetTitle, 'textodmain' ), [ $this, 'customWidgetForDashboard' ] );
		}

		if( strlen($widgetContactTitle) ){
			wp_add_dashboard_widget( 'cwui_dashboard_contact', __( $widgetContactTitle, 'textdomain' ), [ $this, 'customWidgetDashboardContact'] );
		}

        if( strlen($sysInfoTitle) > 0 && false ){
            wp_add_dashboard_widget( 'cwui_dashboard_sysinfo', __( $sysInfoTitle, 'textdomain' ), [$this, 'sysInfo'] );
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

    /**
     * Widget SystemInfo
     * 
     */
    public function sysInfo()
    {
        ob_start();
        ?>
            <div class="">
                <h2 class=""><?php _e('Ambiente do servidor', 'textdomain'); ?></h2>
                <table>
                    <tr>
                        <td><?php _e('Sistema Operacional', 'textdomain'); ?></td>
                        <td>Doe</td>
                    </tr>
                    <tr>
                        <td><?php _e('Versão do Banco de Dados(MySQL)', 'textdomain'); ?></td>
                        <td>Doe</td>
                    </tr>
                    <tr>
                        <td><?php _e('Versão do PHP', 'textdomain'); ?></td>
                        <td>Doe</td>
                    </tr>
                    <tr>
                        <td><?php _e('Limite de memória do PHP', 'textdomain'); ?></td>
                        <td>Doe</td>
                    </tr>
                    <tr>
                        <td><?php _e('Tempo limite do PHP', 'textdomain'); ?></td>
                        <td>Doe</td>
                    </tr>
                    <tr>
                        <td><?php _e('Variáveis de entrada PHP', 'textdomain'); ?></td>
                        <td>Doe</td>
                    </tr>
                    <tr>
                        <td><?php _e('Upload Máximo do Wordpress', 'textdomain'); ?></td>
                        <td>Doe</td>
                    </tr>
                    <tr>
                        <td><?php _e('cURL', 'textdomain'); ?></td>
                        <td>Doe</td>
                    </tr>
                    <tr>
                        <td><?php _e('Documento DOM', 'textdomain'); ?></td>
                        <td>Doe</td>
                    </tr>
                </table>
            </div>
            <div class="">
                <h2 class=""><?php _e('Ambiente do Wordpress', 'textdomain'); ?></h2>
                <table>
                    <tr>
                        <td><?php _e('URL Home', 'textdomain'); ?></td>
                        <td>Doe</td>
                    </tr>
                    <tr>
                        <td><?php _e('URL Site', 'textdomain'); ?></td>
                        <td>Doe</td>
                    </tr>
                    <tr>
                        <td><?php _e('Versão do Wordpress', 'textdomain'); ?></td>
                        <td>Doe</td>
                    </tr>
                    <tr>
                        <td><?php _e('Wordpress Multisite', 'textdomain'); ?></td>
                        <td>Doe</td>
                    </tr>
                    <tr>
                        <td><?php _e('Debug Wordpress', 'textdomain'); ?></td>
                        <td>Doe</td>
                    </tr>
                    <tr>
                        <td><?php _e('Idioma', 'textdomain'); ?></td>
                        <td>Doe</td>
                    </tr>
                </table>
            </div>
        <?php
        return ob_get_contents();
    }
}
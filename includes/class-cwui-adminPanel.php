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
class Cwui_AdminPanel{

    public function __construct()
    {
        # Actions and Filters

        add_action( 'admin_init', [ $this, 'customLogoOnDashboardMenuTop'] );
    }


    /**
     * Logotipo do cliente no topo do menu admin do wordpress
     * 
     */
    public function customLogoOnDashboardMenuTop()
    {
        $showLogotipo = get_option( '_cwui_menu_logotipo_show' );
        if( $showLogotipo ):
            $customLogoUrl  = get_option('_cwui_menu_logotipo_url');
            $height         = get_option('_cwui_menu_logotipo_height');
            $width          = get_option('_cwui_menu_logotipo_width');
            $padding        = get_option('_cwui_menu_logotipo_padding');
            $margin         = get_option('_cwui_menu_logotipo_margin');
            ?>
            <style>
                #adminmenuwrap:before{
                    background: url('<?php echo $customLogoUrl ?>') no-repeat;
                    background-size: contain;
                    background-position: center;
                    
                    content: '';
                    display: block;
                    margin: <?php echo !empty($margin) ? $margin : '0'; ?>;
                    padding: <?php echo !empty($padding) ? $padding : '0'; ?>;
                    width: <?php echo $width; ?>;
                    height: <?php echo $height; ?>;
                }
                .folded #adminmenuwrap:before{
                    width: 30px;
                    height: 30px;
                    padding: 0;
                }
            </style>
            <?php
        endif;
    }
}
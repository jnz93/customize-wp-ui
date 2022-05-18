<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://unitycode.tech
 * @since      1.0.0
 *
 * @package    Cwui
 * @subpackage Cwui/admin/partials
 */
?>
<div id="content">
    <header class="">    
        <h2><?php _e( 'Customize Wordpress UI', 'cwui' ) ?></h2>
    </header>
    
    <div class="container">
        <form method="post" action="options.php">
            <?php
            $settingsGroup = '_cwui_settings';
            settings_fields( $settingsGroup );
            do_settings_sections( $settingsGroup );
            ?>
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <h3 class=""><?php _e( 'Página de Login', 'cwui' ); ?></h3>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e( 'Cor do Background', 'cwui' ); ?></th>
                        <td>
                            <div class="d-block mb-2">
                                <input type="color" name="_cwui_background_login_page" id="_cwui_background_login_page" class="d-block mb-2" value="<?php echo get_option( '_cwui_background_login_page' ) != false ? get_option( '_cwui_background_login_page' ) : ''; ?>" >
                            </div>
                            <label for="_cwui_background_login_page" class="d-block mb-1"><?php _e( 'Selecione a cor do background para a página de login <i>/wp-login.php</i>', 'cwui' ); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e( 'URL do Logotipo', 'cwui' ); ?></th>
                        <td>
                            <div class="d-block mb-2">
                                <input type="url" name="_cwui_url_logotipo" id="_cwui_url_logotipo" class="" value="<?php echo get_option( '_cwui_url_logotipo' ) != false ? get_option( '_cwui_url_logotipo' ) : ''; ?>">
                            </div>
                            <label for="_cwui_url_logotipo" class="d-block mb-1"><?php _e( 'Insira a URL da imagem que deseja utilizar como logotipo na página.', 'cwui' ); ?></label>
                            <span><i><?php _e( 'Dica: Você pode enviar a imagem desejada para a biblioteca do wordpress e depois copiar a URL dela e colar aqui.') ?></i></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e( 'Altura e Largura do Logotipo', 'cwui' ); ?></th>
                        <td>
                            <div class="d-block mb-4">
                                <div class="">
                                    <input type="number" name="_cwui_height_logotipo" id="_cwui_height_logotipo" class="" value="<?php echo get_option( '_cwui_height_logotipo' ) != false ? get_option( '_cwui_height_logotipo' ) : ''; ?>">
                                </div>
                                <label for="_cwui_height_logotipo" class="d-block mb-1"><?php _e( 'Altura(px)', 'cwui' ); ?></label>
                            </div>
                            <div class="d-block mb-2">
                                <div class="">
                                    <input type="number" name="_cwui_width_logotipo" id="_cwui_width_logotipo" class="" value="<?php echo get_option( '_cwui_width_logotipo' ) != false ? get_option( '_cwui_width_logotipo' ) : ''; ?>">
                                </div>
                                <label for="_cwui_width_logotipo" class="d-block mb-1"><?php _e( 'Largura(px)', 'cwui' ); ?></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e( 'Espaçamento interno Logotipo<i>(padding)</i>', 'cwui' ); ?></th>
                        <td>
                            <div class="d-block mb-2">
                                <input type="text" name="_cwui_padding_logotipo" id="_cwui_padding_logotipo" class="" value="<?php echo get_option( '_cwui_padding_logotipo' ) != false ? get_option( '_cwui_padding_logotipo' ) : ''; ?>">
                            </div>
                            <label for="_cwui_padding_logotipo" class="d-block mb-1"><?php _e( 'Por Exemplo: 10px(top), 20px(right), 10px(bottom), 20px(left)', 'cwui' ); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e( 'Espaçamento Externo Logotipo<i>(margin)</i>', 'cwui' ); ?></th>
                        <td>
                            <div class="d-block mb-2">
                                <input type="text" name="_cwui_margin_logotipo" id="_cwui_margin_logotipo" class="" value="<?php echo get_option( '_cwui_margin_logotipo' ) != false ? get_option( '_cwui_margin_logotipo' ) : ''; ?>">
                            </div>
                            <label for="_cwui_margin_logotipo" class="d-block mb-1"><?php _e( 'Por Exemplo: 10px(top), 20px(right), 10px(bottom), 20px(left)', 'cwui' ); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e( 'Esconder Link <i>"Ir para Wordpress"</i>', 'cwui' ); ?></th>
                        <td>
                            <div class="d-block mb-2">
                                <input type="checkbox" name="_cwui_show_link_wordpress" id="_cwui_show_link_wordpress" class="" <?php echo get_option( '_cwui_show_link_wordpress' ) != false ? 'checked="checked"' : ''; ?>>
                            </div>
                            <label for="_cwui_show_link_wordpress" class="d-block mb-1"><?php _e( 'Se deseja esconder o link marque está caixa', 'cwui' ); ?></label>
                        </td>
                    </tr>
                    <!-- /End Página de login -->
                </tbody>
            </table>

            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <h5 class=""><?php _e( 'Texto rodapé', 'cwui' ); ?></h3>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e( 'Mensagem', 'cwui' ); ?></th>
                        <td>
                            <div class="d-block mb-2">
                                <input type="text" name="_cwui_footer_text" id="_cwui_footer_text" class="d-block mb-2" value="<?php echo get_option( '_cwui_footer_text' ) != false ? get_option( '_cwui_footer_text' ) : ''; ?>" >
                            </div>
                            <label for="_cwui_footer_text" class="d-block mb-1"><?php _e( 'Insira a mensagem para o rodapé da página de login.', 'cwui' ); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e( 'Classe(s) CSS(Mensagem)', 'cwui' ); ?></th>
                        <td>
                            <div class="d-block mb-2">
                                <input type="text" name="_cwui_footer_text_classes" id="_cwui_footer_text_classes" class="d-block mb-2" value="<?php echo get_option( '_cwui_footer_text_classes' ) != false ? get_option( '_cwui_footer_text_classes' ) : ''; ?>" >
                            </div>
                            <label for="_cwui_footer_text_classes" class="d-block mb-1"><?php _e( 'Adicione classes CSS(separadas por espaço) para a tag do texto. Ex: classe_1 classe_2', 'cwui' ); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e( 'Regras CSS(Mensagem)', 'cwui' ); ?></th>
                        <td>
                            <div class="d-block mb-2">
                                <input type="text" name="_cwui_footer_text_style" id="_cwui_footer_text_style" class="d-block mb-2" value="<?php echo get_option( '_cwui_footer_text_style' ) != false ? get_option( '_cwui_footer_text_style' ) : ''; ?>" >
                            </div>
                            <label for="_cwui_footer_text_style" class="d-block mb-1"><?php _e( 'Adicione regras separadas por ";". Ex: prop: value; prop: value;', 'cwui' ); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e( 'Classe(s) CSS(Container)', 'cwui' ); ?></th>
                        <td>
                            <div class="d-block mb-2">
                                <input type="text" name="_cwui_footer_text_container_classes" id="_cwui_footer_text_container_classes" class="d-block mb-2" value="<?php echo get_option( '_cwui_footer_text_container_classes' ) != false ? get_option( '_cwui_footer_text_container_classes' ) : ''; ?>" >
                            </div>
                            <label for="_cwui_footer_text_container_classes" class="d-block mb-1"><?php _e( 'Adicione classes CSS(separadas por espaço) para a tag do texto. Ex: classe_1 classe_2', 'cwui' ); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e( 'Regras CSS(Container)', 'cwui' ); ?></th>
                        <td>
                            <div class="d-block mb-2">
                                <input type="text" name="_cwui_footer_text_container_style" id="_cwui_footer_text_container_style" class="d-block mb-2" value="<?php echo get_option( '_cwui_footer_text_container_style' ) != false ? get_option( '_cwui_footer_text_container_style' ) : ''; ?>" >
                            </div>
                            <label for="_cwui_footer_text_container_style" class="d-block mb-1"><?php _e( 'Adicione regras separadas por ";". Ex: prop: value; prop: value;', 'cwui' ); ?></label>
                        </td>
                    </tr>
                </tbody>
            </table>

            <?php submit_button( ); ?>
        </form>           
    </div>
</div>
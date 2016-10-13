<?php

class nextgenPlayerTemplateSettings {

    const NAME = 'NextGEN Player Template Settings';
    const SLUG = 'nextgen_player_template_settings';

    public static $defaults = array(
        'show_filmstrip_nav' => 1,
        'main_image_padding' => 1,
        'autoplay' => 1,
        'width' => 'inherit',
        'panel_animation' => 'slide',
        'panel_scale' => 'crop',
        'show_infobar' => 1,
        'enable_overlays' => 1,
        'fix_img_possition' => 0,
        'infobar_opacity' => 0.8,
        'show_bg_changer' => 0,
        'show_captions' => 0,
        'auto_show_infobar' => 0,
        
        // responsive
        'responsive' => 0,
        'show_overlays' => 0,
        'panel_can_upscale_image' => 1,
    );
    public static $fancybox_defaults = array(
        'title_show' => 0,
        'hide_on_content_click' => 1,
        'show_close_button' => 0,
        'show_nav_arrows' => 1
    );
    public static $default_panel_animation = array(
        'fade', 'crossfade', 'slide'
    );
    public static $default_panel_scale = array(
        'crop', 'fit'
    );

    public function __construct() {
        add_action('admin_init', array(&$this, 'handleSettingsUpdate'));
        add_action('load_' . static::SLUG, array(&$this, 'onLoadAdmin'));
        add_action('admin_menu', array(&$this, 'onAdminMenu'), 99);

        if (isset($_GET['page']) && $_GET['page'] == static::SLUG) {
            do_action('load_' . static::SLUG);
        }
    }

    public function onAdminMenu() {
        $parent_slug = defined('NGGFOLDER') ? NGGFOLDER : 'nextgen-gallery';

        add_submenu_page(
                $parent_slug, __(static::NAME, nextgenPlayerTemplate::SLUG), __(static::NAME, nextgenPlayerTemplate::SLUG), 'manage_options', static::SLUG, array($this, 'onOutput')
        );
    }

    public function onLoadAdmin() {
        if (isset($_REQUEST['confirm']) && $_REQUEST['confirm'] == 'success') {
            add_action('admin_notices', array($this, 'addSuccessNotice'));
        }
    }

    public function handleSettingsUpdate() {
        // @TODO refactor this method
        if (isset($_POST[static::SLUG . '_wpnonce']) && wp_verify_nonce($_POST[static::SLUG . '_wpnonce'], static::SLUG)) {
            $infobar_opacity = doubleval($_POST[static::SLUG . '_infobar_opacity']);

            $panel_animation = in_array(strtolower(trim($_POST[static::SLUG . '_panel_animation'])), static::$default_panel_animation) ? strtolower(trim($_POST[static::SLUG . '_panel_animation'])) : 'slide';
            $panel_scale = in_array(strtolower(trim($_POST[static::SLUG . '_panel_scale'])), static::$default_panel_scale) ? strtolower(trim($_POST[static::SLUG . '_panel_scale'])) : 'crop';

            $width = esc_attr($_POST[static::SLUG . '_width']);
            $search = false;
            preg_match("/[a-z0-9]+/i", $width, $search);
            $width = isset($search[0]) ? $search[0] : 'inherit';

            $show_bg_changer = isset($_POST[static::SLUG . '_show_bg_changer']) && intval($_POST[static::SLUG . '_show_bg_changer']) == 1;
            $show_filmstrip_nav = isset($_POST[static::SLUG . '_show_filmstrip_nav']) && intval($_POST[static::SLUG . '_show_filmstrip_nav']) == 1;
            $main_image_padding = isset($_POST[static::SLUG . '_main_image_padding']) && intval($_POST[static::SLUG . '_main_image_padding']) == 1;
            $autoplay = isset($_POST[static::SLUG . '_autoplay']) && intval($_POST[static::SLUG . '_autoplay']) == 1;
            $show_infobar = isset($_POST[static::SLUG . '_show_infobar']) && intval($_POST[static::SLUG . '_show_infobar']) == 1;
            $enable_overlays = isset($_POST[static::SLUG . '_enable_overlays']) && intval($_POST[static::SLUG . '_enable_overlays']) == 1;
            $fix_img_possition = isset($_POST[static::SLUG . '_fix_img_possition']) && intval($_POST[static::SLUG . '_fix_img_possition']) == 1;
            $show_captions = isset($_POST[static::SLUG . '_show_captions']) && intval($_POST[static::SLUG . '_show_captions']) == 1;
            $auto_show_infobar = isset($_POST[static::SLUG . '_auto_show_infobar']) && intval($_POST[static::SLUG . '_auto_show_infobar']) == 1;

            // responsive
            $responsive = isset($_POST[static::SLUG . '_responsive']) && intval($_POST[static::SLUG . '_responsive']) == 1;
            $show_overlays = isset($_POST[static::SLUG . '_show_overlays']) && intval($_POST[static::SLUG . '_show_overlays']) == 1;
            $panel_can_upscale_image = isset($_POST[static::SLUG . '_panel_can_upscale_image']) && intval($_POST[static::SLUG . '_panel_can_upscale_image']) == 1;
            
            // fancybox options
            $title_show = isset($_POST[static::SLUG . '_title_show']) && intval($_POST[static::SLUG . '_title_show']) == 1;
            $hide_on_content_click = isset($_POST[static::SLUG . '_hide_on_content_click']) && intval($_POST[static::SLUG . '_hide_on_content_click']) == 1;
            $show_close_button = isset($_POST[static::SLUG . '_show_close_button']) && intval($_POST[static::SLUG . '_show_close_button']) == 1;
            $show_nav_arrows = isset($_POST[static::SLUG . '_show_nav_arrows']) && intval($_POST[static::SLUG . '_show_nav_arrows']) == 1;

            update_option(static::SLUG . '_show_bg_changer', $show_bg_changer);
            update_option(static::SLUG . '_show_filmstrip_nav', $show_filmstrip_nav);
            update_option(static::SLUG . '_main_image_padding', $main_image_padding);
            update_option(static::SLUG . '_infobar_opacity', (string) $infobar_opacity);
            update_option(static::SLUG . '_panel_animation', $panel_animation);
            update_option(static::SLUG . '_panel_scale', $panel_scale);
            update_option(static::SLUG . '_width', $width);
            update_option(static::SLUG . '_autoplay', $autoplay);
            update_option(static::SLUG . '_show_infobar', $show_infobar);
            update_option(static::SLUG . '_enable_overlays', $enable_overlays);
            update_option(static::SLUG . '_fix_img_possition', $fix_img_possition);
            update_option(static::SLUG . '_show_captions', $show_captions);
            update_option(static::SLUG . '_auto_show_infobar', $auto_show_infobar);

            // responsive
            update_option(static::SLUG . '_responsive', $responsive);
            update_option(static::SLUG . '_show_overlays', $show_overlays);
            update_option(static::SLUG . '_$panel_can_upscale_image', $panel_can_upscale_image);
            
            // fancybox options
            update_option(static::SLUG . '_title_show', $title_show);
            update_option(static::SLUG . '_hide_on_content_click', $hide_on_content_click);
            update_option(static::SLUG . '_show_close_button', $show_close_button);
            update_option(static::SLUG . '_show_nav_arrows', $show_nav_arrows);

            wp_safe_redirect(admin_url('admin.php?page=' . static::SLUG . '&confirm=success'));
        }
    }

    public function addSuccessNotice() {
        echo '<div class="updated"><p>' . __(static::NAME . ' updated.', nextgenPlayerTemplate::SLUG) . '</p></div>';
    }

    public function onOutput() {
        $current_url = admin_url('admin.php?page=' . static::SLUG);

        $width = $this->getWidth();
        $panel_animation = $this->getPanelAnimation();
        $panel_scale = $this->getPanelScale();
        $autoplay = $this->getAutoplay();
        $show_infobar = $this->getShowInfobar();
        $enable_overlays = $this->getEnableOverlays();
        $infobar_opacity = $this->getInfobarOpacity();
        $show_bg_changer = $this->getShowBgChanger();
        $show_filmstrip_nav = $this->getShowFilmstripNav();
        $main_image_padding = $this->getMainImagePadding();
        $fix_img_possition = $this->getFixImgPossition();
        $show_captions = $this->getShowCaptions();
        $auto_show_infobar = $this->getAutoShowInfobar();

        // responsive
        $responsive = $this->getResponsive();
        $show_overlays = $this->getShowOverlays();
        $panel_can_upscale_image = $this->getPanelCanUpscaleImage();
        
        // fancybox options
        $title_show = $this->getTitleShow();
        $hide_on_content_click = $this->getHideOnContentClick();
        $show_close_button = $this->getShowCloseButton();
        $show_nav_arrows = $this->getShowNavArrows();

        include dirname(__FILE__) . '/settings-page.php';
    }

    /**
     * call getters on this object
     * 
     * @param string $name
     * @param array $arguments
     * 
     * @return mixed
     */
    public function __call($name, $arguments) {

        $name = underscore($name);

        if (strpos($name, 'get_') === 0) {
            $name = str_replace('get_', '', $name);
            $default = isset(static::$defaults[$name]) ? static::$defaults[$name] : (isset(static::$fancybox_defaults[$name]) ? static::$fancybox_defaults[$name] : false);

            return get_option(static::SLUG . '_' . $name, $default);
        }

        return false;
    }

}

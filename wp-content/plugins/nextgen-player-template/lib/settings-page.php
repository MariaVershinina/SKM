<div class="wrap">
    <h2><?php _e(nextgenPlayerTemplateSettings::NAME, nextgenPlayerTemplate::SLUG) ?></h2>
<?php //@TODO refactor this file ?>
    <form action="<?php echo $current_url ?>" method="POST">
        <input type="hidden" name="<?php echo static::SLUG . '_wpnonce' ?>" value="<?php echo wp_create_nonce(nextgenPlayerTemplateSettings::SLUG) ?>" />
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row">
                        <label for="<?php echo static::SLUG . '_width' ?>"><?php _e('Width (px)', nextgenPlayerTemplate::SLUG) ?></label>
                    </th>
                    <td>
                        <label><input style="margin-right: 4px; margin-bottom: 4px;" type="checkbox" id="<?php echo static::SLUG . '_width_inherit' ?>" <?php if ($width == 'inherit'): ?>checked="checked" <?php endif ?>/><?php _e('Inherit width from parent div.', nextgenPlayerTemplate::SLUG) ?></label>
                        <br />
                        <input <?php if ($width == 'inherit'): ?>style="display: none;"<?php endif ?> name="<?php echo static::SLUG . '_width' ?>" id="<?php echo static::SLUG . '_width' ?>" type="text" class="small-text" value="<?php echo $width ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_panel_animation' ?>"><?php _e('Animation', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <select name="<?php echo static::SLUG . '_panel_animation' ?>" id="<?php echo static::SLUG . '_panel_animation' ?>">
                            <?php foreach (nextgenPlayerTemplateSettings::$default_panel_animation as $animation): ?>
                                <option value="<?php echo $animation ?>" <?php selected($animation, $panel_animation) ?>><?php _e($animation, nextgenPlayerTemplate::SLUG) ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_panel_scale' ?>"><?php _e('Panel scale', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <select name="<?php echo static::SLUG . '_panel_scale' ?>" id="<?php echo static::SLUG . '_panel_scale' ?>">
                            <?php foreach (nextgenPlayerTemplateSettings::$default_panel_scale as $scale): ?>
                                <option value="<?php echo $scale ?>" <?php selected($scale, $panel_scale) ?>><?php _e($scale, nextgenPlayerTemplate::SLUG) ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_autoplay' ?>"><?php _e('Autoplay', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php echo static::SLUG . '_autoplay' ?>"  id="<?php echo static::SLUG . '_autoplay' ?>" value="1" <?php checked($autoplay) ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_show_infobar' ?>"><?php _e('Show infobar', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php echo static::SLUG . '_show_infobar' ?>"  id="<?php echo static::SLUG . '_show_infobar' ?>" value="1" <?php checked($show_infobar) ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_auto_show_infobar' ?>"><?php _e('Show infobar on page load', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php echo static::SLUG . '_auto_show_infobar' ?>"  id="<?php echo static::SLUG . '_auto_show_infobar' ?>" value="1" <?php checked($auto_show_infobar) ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_show_captions' ?>"><?php _e('Show filmstrip captions', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php echo static::SLUG . '_show_captions' ?>"  id="<?php echo static::SLUG . '_show_captions' ?>" value="1" <?php checked($show_captions) ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_enable_overlays' ?>"><?php _e('Enable overlays', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php echo static::SLUG . '_enable_overlays' ?>" id="<?php echo static::SLUG . '_enable_overlays' ?>" value="1" <?php checked($enable_overlays) ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_show_bg_changer' ?>"><?php _e('Show overlay changer', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php echo static::SLUG . '_show_bg_changer' ?>" id="<?php echo static::SLUG . '_show_bg_changer' ?>" value="1" <?php checked($show_bg_changer) ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_fix_img_possition' ?>"><?php _e('Fix image possition', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php echo static::SLUG . '_fix_img_possition' ?>" id="<?php echo static::SLUG . '_fix_img_possition' ?>" value="1" <?php checked($fix_img_possition) ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_show_filmstrip_nav' ?>"><?php _e('Show filmstrip navigation buttons', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php echo static::SLUG . '_show_filmstrip_nav' ?>" id="<?php echo static::SLUG . '_show_filmstrip_nav' ?>" value="1" <?php checked($show_filmstrip_nav) ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_main_image_padding' ?>"><?php _e('Main image padding', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php echo static::SLUG . '_main_image_padding' ?>" id="<?php echo static::SLUG . '_main_image_padding' ?>" value="1" <?php checked($main_image_padding) ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_infobar_opacity' ?>"><?php _e('Infobar opacity', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input name="<?php echo static::SLUG . '_infobar_opacity' ?>" id="<?php echo static::SLUG . '_infobar_opacity' ?>" type="text" class="small-text" value="<?php echo $infobar_opacity ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
        <br />
        <h3><?php _e('Responsive options', nextgenPlayerTemplate::SLUG) ?></h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_responsive' ?>"><?php _e('Responsive', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php echo static::SLUG . '_responsive' ?>" id="<?php echo static::SLUG . '_responsive' ?>" value="1" <?php checked($responsive) ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_show_overlays' ?>"><?php _e('Show overlays', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php echo static::SLUG . '_show_overlays' ?>" id="<?php echo static::SLUG . '_show_overlays' ?>" value="1" <?php checked($show_overlays) ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_panel_can_upscale_image' ?>"><?php _e('Panel can upscale image', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php echo static::SLUG . '_panel_can_upscale_image' ?>" id="<?php echo static::SLUG . '_panel_can_upscale_image' ?>" value="1" <?php checked($panel_can_upscale_image) ?> />
                    </td>
                </tr>
            </tbody>
        </table>
        <br />
        <h3><?php _e('Fancybox options', nextgenPlayerTemplate::SLUG) ?></h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_title_show' ?>"><?php _e('Show title', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php echo static::SLUG . '_title_show' ?>" id="<?php echo static::SLUG . '_title_show' ?>" value="1" <?php checked($title_show) ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_hide_on_content_click' ?>"><?php _e('Hide on content click', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php echo static::SLUG . '_hide_on_content_click' ?>" id="<?php echo static::SLUG . '_hide_on_content_click' ?>" value="1" <?php checked($hide_on_content_click) ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_show_close_button' ?>"><?php _e('Show close button', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php echo static::SLUG . '_show_close_button' ?>" id="<?php echo static::SLUG . '_show_close_button' ?>" value="1" <?php checked($show_close_button) ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="<?php echo static::SLUG . '_show_nav_arrows' ?>"><?php _e('Show navigation arrows', nextgenPlayerTemplate::SLUG) ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php echo static::SLUG . '_show_nav_arrows' ?>" id="<?php echo static::SLUG . '_show_nav_arrows' ?>" value="1" <?php checked($show_nav_arrows) ?> />
                    </td>
                </tr>
            </tbody>
        </table>
        
        <p class="submit">
            <input type="submit" name="Submit" value="<?php _e('Save', nextgenPlayerTemplate::SLUG) ?>" class="button-primary" id="submit" />
        </p>
    </form>
</div>

<script type="text/javascript">
    ;(function($) {
        $(document).ready(function() {
            $('#<?php echo static::SLUG . '_width_inherit' ?>').change(function() {
                if ($(this).is(':checked')) {
                    $('input#<?php echo static::SLUG . '_width' ?>').val('inherit').hide();
                } else {
                    $('input#<?php echo static::SLUG . '_width' ?>').val('600').show();
                }
            });
        });
    })(jQuery);
</script>
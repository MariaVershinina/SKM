<?php
/**
  Template Page for the jQuery Galleryview integration

  Follow variables are useable :

  $gallery     : Contain all about the gallery
  $images      : Contain all images, path, title
  $pagination  : Contain the pagination content

 */
global $nextgenPlayerTemplate;
?>
<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?><?php if (!empty($gallery)) : ?>

    <?php if ($nextgenPlayerTemplate->getShowBgChanger()): ?>
        <div class="ngg-player-bg-changer-overlay"></div>
        <div id="ngg_player_bg_changer" class="ngg-player-bg-changer">
            <?php for ($i = 1; $i <= 11; $i++): ?>
                <div class="ngg-player-bg-changer-item ngg-player-bg-changer-item-<?php echo $i ?>"></div>
            <?php endfor ?>
        </div>
    <?php endif ?>
    <div id="<?php echo $gallery->anchor ?>_container">
        <ul id="<?php echo $gallery->anchor ?>" >
            <?php foreach ($images as $image) : ?>		
                <li>
                    <img class="fancybox" data-frame="<?php echo $image->thumbnailURL ?>" data-description="<?php echo str_replace('"', "'", html_entity_decode($image->description)); ?>" alt="<?php echo str_replace('"', "'", html_entity_decode($image->alttext)); ?>" title="<?php echo str_replace('"', "'", html_entity_decode($image->alttext)); ?>" src="<?php echo $image->imageURL ?>" />
                </li>
            <?php endforeach; ?>
        </ul>
    </div>    

    <div id="ngg_player_fancybox_container">
         <?php foreach ($images as $image) : ?>		
            <a class="ngg_player_fancybox_a" rel="images_group_<?php echo strtotime(date('Y-m-d')) ?>" alt="<?php echo str_replace('"', "'", html_entity_decode($image->alttext)); ?>" title="<?php echo str_replace('"', "'", html_entity_decode($image->alttext)); ?>" href="<?php echo $image->imageURL ?>">
                <img alt="<?php echo str_replace('"', "'", html_entity_decode($image->alttext)); ?>" title="<?php echo str_replace('"', "'", html_entity_decode($image->alttext)); ?>" src="<?php echo $image->imageURL ?>" />
            </a>
        <?php endforeach; ?>
    </div>
         
    <script type="text/javascript" defer="defer">
        ;(function($) {
            $("document").ready(function() {
                
                $('a.ngg_player_fancybox_a').fancybox({
                    titleShow: <?php echo $nextgenPlayerTemplate->getTitleShow() ? 'true' : 'false'; ?>, 
                    hideOnContentClick: <?php echo $nextgenPlayerTemplate->getHideOnContentClick() ? 'true' : 'false'; ?>, 
                    showCloseButton: <?php echo $nextgenPlayerTemplate->getShowCloseButton() ? 'true' : 'false'; ?>,
                    showNavArrows: <?php echo $nextgenPlayerTemplate->getShowNavArrows() ? 'true' : 'false'; ?>
                });
                
                $('div.gv_panel').live('click', function() {
                    var img_src = $(this).find("img").attr("src");
                    var img_index = 0;
                    var current_index = 0;
                    
                    $('a.ngg_player_fancybox_a').each(function(){
                        
                        if($(this).find("img").attr("src") == img_src) {
                            current_index = img_index;
                        }
                    
                        img_index++;
                    });
                
                    if($('a.ngg_player_fancybox_a').eq(current_index).length > 0) {
                        $('a.ngg_player_fancybox_a').eq(current_index).trigger("click");
                    }
                });
            
    <?php if ($nextgenPlayerTemplate->getWidth() == 'inherit'): ?>
                var width = $('#<?php echo $gallery->anchor ?>').parents('div').width();
    <?php else: ?>
                var width = <?php echo $nextgenPlayerTemplate->getWidth() ?>;
    <?php endif ?>
                if (width <= 0) {
                    width = 600;
                }

                $('a.fancybox_anchor').each(function() {
                    $(this).fancybox();
                });

                var $gallery = $('#<?php echo $gallery->anchor ?>');

                $gallery.galleryView({
                    show_filmstrip_nav: <?php echo $nextgenPlayerTemplate->getShowFilmstripNav() ? 'true' : 'false'; ?>,
                    autoplay: <?php echo $nextgenPlayerTemplate->getAutoplay() ? 'true' : 'false'; ?>,
                    panel_width: (width - 10),
                    panel_animation: '<?php echo $nextgenPlayerTemplate->getPanelAnimation() ?>',
                    panel_scale: '<?php echo $nextgenPlayerTemplate->getPanelScale() ?>',
                    show_infobar: <?php echo $nextgenPlayerTemplate->getShowInfobar() ? 'true' : 'false'; ?>,
                    enable_overlays: <?php echo $nextgenPlayerTemplate->getEnableOverlays() ? 'true' : 'false'; ?>,
                    infobar_opacity: <?php echo $nextgenPlayerTemplate->getInfobarOpacity() ?>,
                    template: 'light',
                    show_captions: <?php echo $nextgenPlayerTemplate->getShowCaptions() ? 'true' : 'false'; ?>,
                <?php if($nextgenPlayerTemplate->getResponsive()): ?>
                    
                    show_overlays: <?php echo $nextgenPlayerTemplate->getShowOverlays() ? 'true' : 'false'; ?>,
                    panel_can_upscale_image: <?php echo $nextgenPlayerTemplate->getShowOverlays() ? 'true' : 'false'; ?>,
                <?php endif ?>
                    
                });
                
                <?php if($nextgenPlayerTemplate->getResponsive()): ?>
                // responsive
                function resizeTheGallery(){
                    var totalhorizontalmargin = 10;
                    var totalverticalmargin = 15;
                    var id = '#<?php echo $gallery->anchor ?>_container';
                    
                    // the new width of the thumbs
                    var new_frame_width = $(id).width()/900*150;
                    var new_frame_height = $(id).width()/900*80;

                    // the new width of the panel
                    var new_panel_width = $(id).width()-totalhorizontalmargin;
                    var new_panel_height = $(id).height()-new_frame_height-totalverticalmargin;

                    // call the new resize method
                    $gallery.resizeGalleryView(new_panel_width, new_panel_height, new_frame_width, new_frame_height);
    		}
            
                $(window).resize(resizeTheGallery);
                resizeTheGallery();
                
                // responsive end
                <?php endif ?>
                
    <?php if ($nextgenPlayerTemplate->getShowBgChanger()): ?>
                    var bg_changer = $("#ngg_player_bg_changer").detach();
                    if (bg_changer) {
                        bg_changer.appendTo('div.gv_galleryWrap');
                        bg_changer = null;
                        $('div.gv_galleryWrap').css('z-index', 1001);
                        $("#ngg_player_bg_changer").show();
                    }
                    var bg_overlay = $('.ngg-player-bg-changer-overlay').detach();
                    if (bg_overlay) {
                        bg_overlay.appendTo('body');
                        bg_overlay = null;
                    }

                    $('div.ngg-player-bg-changer-item').live('mouseover', function() {
                        var bg = $(this).css('backgroundColor');
                        var body_w = $('body').css('width');
                        var body_h = $('body').css('height');
                        $('div.ngg-player-bg-changer-overlay').css('backgroundColor', bg);
                        $('div.ngg-player-bg-changer-overlay').width(body_w);
                        $('div.ngg-player-bg-changer-overlay').height(body_h);

                        $('div.ngg-player-bg-changer-overlay').show();
                    });
                    $('div.ngg-player-bg-changer-item').live('mouseout', function() {
                        $('div.ngg-player-bg-changer-overlay').hide();
                    });
    <?php endif ?>
        
                    $(document).bind("DOMSubtreeModified",function(){
    <?php if ($nextgenPlayerTemplate->getFixImgPossition()): ?>
                        $('.gv_panel img').css('left', '0px');
    <?php endif ?>                    
                        var gv_frame_margin = $('.gv_frame').css('margin-right');
    <?php if (!$nextgenPlayerTemplate->getMainImagePadding()): ?>
                        $('.gv_galleryWrap').css('padding-top', '0px');
                        $('.gv_galleryWrap').css('padding-right', '0px');
                        $('.gv_galleryWrap').css('padding-left', '0px');
                        
                        $('.gv_filmstripWrap').css('margin-left', gv_frame_margin);
                        $('.gv_navWrap').css('margin-right', gv_frame_margin);
    <?php endif ?>                    
        
    <?php if (!$nextgenPlayerTemplate->getShowFilmstripNav()): ?>
                        var width = $('.gv_galleryWrap').outerWidth(true) - (2.3 * parseInt(gv_frame_margin));
                        $('.gv_filmstripWrap').css('left', '0px').css('width', width + 'px');
    <?php endif ?>                    
        
                    });
    
    <?php if ($nextgenPlayerTemplate->getAutoShowInfobar()): ?>
                    $('div.gv_showOverlay').trigger('click');
    <?php endif ?> 
            });
        })(jQuery);
    </script>

<?php endif; ?>
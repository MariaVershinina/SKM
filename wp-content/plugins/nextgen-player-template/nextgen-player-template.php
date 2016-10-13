<?php

/*
  Plugin Name: NextGEN Player Template
  Plugin URI: http://piotr-tokarczyk.pl/nextgen-player-template
  Description: Integrates the jQuery Plugin Galleryview from Jack Anderson (http://www.spaceforaname.com/galleryview/) with NextGEN Gallery using custom template. Use the shortcode [nggallery id=x template="player"] to show the new layout.
  Author: Piotr Tokarczyk
  Author URI: http://piotr-tokarczyk.pl/
  Stable tag: tags/1.1.1
  Version: 1.1.1

  Copyright (c) 2011-2013 Piotr Tokarczyk PT STUDIO
  Copyright (c) 2013 Piotr Tokarczyk

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

if (!class_exists('nextgenPlayerTemplate')) {

    require_once dirname(__FILE__) . '/lib/functions.php';
    require_once dirname(__FILE__) . '/lib/settings.php';

    class nextgenPlayerTemplate {

        const NAME = 'NextGEN Player Template';
        const SLUG = 'nextgen_player_template';

        private $settingsPage;

        public function __construct() {
            $this->settingsPage = new nextgenPlayerTemplateSettings();
            add_action('wp_print_scripts', array(&$this, 'loadScripts'));
            add_action('wp_print_styles', array(&$this, 'loadStyles'));

            add_filter('ngg_render_template', array(&$this, 'addTemplate'), 10, 2);
        }

        public function addTemplate($path, $template_name = false) {
            if ($template_name == 'gallery-player')
                $path = WP_PLUGIN_DIR . '/' . plugin_basename(dirname(__FILE__)) . '/view/gallery-player.php';

            return $path;
        }

        public function loadStyles() {
            wp_enqueue_style('galleryview', plugins_url('/css/jquery.galleryview-3.0-dev.css', __FILE__));
            wp_enqueue_style('gallery-player', plugins_url('/css/gallery-player.css', __FILE__));
            wp_enqueue_style('fancybox', plugins_url('/fancybox/fancybox.css', __FILE__));
        }

        public function loadScripts() {
            $main = 'jquery.galleryview-3.0-dev.js';
            
            if($this->getResponsive()) {
                $main = 'jquery.galleryview-3.0-res.js';
            }
            
            wp_enqueue_script('fancybox', plugins_url('/fancybox/jquery.fancybox.js', __FILE__), array('jquery'), '1.3.4');
            wp_enqueue_script('jqueryeasing', plugins_url('/js/jquery.easing.1.3.js', __FILE__), array('jquery'), '1.3');
            wp_enqueue_script('galleryview', plugins_url('/js/'.$main, __FILE__), array('jquery'), '3.0');
            wp_enqueue_script('timers', plugins_url('/js/jquery.timers-1.2.js', __FILE__), array('jquery'), '1.2');
        }

        /**
         * call getters on settingsPage object
         * 
         * @param string $name
         * @param array $arguments
         * 
         * @return mixed
         */
        public function __call($name, $arguments) {

            $u_name = underscore($name);

            if (strpos($u_name, 'get_') === 0) {
                return $this->settingsPage->$name();
            }
            
            return false;
        }

    }

    global $nextgenPlayerTemplate;
    $nextgenPlayerTemplate = new nextgenPlayerTemplate();
}
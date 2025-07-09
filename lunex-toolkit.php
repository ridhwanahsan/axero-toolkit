<?php
/*
 * Plugin Name: Lunex Toolkit
 * Author: Lunex
 * Author URI: authorname.com
 * Description: A Light weight and easy toolkit for Lunex Theme.
 * Version: 1.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly cbvn 
}

define('LUNEX_TOOLKIT_VERSION', '1.0');
define('LUNEX_ACC_PATH', plugin_dir_path(__FILE__));

require_once(LUNEX_ACC_PATH . 'theme-rt.php');
require_once(LUNEX_ACC_PATH . 'inc/functions.php');

// Require files
require_once(LUNEX_ACC_PATH . 'inc/elementor.php');
require_once(LUNEX_ACC_PATH . 'inc/widgets.php');
require_once(LUNEX_ACC_PATH . 'inc/icons.php');

add_action('after_setup_theme', function() {
    require(LUNEX_ACC_PATH . 'ReduxCore/framework.php');
    require(LUNEX_ACC_PATH . 'ReduxCore/redux-sample-config.php');
    require_once LUNEX_ACC_PATH . '/inc/reusablec-block/reusablec-block.php';
    require_once LUNEX_ACC_PATH . '/inc/acf.php';
    require_once LUNEX_ACC_PATH . '/inc/demo-importer-ocdi.php';
    require_once LUNEX_ACC_PATH . '/inc/builder/core-builder.php';
    require_once LUNEX_ACC_PATH . '/inc/builder/defult-nav-walker.php';

});
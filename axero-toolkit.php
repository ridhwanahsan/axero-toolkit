<?php
/*
 * Plugin Name: Axero Toolkit
 * Author: Axero
 * Author URI: authorname.com
 * Description: A Light weight and easy toolkit for Axero Theme.
 * Version: 1.0
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly cbvn
}

define('AXERO_TOOLKIT_VERSION', '1.0');
define('AXERO_ACC_PATH', plugin_dir_path(__FILE__));

if (! defined('AXERO_IMG')) {
    define('AXERO_IMG', plugin_dir_url(__FILE__) . 'assets/images');
}


require_once AXERO_ACC_PATH . 'theme-rt.php';
require_once AXERO_ACC_PATH . 'inc/functions.php';

// Require files
require_once AXERO_ACC_PATH . 'inc/elementor.php';
require_once AXERO_ACC_PATH . 'inc/widgets.php';
require_once AXERO_ACC_PATH . 'inc/icons.php';

add_action('after_setup_theme', function () {
    require (AXERO_ACC_PATH . 'ReduxCore/framework.php');
    require (AXERO_ACC_PATH . 'ReduxCore/redux-sample-config.php');
    require_once AXERO_ACC_PATH . '/inc/reusablec-block/reusablec-block.php';
    require_once AXERO_ACC_PATH . '/inc/acf.php';
    require_once AXERO_ACC_PATH . '/inc/demo-importer-ocdi.php';
    require_once AXERO_ACC_PATH . '/inc/builder/core-builder.php';
    require_once AXERO_ACC_PATH . '/inc/builder/bootstrap-nav-walker.php';

});

<?php
$theme = wp_get_theme(); // gets the current theme
if ('Axero' == $theme->name || 'Axero' == $theme->parent_theme) {

    if (version_compare($theme->get('Version'), AXERO_TOOLKIT_VERSION, '>')) {
        function axero_toolkit_update_notice()
        {
            $update_message = sprintf(
                /* translators: %1$s: Plugins page URL, %2$s: Axero Theme Plugins page URL */
                esc_html__(
                    'A new version of Axero Toolkit is available! Please navigate to %1$s, delete the old Axero Toolkit plugin, and then install the updated version from %2$s.',
                    'axero'
                ),
                '<a href="' . esc_url(admin_url('plugins.php')) . '"><strong>' . esc_html__('Dashboard → Plugins', 'axero') . '</strong></a>',
                '<a href="' . esc_url(admin_url('admin.php?page=axero-admin-plugins')) . '"><strong>' . esc_html__('Dashboard → Axero Theme → Plugins', 'axero') . '</strong></a>'
            );

            echo '<div class="notice notice-error is-dismissible">';
            echo '<p><strong>' . esc_html__('Important Update:', 'axero') . '</strong> ' . $update_message . '</p>';
            echo '</div>';
        }
        add_action('admin_notices', 'axero_toolkit_update_notice');
    }
}

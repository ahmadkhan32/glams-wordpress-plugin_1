<?php
defined( 'ABSPATH' ) || exit;
class GLAMS_Deactivator {
    public static function deactivate() {
        flush_rewrite_rules();
        // NOTE: Tables are intentionally NOT dropped on deactivation.
        // Use uninstall.php to remove data on full deletion.
    }
}

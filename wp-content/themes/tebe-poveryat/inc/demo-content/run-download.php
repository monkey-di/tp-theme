<?php
/**
 * Runner script for downloading Figma assets
 */

define('WP_USE_THEMES', false);
require('/var/www/html/wp-load.php');
require('/var/www/html/wp-content/themes/tebe-poveryat/inc/demo-content/download-figma-assets.php');

echo "Starting Figma assets download...\n";
$results = tp_download_all_figma_assets();
echo "\n=== RESULTS ===\n";
echo "Success: " . count($results['success']) . "\n";
echo "Skipped: " . count($results['skipped']) . "\n";
echo "Failed: " . count($results['failed']) . "\n";

if (!empty($results['failed'])) {
	echo "\n=== ERRORS ===\n";
	foreach ($results['failed'] as $failed) {
		echo "- {$failed['name']}: {$failed['message']}\n";
	}
}

<?php
/**
 * Matomo - free/libre analytics platform
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\DisplayCurrentTZPlugin;

class DisplayCurrentTZPlugin extends \Piwik\Plugin
{
    public function registerEvents()
    {
        return [
            'CronArchive.getArchivingAPIMethodForPlugin' => 'getArchivingAPIMethodForPlugin',
            'AssetManager.getJavaScriptFiles' => 'getJavaScriptFiles',
        ];
    }

    // support archiving just this plugin via core:archive
    public function getArchivingAPIMethodForPlugin(&$method, $plugin)
    {
        if ($plugin == 'DisplayCurrentTZPlugin') {
            $method = 'DisplayCurrentTZPlugin.getExampleArchivedMetric';
        }
    }

    public function requiresInternetConnection(): bool
    {
        return false;
    }

    public function getJavaScriptFiles(&$files)
    {
        $files[] = "plugins/DisplayCurrentTZPlugin/javascripts/dist/displayCurrentDateTime.min.js";
    }

}

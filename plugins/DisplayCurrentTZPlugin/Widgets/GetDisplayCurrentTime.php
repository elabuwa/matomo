<?php
/**
 * Matomo - free/libre analytics platform
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\DisplayCurrentTZPlugin\Widgets;

use Piwik\Widget\Widget;
use Piwik\Widget\WidgetConfig;

/**
 * Widget to display current time
 */

class GetDisplayCurrentTime extends Widget
{
    public static function configure(WidgetConfig $config)
    {
        $config->setCategoryId('Date');

        $config->setName('DisplayCurrentTZPlugin_DisplayCurrentTime');

        $config->setOrder(99);

        $config->setIsEnabled(true);
    }

    /**
     * Render the widget
     *
     * @return string
     */
    public function render()
    {
        return $this->renderTemplate('displayCurrentTime', []);
    }

}

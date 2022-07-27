<?php
/**
 * Matomo - free/libre analytics platform
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\DisallowFileProtocol;

use Piwik\Plugins\MobileAppMeasurable\Type as MobileAppType;
use Piwik\Settings\Setting;
use Piwik\Settings\FieldConfig;

/**
 * Defines Settings for DisallowFileProtocol.
 *
 * Usage like this:
 * // require Piwik\Plugin\SettingsProvider via Dependency Injection eg in constructor of your class
 * $settings = $settingsProvider->getMeasurableSettings('DisallowFileProtocol', $idSite);
 * $settings->appId->getValue();
 * $settings->contactEmails->getValue();
 */
class MeasurableSettings extends \Piwik\Settings\Measurable\MeasurableSettings
{
    /** @var Setting */
    public $fileProtocolDisabled;

    protected function init()
    {
        $this->fileProtocolDisabled = $this->makeFileProtocolDisableSetting();
    }

    private function makeFileProtocolDisableSetting()
    {
        $defaultValue = true;
        $type = FieldConfig::TYPE_BOOL;

        return $this->makeSetting('fileProtocolDisabled', $defaultValue, $type, function (FieldConfig $field) {
            $field->title = 'File Protocol Is Disabled From Being Tracked';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
        });
    }

}

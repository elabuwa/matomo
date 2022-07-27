<?php

namespace Piwik\Plugins\DisallowFileProtocol\Tracker;

use Piwik\Exception\Exception;
use Piwik\Plugin\SettingsProvider;
use Piwik\Tracker\RequestProcessor as RP;
use Piwik\Tracker\Visit\VisitProperties;
use Piwik\Tracker\Request;

class RequestProcessor extends RP
{

    /**
     * Identifies protocol from URL and if protocol is "file" then check site setting
     * for "DisallowFileProtocol" before processing request
     */
    public function processRequestParams(VisitProperties $visitProperties, Request $request)
    {
        try {
            $siteId = $request->getParam('idsite');
            $trackingUrl = $request->getParam('url');

            $settingsProvider = new SettingsProvider();
            if(parse_url($trackingUrl, PHP_URL_SCHEME) === 'file'){
                return $settingsProvider->getMeasurableSettings('DisallowFileProtocol', $siteId);
            }
        } catch (Exception $exception){
            return false;
        }
    }
}

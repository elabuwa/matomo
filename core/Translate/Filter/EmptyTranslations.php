<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 * @category Piwik
 * @package Piwik
 */

namespace Piwik\Translate\Filter;

use Piwik\Translate\Filter\FilterAbstract;

/**
 * @package Piwik
 * @subpackage Piwik_Translate
 */
class EmptyTranslations extends FilterAbstract
{
    /**
     * Filter the given translations
     *
     * @param array $translations
     *
     * @return array   filtered translations
     *
     */
    public function filter($translations)
    {
        $translationsBefore = $translations;

        foreach ($translations AS $plugin => &$pluginTranslations) {

            $pluginTranslations = array_filter($pluginTranslations, function($value) {
                return !empty($value) && '' != trim($value);
            });

            $diff = array_diff($translationsBefore[$plugin], $pluginTranslations);
            if (!empty($diff)) $this->_filteredData[$plugin] = $diff;
        }

        // remove plugins without translations
        $translations = array_filter($translations, function($value) {
            return !empty($value) && count($value);
        });

        return $translations;
    }
}
<?php
namespace MaxServ\Replacecontent\Hook;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

/**
 * Search and replace in generated page using regular expressions
 */
class ContentPostProcAll
{

    /**
     * Search for a string and replace it with something else.
     *
     * You must set the Search and Replace patterns via TypoScript.
     *
     * TypoScript setup usage:
     *   config.tx_replacecontent {
     *     search {
     *       1 = #(src|href)=("|')(/?)(typo3temp|fileadmin|uploads)/#
     *       2 = lala
     *     }
     *     replace {
     *       1 = $1=$2{$config.tx_replacecontent.schema}{$config.tx_replacecontent.host}/$4/
     *       2 = Smörgåsbord
     *     }
     *   }
     *
     * @param array $parameters Parameters delivered by the caller (tslib_fe)
     * @param TypoScriptFrontendController $parentObject The parent object (tslib_fe)
     * @return void
     */
    public function replaceContent(&$parameters, TypoScriptFrontendController $parentObject)
    {
        if (TYPO3_MODE === 'FE') {

            // Fetch configuration
            $configuration = $parentObject->config['config']['tx_replacecontent.'];

            // Quit if no search/replace configuration is found
            if (!is_array($configuration['search.']) || !is_array($configuration['replace.'])) {
                return;
            }

            // Replace Content
            $parameters['pObj']->content = preg_replace(
                $configuration['search.'],
                $configuration['replace.'],
                $parameters['pObj']->content
            );
        }
    }
}

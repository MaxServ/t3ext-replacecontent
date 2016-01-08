<?php
namespace MaxServ\Replacecontent;

/**
 *  Copyright notice
 *
 *  ⓒ 2016 Michiel Roos <michiel@maxserv.com>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is free
 *  software; you can redistribute it and/or modify it under the terms of the
 *  GNU General Public License as published by the Free Software Foundation;
 *  either version 2 of the License, or (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful, but
 *  WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 *  or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
 *  more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 */

/**
 * Search and replace in generated page using regular expressions
 *
 * Class ContentPostProcAll
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
     *       1 =
     * $1=$2{$config.tx_replacecontent.schema}{$config.tx_replacecontent.host}/$4/
     *       2 = Smörgåsbord
     *     }
     *   }
     *
     * @param   array $params : Parameters delivered by the caller (tslib_fe)
     * @param   object $parent : The parent object (tslib_fe)
     *
     * @return  void
     */
    public function replaceContent(&$params, $parent)
    {
        if (TYPO3_MODE == 'FE') {
            // Fetch configuration
            $config = $parent->config['config']['tx_replacecontent.'];

            // Quit if no search/replace configuration is found
            if (!is_array($config['search.']) || !is_array($config['replace.'])) {
                return;
            }

            // Replace Content
            $params['pObj']->content = preg_replace($config['search.'], $config['replace.'], $params['pObj']->content);
        }
    }
}

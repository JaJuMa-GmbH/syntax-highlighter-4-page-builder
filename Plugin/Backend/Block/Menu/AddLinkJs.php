<?php
/**
 * @author    JaJuMa GmbH <info@jajuma.de>
 * @copyright Copyright (c) 2023-present JaJuMa GmbH <https://www.jajuma.de>. All rights reserved.
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 */

namespace Jajuma\SyntaxHighlighter\Plugin\Backend\Block\Menu;

use Magento\Backend\Block\Menu;
use Magento\Framework\Exception\LocalizedException;

class AddLinkJs
{
    /**
     * After to html
     *
     * @param Menu $subject
     * @param string $html
     * @return string
     * @throws LocalizedException
     */
    public function afterToHtml(Menu $subject, string $html): string
    {
        $js = $subject->getLayout()->createBlock(\Magento\Backend\Block\Template::class)
            ->setTemplate('Jajuma_SyntaxHighlighter::backend/menu/link_blank.phtml')
            ->toHtml();

        return $html . $js;
    }
}

<?php
/**
 * @author    JaJuMa GmbH <info@jajuma.de>
 * @copyright Copyright (c) 2023-present JaJuMa GmbH <https://www.jajuma.de>. All rights reserved.
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 */

declare(strict_types=1);

namespace Jajuma\SyntaxHighlighter\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Jajuma\SyntaxHighlighter\Model\Config\Source\Theme;
use Magento\Framework\App\Helper\Context;

class Data extends AbstractHelper
{
    /**
     * @var Theme
     */
    protected Theme $theme;

    /**
     * Initialize
     *
     * @param Context $context
     * @param Theme $theme
     */
    public function __construct(
        Context $context,
        Theme $theme
    ) {
        parent::__construct($context);
        $this->theme = $theme;
    }

    /**
     * Get themes
     *
     * @return array[]
     */
    public function getThemes(): array
    {
        return $this->theme->toOptionArray();
    }
}

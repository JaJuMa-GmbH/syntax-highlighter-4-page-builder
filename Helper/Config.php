<?php
/**
 * @author    JaJuMa GmbH <info@jajuma.de>
 * @copyright Copyright (c) 2023-present JaJuMa GmbH <https://www.jajuma.de>. All rights reserved.
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 */

declare(strict_types=1);

namespace Jajuma\SyntaxHighlighter\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Config extends AbstractHelper
{
    private const XML_PATH_ENABLE = 'syntaxhighlighter/general/enabled';

    private const XML_PATH_THEME = 'syntaxhighlighter/general/theme';

    private const XML_PATH_LINE_NUMBERS = 'syntaxhighlighter/general/line_numbers';

    private const XML_PATH_INLINE_COLOR = 'syntaxhighlighter/general/inline_color';

    private const XML_PATH_PREVIEWERS = 'syntaxhighlighter/general/previewers';

    private const XML_PATH_MATCH_BRACES = 'syntaxhighlighter/general/match_braces';

    private const XML_PATH_INVISIBLES = 'syntaxhighlighter/general/invisibles';

    /**
     * Is Enable
     *
     * @return bool
     */
    public function isEnable(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ENABLE);
    }

    /**
     * Get default theme
     *
     * @return string
     */
    public function getTheme(): string
    {
        return (string)$this->scopeConfig->getValue(self::XML_PATH_THEME);
    }

    /**
     * Is line numbers enable
     *
     * @return bool
     */
    public function isLineNumbersEnable(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_LINE_NUMBERS);
    }

    /**
     * Is inline color enable
     *
     * @return bool
     */
    public function isInlineColorEnable(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_INLINE_COLOR);
    }

    /**
     * Is previewers enable
     *
     * @return bool
     */
    public function isPreviewersEnable(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_PREVIEWERS);
    }

    /**
     * Is match braces enable
     *
     * @return bool
     */
    public function isMatchBracesEnable(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_MATCH_BRACES);
    }

    /**
     * Is invisibles enable
     *
     * @return bool
     */
    public function isInvisiblesEnable(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_INVISIBLES);
    }
}

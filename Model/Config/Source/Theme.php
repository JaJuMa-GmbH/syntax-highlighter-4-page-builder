<?php
/**
 * @author    JaJuMa GmbH <info@jajuma.de>
 * @copyright Copyright (c) 2023-present JaJuMa GmbH <https://www.jajuma.de>. All rights reserved.
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 */

namespace Jajuma\SyntaxHighlighter\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Theme implements ArrayInterface
{
    /**
     * To option array
     *
     * @return array[]
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 'prism-jajuma-dark', 'label' => __('JaJuMa Hyvänaut Dark')],
            ['value' => 'prism-hyva-light', 'label' => __('Hyvä Light')],
            ['value' => 'prism-dabblet', 'label' => __('Dabblet')],
            ['value' => 'prism-a11y-dark', 'label' => __('A11y Dark')],
            ['value' => 'prism-atom-dark', 'label' => __('Atom Dark')],
            [
                'value' => 'prism-base16-ateliersulphurpool.light',
                'label' => __('Base16 Ateliersulphurpool Light')
            ],
            ['value' => 'prism-cb', 'label' => __('CB')],
            ['value' => 'prism-coldark-cold', 'label' => __('Coldark Cold')],
            ['value' => 'prism-coldark-dark', 'label' => __('Coldark Dark')],
            ['value' => 'prism-coy-without-shadows', 'label' => __('Coy Without Shadows')],
            ['value' => 'prism-darcula', 'label' => __('Darcula')],
            ['value' => 'prism-dracula', 'label' => __('Dracula')],
            ['value' => 'prism-duotone-dark', 'label' => __('Duotone Dark')],
            ['value' => 'prism-duotone-earth', 'label' => __('Duotone Earth')],
            ['value' => 'prism-duotone-forest', 'label' => __('Duotone Forest')],
            ['value' => 'prism-duotone-light', 'label' => __('Duotone Light')],
            ['value' => 'prism-duotone-sea', 'label' => __('Duotone Sea')],
            ['value' => 'prism-duotone-space', 'label' => __('Duotone Space')],
            ['value' => 'prism-ghcolors', 'label' => __('Ghcolors')],
            ['value' => 'prism-gruvbox-dark', 'label' => __('Gruvbox Dark')],
            ['value' => 'prism-gruvbox-light', 'label' => __('Gruvbox Light')],
            ['value' => 'prism-holi-theme', 'label' => __('Holi Theme')],
            ['value' => 'prism-hopscotch', 'label' => __('Hopscotch')],
            ['value' => 'prism-laserwave', 'label' => __('Laserwave')],
            ['value' => 'prism-lucario', 'label' => __('Lucario')],
            ['value' => 'prism-material-dark', 'label' => __('Material Dark')],
            ['value' => 'prism-material-light', 'label' => __('Material Light')],
            ['value' => 'prism-material-oceanic', 'label' => __('Material Oceanice')],
            ['value' => 'prism-night-owl', 'label' => __('Night Owl')],
            ['value' => 'prism-nord', 'label' => __('Nord')],
            ['value' => 'prism-one-dark', 'label' => __('One Dark')],
            ['value' => 'prism-one-light', 'label' => __('One Light')],
            ['value' => 'prism-pojoaque', 'label' => __('Pojoaque')],
            ['value' => 'prism-shades-of-purple', 'label' => __('Shades Of Purple')],
            ['value' => 'prism-solarized-dark-atom', 'label' => __('Solarized Dark Atom')],
            ['value' => 'prism-synthwave84', 'label' => __('Synthwave84')],
            ['value' => 'prism-vs', 'label' => __('VS')],
            ['value' => 'prism-vsc-dark-plus', 'label' => __('Vsc Dark Plus')],
            ['value' => 'prism-xonokai', 'label' => __('Xonokai')],
            ['value' => 'prism-z-touch', 'label' => __('Z Touch')],
        ];
    }
}

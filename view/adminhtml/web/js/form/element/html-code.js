define([
    'jquery',
    'Magento_Ui/js/modal/modal',
    'uiRegistry'
], function ($, modal, uiRegistry) {
    'use strict';

    let mixin = {
        defaults: {
            elementTmpl: 'Jajuma_SyntaxHighlighter/form/element/html-code'
        },

        initialize: function () {
            this._super();
            if (window.syntaxHighlighter.enable === false) {
                this.elementTmpl = 'Magento_PageBuilder/form/element/html-code';
            }
            return this;
        }
    };

    return function (target) {
        return target.extend(mixin);
    };
});

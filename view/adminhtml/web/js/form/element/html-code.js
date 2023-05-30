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
        },

        updateSyntax: function (element) {
            let text = this.value();
            let nextElement = element.nextElementSibling;
            if (nextElement.classList.contains('jajuma-syntax-highlighter-highlighting') === false) {
                return;
            }

            this.updateTheme();

            let codes = nextElement.getElementsByTagName('code');
            if (codes.length) {
                let result_element = codes[0];
                if (text[text.length-1] === "\n") {
                    text += " ";
                }
                result_element.innerHTML = text.replace(new RegExp("&", "g"), "&amp;").replace(new RegExp("<", "g"), "&lt;");
                Prism.highlightElement(result_element);
            }
        },

        updateTheme: function () {
            let theme = window.syntaxHighlighter.theme;
            let links = document.querySelectorAll('link');
            for (let i = 0; i < links.length; i++) {
                let link = links[i];
                let href = link.href;
                if (href.includes('Jajuma_SyntaxHighlighter/css/themes/')) {
                    let hrefArr = href.split('/');
                    let currentTheme = hrefArr[hrefArr.length - 1];
                    let newTheme = theme + '.css';
                    link.href = href.replace('/css/themes/' + currentTheme, '/css/themes/' + newTheme);
                    return;
                }
            }
        }
    };

    return function (target) {
        return target.extend(mixin);
    };
});

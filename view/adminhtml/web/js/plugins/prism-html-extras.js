(function (Prism) {
    Prism.languages.html['magento_template'] = {
        pattern: /\{\{[\s\S]*?\}\}/,
        inside: {
            "ld": {
                pattern: /^(?:\{\{\-?\-?\/*\s*\w+)/,
                inside: {
                    "delimiter": /^(?:\{\{\/*)\-?/,
                    "keyword": /\w+/
                }
            },
            "rd": {
                pattern: /\-?(?:%\}|\}\})$/,
                inside: {
                    "delimiter": /.*/
                }
            },
            "string": {
                pattern: /("|')(?:\\?.)*?\1/,
                inside: {
                    "punctuation": /^['"]|['"]$/
                }
            },
            "keyword": /\b(?:raw|escape|nl2br)\b/,
            "operator": /=/,
            "variable": /\$\w+\b/i,
            "property": /\b[a-zA-Z_][a-zA-Z0-9_]*\b/,
            "punctuation": /[()\[\]{}:.,]/
        }
    }
}(Prism));

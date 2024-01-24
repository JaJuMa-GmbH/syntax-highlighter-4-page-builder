var grammer = {
    "tag": {
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
};

Prism.languages.magentotemplate = grammer;

if ( Prism.languages.markup ) {
    Prism.hooks.add( "before-highlight", function( env ) {
        "use strict";
        if ( env.language !== "magentotemplate" ) {
            return;
        }

        env.tokenStack = [];
        env.backupCode = env.code;
        env.code = env.code.replace( /(?:\{\{)[\w\W]*?(?:\}\})/ig, function( match ) {
            env.tokenStack.push( match );
            return "{{{MAGENTO" + env.tokenStack.length + "}}}";
        } );
    } );

    Prism.hooks.add( "before-insert", function( env ) {
        "use strict";
        if ( env.language === "magentotemplate" ) {
            env.code = env.backupCode;
            delete env.backupCode;
        }
    } );

    Prism.hooks.add( "after-highlight", function( env ) {
        "use strict";
        if ( env.language !== "magentotemplate" ) {
            return;
        }

        for ( var i = 0, t; t = env.tokenStack[ i ]; i++ ) {
            env.highlightedCode = env.highlightedCode.replace(
                "{{{MAGENTO" + ( i + 1 ) + "}}}",
                Prism.highlight( t, grammer, "magentotemplate" )
            );
        }

        env.element.innerHTML = env.highlightedCode;
    } );

    Prism.hooks.add( "wrap", function( env ) {
        "use strict";
        if ( env.language === "magentotemplate" && env.type === "markup" ) {
            env.content = env.content.replace(
                /(\{\{\{MAGENTO[0-9]+\}\}\})/g,
                "<span class=\"token magentotemplate\">$1</span>"
            );
        }
    } );

    Prism.languages.insertBefore( "magentotemplate", "tag", {
        "markup": {
            pattern: /<[^?]\/?(.*?)>/,
            inside: Prism.languages.markup
        },
        "magentotemplate": /\{\{\{MAGENTO[0-9]+\}\}\}/
    } );
}

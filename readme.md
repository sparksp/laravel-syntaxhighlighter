# SyntaxHighlighter for Laravel

A simple bundle to provide [SyntaxHighlighter](http://alexgorbatchev.com/SyntaxHighlighter/) functions.

## Installation

Drop the **syntaxhighlighter** bundle into your **/bundles** directory and copy the contents of the **syntaxhighlighter/public** directory over to **/public/bundles/syntaxhighligter** (you may have to create some directories).

## Highlight some code

Just start the bundle and highlight some code:

    Bundle::start('syntaxhighlighter');
    echo SyntaxHighlighter::highlight($code, 'html');

You'll also need to output the scripts from the 'footer' asset container somewhere, I suggest the end of your layout or footer partial.

    echo Asset::container('footer')->scripts();

## Configuration

You can change the default style and language in the **config/default.php**.  If you add any new brushes you can configure them in **config/brush.php**.

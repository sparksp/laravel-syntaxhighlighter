# SyntaxHighlighter Bundle, by Phill Sparks

A [SyntaxHighlighter](http://alexgorbatchev.com/SyntaxHighlighter/) bundle for Laravel, installable via the Artisan CLI:

    php artisan bundle:install syntaxhighlighter
    php artisan bundle:publish syntaxhighlighter

Then start the bundle and highlight some code:

    Bundle::start('syntaxhighlighter');
    echo SyntaxHighlighter::highlight($code, 'html');

You'll also need to output the scripts from the 'footer' asset container somewhere (like the end of your layout):

    echo Asset::container('footer')->scripts();

You can change the default style and language in the **config/default.php**.  If you add any new brushes you can configure them in **config/brush.php**.

# SyntaxHighlighter Bundle

A [SyntaxHighlighter](http://alexgorbatchev.com/SyntaxHighlighter/) bundle for Laravel.

## Installation

Install and publish via the Artian CLI:

```sh
php artisan bundle:install syntaxhighlighter
php artisan bundle:publish syntaxhighlighter
```

Or download the zip and unpack into your **bundles** directory, and copy the public files in to **public/bundles/syntaxhighlighter**.

## Bundle Registration

You need to register SyntaxHighlighter with your application before you can use it. Simply edit application/bundles.php and add the following to the array:

```php
'topos' => array(
    'autoloads' => array(
        'map' => array(
            'Topos\\Menu' => '(:bundle)/menu.php',
        ),
    ),
),
```

Alternatively you can add just 'syntaxhighlighter' and use Bundle::start('syntaxhighlighter') each time before you want to use it.

## Guide

Start the bundle and highlight some code:

```php
echo SyntaxHighlighter::highlight($code, 'html');
```

You'll also need to output the scripts from the 'footer' asset container somewhere (like the end of your layout):

```php
echo Asset::container('footer')->scripts();
```

## Configure

You can change the default style and language in the **config/default.php**.  If you add any new brushes you can configure them in **config/brush.php**.

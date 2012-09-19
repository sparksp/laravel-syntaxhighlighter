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
'syntaxhighlighter' => array('auto' => true),
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

### Example
syntax.blade.php:
```php
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Syntax highlight example</title>
	<meta name="viewport" content="width=device-width">

</head>
<body>
	<h2>Syntax example!</h2>
	<code>
		<?php echo SyntaxHighlighter::highlight("main(int argc, char *argv[])\n{\n  int i = 0;\n  i += 1;\n  printf (\"Hello World!\\n\");\n}", 'cpp'); ?>
	</code>
	<?php echo Asset::container('footer')->scripts();?>
	<?php echo Asset::scripts (); ?>
	<?php echo Asset::styles (); ?>
</body>
</html>
```

## Configure

You can change the default style and language in the **config/default.php**.  If you add any new brushes you can configure them in **config/brush.php**.

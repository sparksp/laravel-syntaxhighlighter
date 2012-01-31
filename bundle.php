<?php

/**
 * SyntaxHighlighter Bundle
 * 
 * A simple bundle to provide SyntaxHighlighter functions.
 * 
 * <code>
 *     Bundle::start('syntaxhighlighter');
 *     echo SyntaxHighlighter::highlight($code, 'html');
 * </code>
 * 
 * @package     Bundles
 * @subpackage  SyntaxHighlighter
 * @author      Phill Sparks <me@phills.me.uk>
 * 
 * @see http://alexgorbatchev.com/SyntaxHighlighter/
 */
class SyntaxHighlighter {

	/**
	 * Highlight the code in the given language.
	 * 
	 * Adds required JavaScript to the 'footer' container, CSS to the 'default' container
	 * and returns HTML to highlight the given code.
	 * 
	 * @param  string $code
	 * @param  string $language  One of the language keys in the brushes list.
	 * @param  array  $options   Additional SyntaxHighlighter parameters.
	 * @return string
	 */
	public static function highlight($code, $language = 'default', array $options = array())
	{
		$brush = Config::get("syntaxhighlighter::brush.$language");
		
		// If the brush is not found then we fall back on the default language.
		if (is_null($brush))
		{
			$language = Config::get('syntaxhighlighter::default.language', 'text');
			$brush    = Config::get("syntaxhighlighter::brush.$language");
		}

		// Add the style asset, unless it's been blanked.
		$style = Config::get('syntaxhighlighter::default.style', '');
		if ( ! empty($style));
		{
			Asset::add('syntaxhighlighter: style', 'bundles/syntaxhighlighter/styles/'.$style.'.css');
		}

		// We add the scripts to the footer container so that they don't slow down the initial page
		// load.  You'll need to render this asset container somewhere in your layout, for example:
		// 
		// <code>
		//     echo Asset::container('footer')->scripts();
		// </code>
		// 
		$assets = Asset::container('footer');
		$assets->add('syntaxhighlighter: core', 'bundles/syntaxhighlighter/scripts/shCore.js');
		$assets->add('syntaxhighlighter: brush: '. $brush, 'bundles/syntaxhighlighter/scripts/'.$brush.'.js');
		$assets->add('syntaxhighlighter: start', 'bundles/syntaxhighlighter/scripts/shStart.js');

		// Add the brush language to the options and return the HTML.
		$options['brush'] = $language;
		return '<pre class="'.static::options($options).'">'. HTML::entities($code) .'</pre>';
	}

	/**
	 * Return a string of the SyntaxHighlighter options for the HTML class.
	 * 
	 * @param  array  $options
	 * @return string
	 */
	protected static function options(array $options)
	{
		$string = '';
		foreach ($options as $key => $value)
		{
			$string .= "$key: $value; ";
		}
		return rtrim($string, "; ");
	}

}

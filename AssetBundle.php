<?php
/**
 * @author David Hirtz <hello@davidhirtz.com>
 * @copyright Copyright (c) 2016 David Hirtz
 * @version 1.0
 */
namespace davidhirtz\yii2\lazysizes;
use Yii;
use yii\web\View;

/**
 * Class AssetBundle.
 * @package davidhirtz\yii2\lazysizes
 */
class AssetBundle extends \yii\web\AssetBundle
{
	/**
	 * @inherit
	 */
	public $sourcePath = '@bower/lazysizes';

	/**
	 * @inherit
	 */
	public $publishOptions=[
		'only'=>[
			'plugins/',
			'lazysizes.min.js',
		],
	];

	/**
	 * @inherit
	 */
	public $js=[
		'lazysizes.min.js',
	];

	/**
	 * @inherit
	 */
	public $jsOptions=[
		'position'=>View::POS_BEGIN,
	];
}
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
	 * @var array
	 */
	public $js=[
		[
			'lazysizes.min.js',
			'position'=>View::POS_HEAD,
			'async'=>true,
		],
	];

	/**
	 * Overrides path with CDN url.
	 */
	public function init()
	{
		if(!YII_DEBUG)
		{
			$this->sourcePath=null;
			$this->js[0][0]='//cdnjs.cloudflare.com/ajax/libs/lazysizes/4.0.4/lazysizes.min.js';
		}

		parent::init();
	}
}
<?php
/**
 * @author David Hirtz <hello@davidhirtz.com>
 * @copyright Copyright (c) 2016 David Hirtz
 * @version 1.1
 */

namespace davidhirtz\yii2\lazysizes;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use Yii;

/**
 * Class Html.
 * @package davidhirtz\yii2\lazysizes
 */
class Html extends \yii\helpers\Html
{
	/**
	 * @var bool
	 */
	private static $isRegistered=false;

	/**
	 * @param array|string can be a string
	 * @inheritdoc
	 */
	public static function lazyImg($src, $options=[])
	{
		if(!self::$isRegistered)
		{
			AssetBundle::register(Yii::$app->getView());
			self::$isRegistered=true;
		}

		if(is_string($src))
		{
			$options['data-src']=Url::to($src);
		}

		elseif(is_array($src))
		{
			$srcset=[];

			foreach($src as $width=>$url)
			{
				$url=Url::to($url);
				$srcset[]=“$url {$width}w";
			}

			$options['data-srcset']=implode(', ', $srcset);
			$options['data-sizes']=ArrayHelper::getValue($options, 'data-sizes', 'auto');
		}

		return static::beginTag('img', $options);
	}
}
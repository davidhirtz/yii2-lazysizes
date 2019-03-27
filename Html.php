<?php
/**
 * @author David Hirtz <hello@davidhirtz.com>
 * @copyright Copyright (c) 2016 David Hirtz
 * @version 1.2.1
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
     * @param array|string $srcset
     * @param array $options
     * @param bool|string $scheme
     * @return string
     */
    public static function lazyImg($srcset, $options=[], $scheme=false)
    {
        if(!static::$isRegistered)
        {
            AssetBundle::register(Yii::$app->getView());
            static::$isRegistered=true;
        }

        if(is_string($srcset))
        {
            $options['data-src']=Url::to($srcset, $scheme);
        }
        else
        {
            $sizes=[];

            foreach($srcset as $width=>$url)
            {
                $sizes[]=Url::to($url, $scheme)." {$width}w";
            }

            if(count($sizes)>1)
            {
                $options['data-srcset']=implode(',', $sizes);
                $options['data-sizes']=ArrayHelper::getValue($options, 'data-sizes', 'auto');
            }

            $options['data-src']=Url::to(array_shift($srcset), $scheme);
        }

        if(empty($options['class']))
        {
            $options['class']='lazyload';
        }

        return static::beginTag('img', $options);
    }
}
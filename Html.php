<?php
/**
 * @author David Hirtz <hello@davidhirtz.com>
 * @copyright Copyright (c) 2020 David Hirtz
 * @version 2.1
 */

namespace davidhirtz\yii2\lazysizes;

use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * Class Html.
 * @package davidhirtz\yii2\lazysizes
 */
class Html extends \yii\helpers\Html
{
    /**
     * @param array|string $srcset
     * @param array $options
     * @param bool|string $scheme
     * @return string
     */
    public static function lazyImg($srcset, $options = [], $scheme = false): string
    {
        $options['data-src'] = static::getSrc($srcset, $scheme);

        if (is_array($srcset) && count($srcset) > 1) {
            $options['data-srcset'] = static::getSrcset($srcset, $scheme);
            $options['data-sizes'] = ArrayHelper::getValue($options, 'data-sizes', 'auto');
        }

        if (empty($options['class'])) {
            $options['class'] = 'lazyload';
        }

        return static::beginTag('img', $options);
    }

    /**
     * @param array $srcset
     * @param bool|string $scheme
     * @return string
     */
    public static function getSrc($srcset, $scheme = false): string
    {
        return Url::to(is_string($srcset) ? $srcset : array_shift($srcset), $scheme);
    }

    /**
     * @param array|string $srcset
     * @param bool|string $scheme
     * @return string
     */
    public static function getSrcset($srcset, $scheme = false): string
    {
        if (is_string($srcset)) {
            return Url::to($srcset, $scheme);
        }

        $sizes = [];
        foreach ($srcset as $width => $url) {
            $sizes[$width] = Url::to($url, $scheme) . " {$width}w";
        }

        ksort($sizes);

        return implode(',', $sizes);
    }
}
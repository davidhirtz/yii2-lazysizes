yii2-lazysizes extension
===================
[lazysizes](https://github.com/aFarkas/lazysizes) is a fast (jank-free), SEO-friendly and self-initializing lazyloader for images (including responsive images picture/srcset), iframes, scripts/widgets and much more.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

```bash
php composer.phar require --prefer-dist davidhirtz/yii2-lazysizes "*"
```


Usage
-----

Once the extension is installed, simply use it in your views. The following example shows you how to add an lazysizes powered image tag.

```php
\davidhirtz\yii2\lazysizes\AssetBundle::register($this);
echo \davidhirtz\yii2\lazysizes\Html::lazyImg($srcset, $options);
```

Upgrade from V1
-----
Important: `AssetBundle` is no longer registered by calling `Html::lazyImg()`.
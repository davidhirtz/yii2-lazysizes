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

Once the extension is installed, simply use it in your code. The following example shows you how to add an lazysizes powered image tag.

```php
echo \davidhirtz\yii2\lazysizes\Html::lazyImg($srcset, $options);
```
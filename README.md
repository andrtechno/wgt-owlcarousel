Owl Carousel Widget 2
============================

The OwlCarouselWidget is a Yii2 wrapper for the [Owl Carousel 2] (https://owlcarousel2.github.io/OwlCarousel2/)

[![Latest Stable Version](https://poser.pugx.org/anix/wgt-owlcarousel/v/stable.svg)](https://packagist.org/packages/anix/wgt-owlcarousel)
[![Total Downloads](https://poser.pugx.org/anix/wgt-owlcarousel/downloads.svg)](https://packagist.org/packages/anix/wgt-owlcarousel)


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist panix/wgt-owlcarousel "*"
```

or add

```
"panix/wgt-owlcarousel": "*"
```

to the require section of your `composer.json` file.

Plugin options
-----
see at https://owlcarousel2.github.io/OwlCarousel2/docs/api-options.html

Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php
use panix\owlcarousel\OwlCarouselWidget;

OwlCarouselWidget::begin([
    'container' => 'div',
    'containerOptions' => [
        'id' => 'container-id',
        'class' => 'container-class'
    ],
    'pluginOptions'    => [
        'autoplay'          => true,
        'autoplayTimeout'   => 3000,
        'items'             => 3,
        'loop'              => true,
        'itemsDesktop'      => [1199, 3],
        'itemsDesktopSmall' => [979, 3]
    ]
]);
?>

<div class="item-class"><img src="/img/1.jpg" alt="Image 1"></div>
<div class="item-class"><img src="/img/2.jpg" alt="Image 2"></div>
<div class="item-class"><img src="/img/3.jpg" alt="Image 3"></div>
<div class="item-class"><img src="/img/4.jpg" alt="Image 4"></div>


<?php OwlCarouselWidget::end(); ?>

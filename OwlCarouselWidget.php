<?php

namespace panix\ext\owlcarousel;

use yii\helpers\Html;


class OwlCarouselWidget extends \yii\base\Widget {

    /**
     * @var string prefix for the autogenerated id
     */
    public static $autoIdPrefix = 'owl';

    /**
     * @var string the widget container element
     * Defaults to div
     */
    public $container;

    /**
     * @var array the HTML attributes for the widget container
     * Defaults to an auto generated id and class => "owl-carousel"
     */
    public $containerOptions = [];

    /**
     * @var array options for the Owl Carousel plugin
     * @link https://owlcarousel2.github.io/OwlCarousel2/docs/api-options.html Available Options
     */
    public $pluginOptions = [];

    /**
     * Initializes the widget.
     */
    public function init() {
        parent::init();
        if (!isset($this->container)):
            $this->container = 'div';
        endif;
        if (!is_array($this->containerOptions)):
            $this->containerOptions = [];
        endif;
        if (!is_array($this->pluginOptions)):
            $this->pluginOptions = [];
        endif;
        $this->initOptions();
        ob_start();
    }

    /**
     * Intialises the plugin options
     */
    protected function initOptions() {
        $this->containerOptions = array_merge([
            'id' => $this->getId()
                ], $this->containerOptions);
        Html::addCssClass($this->containerOptions, 'owl-carousel');
    }

    /**
     * Registers the needed assets.
     *
     * @param \yii\web\View $view The View object
     */
    public function registerAssets($view) {
        OwlCarouselAsset::register($view);
        $js = 'jQuery("#' . $this->containerOptions['id'] . '").owlCarousel(' . "\n";
        $js .= json_encode($this->pluginOptions) . "\n";
        $js .= ");\n";
        $view->registerJs($js, $view::POS_READY);
    }

    /**
     * Executes the widget.
     * @return string the result of widget execution to be outputted.
     */
    public function run() {
        $content = ob_get_clean();
        $view = $this->getView();
        $this->registerAssets($view);
        return Html::tag($this->container, $content, $this->containerOptions);
    }

}

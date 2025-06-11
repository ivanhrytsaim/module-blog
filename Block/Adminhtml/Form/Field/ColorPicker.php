<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Adminhtml\Form\Field;

use Magefan\Community\Api\SecureHtmlRendererInterface;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\View\Element\Template;
use Magento\Framework\Data\Form\Element\Factory;

class ColorPicker extends \Magento\Framework\View\Element\Template
{

    /**
     * @var Factory
     */

    private $elementFactory;

    /**
     * @var SecureHtmlRendererInterface
     */
    private $mfSecureRenderer;

    /**
     * @param Template\Context $context
     * @param Factory $elementFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Factory          $elementFactory,
        SecureHtmlRendererInterface $mfSecureRenderer,
        array            $data = []
    )
    {
        $this->elementFactory = $elementFactory;
        parent::__construct($context, $data);
        $this->mfSecureRenderer = $mfSecureRenderer;
    }

    /**
     * @param AbstractElement $element
     * @return AbstractElement
     */
    public function prepareElementHtml(AbstractElement $element): AbstractElement
    {
        $value = $element->getValue() ?: $this->getData('defaultValue');

        $input = $this->elementFactory->create("text", ['data' => $element->getData()]);
        $input->setId($element->getId());
        $input->setForm($element->getForm());
        $input->addCustomAttribute('style', 'width: 100%');
        $input->setClass('widget-option input-text admin__control-text');
        $input->setValue($value);
        $script = '
            require(["jquery", "jquery/colorpicker/js/colorpicker", "domReady!"], function ($) {
                var el = $("#' . $input->getHtmlId() . '");
                
                var link = document.createElement("link");
                link.rel = "stylesheet";
                link.href = require.toUrl("jquery/colorpicker/css/colorpicker.css");
                document.head.appendChild(link);

                el.css("background-color", "#' . $value . '");
                el.ColorPicker({
                    layout: "hex",
                    onChange: function (hsb, hex, rgb) {
                        el.css("background-color", "#"+hex);
                        el.val(hex);
                    },
                    onShow: function (picker) {
                        $(picker).css("z-index", "9999");
                    }
                }).keyup(function() {
                    var value = el.val();
                    $(this).ColorPickerSetColor(value);
                    el.css("background-color", "#" + value);
                });
            });
        ';

        $element->setData('after_element_html', $input->getElementHtml() . $this->mfSecureRenderer->renderTag('script', [], $script, false));
        $element->setValue('');

        return $element;
    }
}
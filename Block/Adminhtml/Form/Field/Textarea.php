<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Adminhtml\Form\Field;

use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\View\Element\Template;
use Magento\Framework\Data\Form\Element\Factory;

class Textarea extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Factory
     */
    private $elementFactory;

    /**
     * @param Template\Context $context
     * @param Factory $elementFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Factory $elementFactory,
        array $data = []
    )
    {
        $this->elementFactory = $elementFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function _toHtml(): string
    {
        $inputName = $this->getInputName();
        $column = $this->getColumn();

        return '<textarea id="' . $this->getInputId() . '" name="' . $inputName . '" ' .
            ($column['size'] ? 'size="' . $column['size'] . '"' : '') . ' class="' .
            ($column['class'] ?? 'input-text') . '"' .
            'placeholder="' . ucfirst($this->getData('column_name')) . '"' .
            (isset($column['style']) ? ' style="' . $column['style'] . '"' : '') . '></textarea>';
    }

    /**
     * @param AbstractElement $element
     * @return AbstractElement
     */
    public function prepareElementHtml(AbstractElement $element): AbstractElement
    {
        $input = $this->elementFactory->create("textarea", ['data' => $element->getData()]);
        $input->setId($element->getId());
        $input->setForm($element->getForm());
        $input->addCustomAttribute('style', 'width: 100%');
        $input->setClass('widget-option input-text admin__control-text');
        $input->addClass('required-entry');

        $element->setData('after_element_html', $input->getElementHtml());
        $element->setValue('');

        return $element;
    }
}
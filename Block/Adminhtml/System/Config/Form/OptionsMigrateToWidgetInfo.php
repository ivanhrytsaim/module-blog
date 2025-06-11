<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Adminhtml\System\Config\Form;


class OptionsMigrateToWidgetInfo extends \Magento\Config\Block\System\Config\Form\Field
{
    /**
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $html =
            '<div>'
            . __('Consider reducing the time spent parsing, compiling, and executing JS.') . '<br/>'
            . __('To configure <strong>JavaScript Optimization</strong> please navigate to') .
        '<div>';

        return $html;
    }
}
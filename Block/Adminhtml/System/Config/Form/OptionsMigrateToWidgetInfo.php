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
            '<div class="message message-notice">'
            . __('<strong>Notice:</strong> Some configuration options have been moved to widgets.') . '<br/>'
            . __('This change allows for more flexible display configuration across your store pages.')
            . '</div>';

        return $html;
    }
}
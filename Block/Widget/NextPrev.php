<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 *
 * Glory to Ukraine! Glory to the heroes!
 */

namespace Magefan\Blog\Block\Widget;

/**
 * Blog post next and prev post links
 */
class NextPrev extends \Magefan\Blog\Block\Post\View\NextPrev implements \Magento\Widget\Block\BlockInterface
{
    /**
     * Retrieve true if need to display next-prev links
     *
     * @return boolean
     */
    public function displayLinks()
    {
        return true;
    }

    /**
     * Get relevant path to template
     *
     * @return string
     */
    /*public function getTemplate()
    {
        $this->_template = 'Magefan_Blog::post/view/nextprev.phtml';
        $templateName = (string)$this->getData('template');
        if ($template = $this->templatePool->getTemplate('blog_post_view_next_prev', $templateName)) {
            $this->_template = $template;
        }
        return \Magento\Framework\View\Element\Template::getTemplate();
    }*/
}

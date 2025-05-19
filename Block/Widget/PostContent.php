<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Widget;

class PostContent extends \Magefan\Blog\Block\Post\View implements \Magento\Widget\Block\BlockInterface
{
    /*public function getTemplate()
    {
        $templateName = (string)$this->getData('custom_template');
        $this->_template = 'Magefan_Blog::post/view.phtml';
        if ($template = $this->templatePool->getTemplate('blog_post_view', $templateName)) {
            $this->_template = $template;
        }
        return \Magefan\Blog\Block\Post\AbstractPost::getTemplate();
    }*/

    public function displayAddThisToolbox()
    {
        return false;
    }

    public function getParentNameInLayout() {
        return 'blog.post';
    }
}
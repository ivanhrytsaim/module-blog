<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Widget;

class PostContent extends \Magefan\Blog\Block\Post\View implements \Magento\Widget\Block\BlockInterface
{
    private const PARENT_BLOCK_NAME_IN_LAYOUT = 'blog.post';

    /**
     * Get relevant path to template
     *
     * @return string
     */
    public function getTemplate()
    {
        $templateName = (string)$this->getData('template');
        if ($template = $this->templatePool->getTemplate('blog_post_view', $templateName)) {
            $this->_template = $template;
        }
        return parent::getTemplate();
    }

    /**
     * @return string
     */
    public function getParentNameInLayout() {
        return self::PARENT_BLOCK_NAME_IN_LAYOUT;
    }

}
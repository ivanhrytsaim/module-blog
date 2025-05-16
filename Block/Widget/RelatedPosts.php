<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Widget;

class RelatedPosts extends \Magefan\Blog\Block\Post\View\RelatedPosts implements \Magento\Widget\Block\BlockInterface
{
    /**
     * Prepare posts collection
     *
     * @return void
     */
    protected function _preparePostCollection()
    {
        $pageSize = (int) $this->getData('post_number');
        $this->_postCollection = $this->getPost()->getRelatedPosts()
            ->addActiveFilter()
            ->setPageSize($pageSize ?: 5);

        $this->_postCollection->getSelect()->order('rl.position', 'ASC');
    }

    /**
     * Get relevant path to template
     *
     * @return string
     */
    public function getTemplate()
    {
        $templateName = (string)$this->getData('custom_template');
        $this->_template = 'Magefan_Blog::post/view/relatedposts.phtml';
        if ($template = $this->templatePool->getTemplate('blog_post_view_related_post', $templateName)) {
            $this->_template = $template;
        }
        return parent::getTemplate();
    }
}
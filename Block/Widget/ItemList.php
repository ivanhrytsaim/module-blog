<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Widget;


class ItemList extends \Magefan\Blog\Block\Post\PostList\AbstractList implements \Magento\Widget\Block\BlockInterface
{
    protected $_defaultToolbarBlock = 'Magefan\Blog\Block\Post\PostList\Toolbar';

    protected $toolbarBlock;
    protected $_show = [];

    protected function _preparePostCollection()
    {
        $this->_postCollection = $this->_postCollectionFactory->create()
            ->addActiveFilter()
            ->addStoreFilter($this->_storeManager->getStore()->getId());

        if ($this->getCategory()) {
            $this->_postCollection->addCategoryFilter($this->getCategory()->getId());
        }

        if ($this->getData('post_per_page')) {
            $this->_postCollection->setPageSize($this->getData('post_per_page'));
        }
    }

    public function getPostCollection()
    {
        if (is_null($this->_postCollection)) {
            $this->_preparePostCollection();
        }

        return $this->_postCollection;
    }
    public function getCategory()
    {
        return $this->_coreRegistry->registry('current_blog_category');
    }

    /**
     * Retrieve post html
     * @param  \Magefan\Blog\Model\Post $post
     * @return string
     */
    public function getPostHtml($post)
    {
        return $this->getChildBlock('blog.posts.list.item')->setPost($post)->toHtml();
    }


    public function getToolbarBlock()
    {
        if (null === $this->toolbarBlock) {
            $blockName = $this->getToolbarBlockName();

            if ($blockName) {
                $block = $this->getLayout()->getBlock($blockName);
                if ($block) {
                    $this->toolbarBlock = $block;
                }
            }
            if (!$this->toolbarBlock) {
                $this->toolbarBlock = $this->getLayout()->createBlock($this->_defaultToolbarBlock, uniqid(microtime()));
            }
        }

        return $this->toolbarBlock;
    }

    /**
     * Retrieve Toolbar Html
     * @return string
     */
    public function getToolbarHtml()
    {
        return $this->getChildHtml('toolbar');
    }

    /**
     * Before block to html
     *
     * @return $this
     */
    protected function _beforeToHtml()
    {
        $toolbar = $this->getToolbarBlock();

        // called prepare sortable parameters
        $collection = $this->getPostCollection();

        // set collection to toolbar and apply sort
        $toolbar->setCollection($collection);
        $this->setChild('toolbar', $toolbar);

        return parent::_beforeToHtml();
    }

    public function getTemplate()
    {
        $templateName = (string)$this->getData('post_template');
        $this->_template ='Magefan_Blog::post/list.phtml';
        if ($template = $this->templatePool->getTemplate('blog_post_list', $templateName)) {
            $this->_template = $template;
        }
        return parent::getTemplate();
    }
}

<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Widget;

use Magento\Framework\Api\SortOrder;
use Magefan\Blog\Model\Config\Source\CategoryDisplayMode;
use Magefan\Blog\Model\Config\Source\PostsSortBy;
use Magento\Store\Model\ScopeInterface;

class BlogPostList extends \Magefan\Blog\Block\Post\PostList\AbstractList implements \Magento\Widget\Block\BlockInterface
{
    /**
     * @var string
     */
    protected $_template = 'post/list.phtml';

    /**
     * @var null
     */
    protected $toolbarBlock = null;

    use \Magefan\Blog\Block\Archive\Archive;

    /**
     * @var string
     */
    protected $_defaultToolbarBlock = \Magefan\Blog\Block\Post\PostList\Toolbar::class;

    /**
     * @return string
     */
    public function getParentNameInLayout() {
        return 'blog.posts.list';
    }

    /**
     * @return void
     */
    protected function _preparePostCollection()
    {
        parent::_preparePostCollection();

        if ($this->getYear() && $this->getMonth()) {
            $this->_postCollection->addArchiveFilter($this->getYear(), $this->getMonth());
        }

        if ($category = $this->getCategory()) {
            $this->_postCollection->addCategoryFilter($category);
        }

        if ($author = $this->getAuthor()) {
            $this->_postCollection->addAuthorFilter($author);
        }
    }

    /**
     * @return string
     */
    public function getCollectionOrderField()
    {
        $postsSortBy = $this->getCategory()?->getData('posts_sort_by');
        return match ($postsSortBy) {
            PostsSortBy::POSITION => self::POSTS_SORT_FIELD_BY_POSITION,
            PostsSortBy::TITLE    => self::POSTS_SORT_FIELD_BY_TITLE,
            default               => parent::getCollectionOrderField(),
        };
    }

    /**
     * @return string
     */
    public function getCollectionOrderDirection()
    {
        $postsSortBy = $this->getCategory()?->getData('posts_sort_by');
        return $postsSortBy === PostsSortBy::TITLE ? SortOrder::SORT_ASC : parent::getCollectionOrderDirection();
    }

    /**
     * @return mixed|null
     */
    public function getCategory()
    {
        return $this->_coreRegistry->registry('current_blog_category');
    }

    /**
     * Retrieve author instance
     *
     * @return \Magefan\Blog\Model\Author
     */
    public function getAuthor()
    {
        return $this->_coreRegistry->registry('current_blog_author');
    }

    /**
     * @return bool
     */
    protected function canDisplay(): bool
    {
        $displayMode = $this->getCategory()?->getData('display_mode');
        return $displayMode == CategoryDisplayMode::POSTS;
    }

    /**
     * @return string
     */
    protected function _toHtml()
    {
        $this->setTemplate(
            $this->templatePool->getTemplate('blog_post_list', $this->getPostTemplateType())
        );

        return $this->canDisplay() ? parent::_toHtml() : '';
    }

    /**
     * @return string
     */
    public function getPostTemplateType()
    {
        $template = (string)$this->getCategory()?->getData('posts_list_template');
        return $template ?: (string)$this->_scopeConfig->getValue(
            'mfblog/post_list/template',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getToolbarBlock()
    {
        $blockName = $this->getToolbarBlockName();

        if ($blockName) {
            $block = $this->getLayout()->getBlock($blockName);
            if ($block) {
                return $block;
            }
        }
        $block = $this->getLayout()->createBlock($this->_defaultToolbarBlock, uniqid(microtime()));

        $limit = (int)$this->getCategory()?->getData('posts_per_page') ?:/* $this->_scopeConfig->getValue(
                'mfblog/post_list/posts_per_page',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );*/ $this->getData('post_per_page');

        if ($limit) {
            $block->setData('limit', $limit);
        }

            $pagerBlock = $this->getLayout()->createBlock(
                \Magefan\Blog\Block\Post\PostList\Toolbar\Pager::class,
                'post_list_toolbar_pager'
            );

            if ($this->getData('use_lazy_loading')) {
                $pagerBlock->setTemplate('Magefan_Blog::post/list/toolbar/lazyload.phtml')
                    ->setData('lazyload_padding', $this->getData('lazyload_padding'))
                    ->setData('use_lazy_loading', $this->getData('use_lazy_loading'));
            }

            $pagerBlock->setData('lazyload_js', 'Magefan_Blog/js/lazyload');
            $pagerBlock->setData('list_wrapper', '.post-list, .blog-list, .mosaica-holder, [class*=template-]');

            $block->append($pagerBlock);


        return $block;
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
        $collection = $this->getPostCollection();
        $toolbar->setCollection($collection);
        $this->setChild('toolbar', $toolbar);

        return parent::_beforeToHtml();
    }

    /*protected function _getConfigValue($param)
    {
        return $this->_scopeConfig->getValue(
            'mfblog/index_page/'.$param,
            ScopeInterface::SCOPE_STORE
        );
    }*/
}

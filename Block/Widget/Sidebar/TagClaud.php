<?php
declare(strict_types=1);

namespace Magefan\Blog\Block\Widget\Sidebar;

use Magento\Widget\Block\BlockInterface;

class TagClaud extends \Magefan\Blog\Block\Sidebar\TagClaud implements BlockInterface
{
    private const PARENT_BLOCK_NAME_IN_LAYOUT = 'blog.sidebar.tagclaud';

    /**
     * @var string
     */
    public  $_template = 'Magefan_Blog::sidebar/tag_claud.phtml';

    public function getTextHighlightColor()
    {
        return $this->getData('text_highlight_color');
    }

    public function getIsAnimatedEnabled()
    {
        return $this->getData('animated');
    }

    public function getTagsCount()
    {
        return $this->getData('tag_count');
    }

    /**
     * @return string
     */
    public function getParentNameInLayout() {
        return self::PARENT_BLOCK_NAME_IN_LAYOUT;
    }

}

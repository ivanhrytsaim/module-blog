<?php
declare(strict_types=1);

namespace Magefan\Blog\Block\Widget\Sidebar;

use Magento\Widget\Block\BlockInterface;

class TagClaud extends \Magefan\Blog\Block\Sidebar\TagClaud implements BlockInterface
{

    public function getTextHighlightColor()
    {
        return $this->getData('text_highlight_color');
    }

    public function getIsAnimatedEnabled()
    {
        return $this->getData('animated');
    }

    public function getTagCount()
    {
        return $this->getData('tag_count');
    }

    public function getParentNameInLayout() {
        return 'blog.sidebar.tagclaud';
    }
}

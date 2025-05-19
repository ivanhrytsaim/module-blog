<?php
declare(strict_types=1);

namespace Magefan\Blog\Block\Widget\Sidebar;

use Magento\Widget\Block\BlockInterface;

class TagClaud extends \Magefan\Blog\Block\Sidebar\TagClaud implements BlockInterface
{
    public function getParentNameInLayout() {
        return 'blog.sidebar.tagclaud';
    }
}

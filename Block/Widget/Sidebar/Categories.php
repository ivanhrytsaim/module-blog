<?php
declare(strict_types=1);

namespace Magefan\Blog\Block\Widget\Sidebar;

use Magento\Widget\Block\BlockInterface;


class Categories extends \Magefan\Blog\Block\Sidebar\Categories implements BlockInterface
{
    public function getParentNameInLayout()
    {
        return 'blog.sidebar.category';
    }
}

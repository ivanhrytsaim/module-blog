<?php
declare(strict_types=1);

namespace Magefan\Blog\Block\Widget\Sidebar;

use Magento\Widget\Block\BlockInterface;

class Search extends \Magefan\Blog\Block\Sidebar\Search implements BlockInterface
{
    public function getParentNameInLayout() {
        return 'blog.sidebar.search';
    }
}

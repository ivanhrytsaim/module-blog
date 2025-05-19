<?php
declare(strict_types=1);

namespace Magefan\Blog\Block\Widget\Sidebar;

use Magento\Widget\Block\BlockInterface;

class Popular extends \Magefan\Blog\Block\Sidebar\Popular implements BlockInterface
{
    public function getParentNameInLayout() {
        return 'blog.sidebar.popular';
    }
}

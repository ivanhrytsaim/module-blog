<?php
declare(strict_types=1);

namespace Magefan\Blog\Block\Widget\Sidebar;

use Magento\Widget\Block\BlockInterface;

class CustomTwo extends \Magefan\Blog\Block\Sidebar\CustomTwo implements BlockInterface
{
    public function getParentNameInLayout() {
        return 'blog.sidebar.custom2';
    }
}

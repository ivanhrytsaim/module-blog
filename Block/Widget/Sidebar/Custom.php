<?php
declare(strict_types=1);

namespace Magefan\Blog\Block\Widget\Sidebar;

use Magento\Widget\Block\BlockInterface;

/**
 * Автоматично згенерований віджет, що наслідує Magefan\Blog\Block\Sidebar\Custom
 */
class Custom extends \Magefan\Blog\Block\Sidebar\Custom implements BlockInterface
{
    public function getParentNameInLayout() {
        return 'blog.sidebar.custom';
    }
}

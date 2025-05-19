<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Widget\Sidebar;

class Recent extends \Magefan\Blog\Block\Sidebar\Recent implements \Magento\Widget\Block\BlockInterface
{
    public function getParentNameInLayout() {
        return 'blog.sidebar.recent';
    }
}
<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 *
 * Glory to Ukraine! Glory to the heroes!
 */

namespace Magefan\Blog\Block\Widget\Sidebar;

class Featured extends \Magefan\Blog\Block\Sidebar\Featured implements \Magento\Widget\Block\BlockInterface
{
    public function getParentNameInLayout() {
        return 'blog.sidebar.featured';
    }
}

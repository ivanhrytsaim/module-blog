<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Widget;

class ArchiveDescription extends \Magefan\Blog\Block\Archive\Description implements \Magento\Widget\Block\BlockInterface
{
    public function getParentNameInLayout() {
        return 'blog.posts.description';
    }
}
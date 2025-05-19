<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Widget;

class Gallery extends \Magefan\Blog\Block\Post\View\Gallery implements \Magento\Widget\Block\BlockInterface
{
    public function getParentNameInLayout() {
        return 'blog.post.gallery';
    }
}
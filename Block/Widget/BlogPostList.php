<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Widget;

class BlogPostList extends \Magefan\Blog\Block\Category\PostList implements \Magento\Widget\Block\BlockInterface
{
    protected $_template = 'post/list.phtml';

    public function getParentNameInLayout() {
        return 'blog.posts.list';
    }

}

<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Widget;

class Gallery extends \Magefan\Blog\Block\Post\View\Gallery implements \Magento\Widget\Block\BlockInterface
{
    private const PARENT_BLOCK_NAME_IN_LAYOUT = 'blog.post.gallery';

    /**
     * Block template
     *
     * @var string
     */
    public $_template = 'Magefan_Blog::post/view/gallery.phtml';

    /**
     * @return string
     */
    public function getParentNameInLayout() {
        return self::PARENT_BLOCK_NAME_IN_LAYOUT;
    }
}
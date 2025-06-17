<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Widget\Sidebar;

use Magento\Widget\Block\BlockInterface;

class PostRelatedProducts extends \Magefan\Blog\Block\Sidebar\PostRelatedProducts implements BlockInterface
{

    private const PARENT_BLOCK_NAME_IN_LAYOUT = 'blog.sidebar.postrelatedproducts';

    /**
     * @var string
     */
    public $_template="Magefan_Blog::sidebar/post-related-products.phtml";

    /**
     * @return int
     */
    public function getNumberOfProducts()
    {
        return (int)$this->getData('number_of_products');
    }

    /**
     * @return string
     */
    public function getParentNameInLayout() {
        return self::PARENT_BLOCK_NAME_IN_LAYOUT;
    }

}
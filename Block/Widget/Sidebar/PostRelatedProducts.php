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
    public function getNumberOfProducts()
    {
        return (int)$this->getData('number_of_products');
    }

    /**
     * @return string
     */
    public function getParentNameInLayout() {
        return ' blog.sidebar.postrelatedproducts';
    }

}
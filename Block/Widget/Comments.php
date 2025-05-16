<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Widget;

class Comments extends \Magefan\Blog\Block\Post\View\Comments implements \Magento\Widget\Block\BlockInterface
{
    /**
     * Block template file
     * @var string
     */
    protected $_template = 'widget/comments.phtml';
}
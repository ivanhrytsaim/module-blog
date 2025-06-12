<?php
declare(strict_types=1);

namespace Magefan\Blog\Block\Widget\Sidebar;

use Magento\Widget\Block\BlockInterface;

class Rss extends \Magefan\Blog\Block\Sidebar\Rss implements BlockInterface
{
    /**
     * @var string
     */
    public $_template = 'Magefan_Blog::sidebar/rss.phtml';

    /**
     * @return string
     */
    public function getParentNameInLayout() {
        return 'blog.sidebar.rss';
    }
}

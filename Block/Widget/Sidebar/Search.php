<?php
declare(strict_types=1);

namespace Magefan\Blog\Block\Widget\Sidebar;

use Magento\Widget\Block\BlockInterface;

class Search extends \Magefan\Blog\Block\Sidebar\Search implements BlockInterface
{
    private const PARENT_BLOCK_NAME_IN_LAYOUT = 'blog.sidebar.search';

    /**
     * @var string
     */
    public $_template = 'Magefan_Blog::sidebar/search.phtml';

    /**
     * @return string
     */
    public function getParentNameInLayout() {
        return self::PARENT_BLOCK_NAME_IN_LAYOUT;
    }

}

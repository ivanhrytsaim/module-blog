<?php
declare(strict_types=1);

namespace Magefan\Blog\Block\Widget\Sidebar;

use Magento\Widget\Block\BlockInterface;

class Categories extends \Magefan\Blog\Block\Sidebar\Categories implements BlockInterface
{
    private const PARENT_BLOCK_NAME_IN_LAYOUT = 'blog.sidebar.category';

    /**
     * @var string
     */
    public $_template = 'Magefan_Blog::sidebar/categories.phtml';

    /**
     * Retrieve true if need to show posts count
     * @return int
     */
    public function showPostsCount()
    {
        $key = 'show_posts_count';
        if (!$this->hasData($key)) {
            $this->setData($key, (bool)$this->getData('show_posts_count'));
        }
        return $this->getData($key);
    }

    /**
     * Retrieve categories maximum depth
     * @return int
     */
    public function maxDepth()
    {
        $maxDepth = $this->getData('max_depth');

        return (int)$maxDepth;
    }

    /**
     * @return string
     */
    public function getParentNameInLayout() {
        return self::PARENT_BLOCK_NAME_IN_LAYOUT;
    }

}

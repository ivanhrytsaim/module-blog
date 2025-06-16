<?php
declare(strict_types=1);

namespace Magefan\Blog\Block\Widget\Sidebar;

use Magento\Widget\Block\BlockInterface;

/**
 * Автоматично згенерований віджет, що наслідує Magefan\Blog\Block\Sidebar\Archive
 */
class Archive extends \Magefan\Blog\Block\Sidebar\Archive implements BlockInterface
{

    private const PARENT_BLOCK_NAME_IN_LAYOUT = 'blog.sidebar.archive';

    /**
     * @var string
     */
    public $_template = 'Magefan_Blog::sidebar/archive.phtml';

    /**
     * @param $time
     * @return string
     */
    public function getTranslatedDate($time)
    {
        if ($this->getGroupBy() == 'year') {
            $time = is_numeric($time) ? $time : strtotime((string)$time);
            return date('Y', $time);
        }

        $format = $this->getData('format_date');

        return \Magefan\Blog\Helper\Data::getTranslatedDate($format, $time);
    }

    /**
     * @return mixed
     */
    protected function getGroupBy()
    {
        return $this->getData('group_by');
    }
    /**
     * @return string
     */
    public function getParentNameInLayout() {
        return self::PARENT_BLOCK_NAME_IN_LAYOUT;
    }

}

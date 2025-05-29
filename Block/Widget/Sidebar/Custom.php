<?php
declare(strict_types=1);

namespace Magefan\Blog\Block\Widget\Sidebar;

use Magento\Store\Model\ScopeInterface;
use Magento\Widget\Block\BlockInterface;

class Custom extends \Magefan\Blog\Block\Sidebar\Custom implements BlockInterface
{
    /**
     * @var string
     */
    public $_template = 'Magefan_Blog::sidebar/custom.phtml';

    /**
     * @return string
     */
    public function getParentNameInLayout() {
        return 'blog.sidebar.custom';
    }

    /**
     * @return array|mixed|string|null
     * @throws \Exception
     */
    public function getContent()
    {
        $key = 'content';
        if (!$this->hasData($key)) {
            $content = $this->getData('custom_html');

            $this->filterProvider->getPageFilter()->filter(
                (string) $content ?: ''
            );
            $this->setData($key, $content);
        }
        return $this->getData($key);
    }
}

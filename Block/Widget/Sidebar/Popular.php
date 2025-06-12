<?php
declare(strict_types=1);

namespace Magefan\Blog\Block\Widget\Sidebar;

use Magento\Widget\Block\BlockInterface;

class Popular extends \Magefan\Blog\Block\Sidebar\Popular implements BlockInterface
{
    public $_template = "Magefan_Blog::sidebar/recent.phtml";

    /**
     * Retrieve true if display the post image is enabled in the config
     * @return bool
     */
    public function getDisplayImage()
    {
        return (bool)$this->getData('display_image');
    }

    /**
     * @return int
     */
    public function getPostsPerPage()
    {
        return (int) $this->getData('posts_per_page');
    }

    /**
     * Get relevant path to template
     *
     * @return string
     */
    public function getTemplate()
    {
        $templateName = (string)$this->getData('template');
        if ($template = $this->templatePool->getTemplate('blog_post_sidebar_posts', $templateName)) {
            $this->_template = $template;
        }
        return parent::getTemplate();
    }

    public function getParentNameInLayout() {
        return 'blog.sidebar.popular';
    }
}

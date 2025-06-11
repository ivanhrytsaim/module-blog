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

    public function getParentNameInLayout() {
        return 'blog.post.comments';
    }

    /**
     * Retrieve comments type
     * @return bool
     */
    public function getCommentsType()
    {
        return $this->getData('post_comment_type');
    }

    /**
     * @return bool
     */
    public function displayPrivacyPolicyCheckbox()
    {
        return $this->getData('display_privacy_policy_checkbox');
    }

    /**
     * Retrieve number of comments to display
     * @return int
     */
    public function getNumberOfComments()
    {
        return $this->getData('number_of_comments');
    }

    /**
     * Retrieve facebook app id
     * @return string
     */
    public function getFacebookAppId()
    {
        return $this->getData('fb_app_id');
    }

    /**
     * Retrieve disqus forum shortname
     * @return string
     */
    public function getDisqusShortname()
    {
        return $this->getData('disqus_forum_shortname');
    }

    /**
     * @return mixed
     */
    public function isHeadApiEnabled()
    {
        return $this->getData("fb_app_id_header");
    }
}
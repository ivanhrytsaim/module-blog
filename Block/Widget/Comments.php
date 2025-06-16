<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Widget;

class Comments extends \Magento\Framework\View\Element\Template implements \Magento\Widget\Block\BlockInterface
{

    private const PARENT_BLOCK_NAME_IN_LAYOUT = 'blog.post.comments';

    /**
     * @return string
     */
    public function getParentNameInLayout() {
        return self::PARENT_BLOCK_NAME_IN_LAYOUT;
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function _toHtml()
    {
        if ($this->getPostCommentType() === 'magefan') {
            /** @var \Magento\Framework\View\LayoutInterface $layout */
            $layout = $this->getLayout();

            $magefanBlock = $layout->createBlock(
                \Magefan\Blog\Block\Post\View\Comments\Magefan::class,
                'blog.post.comments.magefan.dynamic'
            )->setTemplate('Magefan_Blog::post/view/comments/magefan.phtml');

            $magefanBlock->setData('jsLayout', [
                'components' => [
                    'magefan-comments.js' => [
                        'component' => 'Magefan_Blog/js/magefan-comments'
                    ]
                ]
            ]);

            $privacyCheckbox = $layout->createBlock(
                \Magento\Framework\View\Element\Template::class,
                'display_privacy_policy_checkbox'
            )->setTemplate('Magefan_Blog::post/view/comments/privacy_policy_checkbox.phtml');

            $magefanBlock->setChild('display_privacy_policy_checkbox', $privacyCheckbox);
            $recaptchaContainer = $layout->createBlock(
                \Magento\Framework\View\Element\Template::class,
                'blog.post.comments.magefan.additional'
            );

            $magefanBlock->setChild('blog.post.comments.magefan.additional', $recaptchaContainer);

            $replyRecaptchaContainer = $layout->createBlock(
                \Magento\Framework\View\Element\Template::class,
                'blog.post.comments.magefan.reply.additional'
            );

            $magefanBlock->setChild('blog.post.comments.magefan.reply.additional', $replyRecaptchaContainer);

            return $magefanBlock->toHtml();

        }
        if ($this->getPostCommentType() === 'facebook') {
            return $this->getLayout()
                ->createBlock(\Magefan\Blog\Block\Post\View\Comments\Facebook::class)->setData($this->getData())
                ->setTemplate("Magefan_Blog::post/view/comments/facebook.phtml")
                ->toHtml();
        }
        if ($this->getPostCommentType() === 'disqus') {
            return $this->getLayout()->createBlock(\Magefan\Blog\Block\Post\View\Comments\Disqus::class)->setData($this->getData())
                ->setTemplate("Magefan_Blog::post/view/comments/disqus.phtml")
                ->toHtml();
        }

        return '';

    }
}
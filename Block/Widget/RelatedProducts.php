<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\Blog\Block\Widget;

class RelatedProducts extends \Magefan\Blog\Block\Post\View\RelatedProducts implements \Magento\Widget\Block\BlockInterface
{
    /**
     * Premare block data
     * @return $this
     */
    protected function _prepareCollection()
    {
        $post = $this->getPost();

        $this->_itemCollection = $post->getRelatedProducts()
            ->addAttributeToSelect('required_options');

        if ($this->_moduleManager->isEnabled('Magento_Checkout')) {
            $this->_addProductAttributesAndPrices($this->_itemCollection);
        }

        $this->_itemCollection->setVisibility($this->_catalogProductVisibility->getVisibleInCatalogIds());

        $this->_itemCollection->setPageSize(
            (int) $this->getData('post_number')
        );

        $this->_itemCollection->getSelect()->order('rl.position', 'ASC');

        $this->_eventManager->dispatch('mfblog_relatedproducts_block_load_collection_before', [
            'block' => $this,
            'collection' => $this->_itemCollection
        ]);

        $this->_itemCollection->load();

        foreach ($this->_itemCollection as $product) {
            $product->setDoNotUseCategoryId(true);
        }

        return $this;
    }

    public function _toHtml()
    {
        $this->setTemplate(
            'Magefan_Blog::post/view/relatedproducts.phtml'
        );

        return \Magento\Framework\View\Element\Template::_toHtml();
    }
}
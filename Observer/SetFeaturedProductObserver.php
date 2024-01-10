<?php
namespace Vendor\CustomFeaturedProduct\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Catalog\Model\ProductFactory;
use Magento\Eav\Model\Config;
use Magento\Framework\App\RequestInterface;

class SetFeaturedProductObserver implements ObserverInterface
{
    protected $productFactory;
    protected $eavConfig;
    protected $request;

    public function __construct(
        ProductFactory $productFactory,
        Config $eavConfig,
        RequestInterface $request
    ) {
        $this->productFactory = $productFactory;
        $this->eavConfig = $eavConfig;
        $this->request = $request;
    }

    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        
        if ($this->request->getParam('featured_product') == 1) {
            $this->setFeaturedProductId($product->getId());
        }
    }

    protected function setFeaturedProductId($productId)
    {
        $attributeCode = 'featured_product';
        $attribute = $this->eavConfig->getAttribute(\Magento\Catalog\Model\Product::ENTITY, $attributeCode);
        $attribute->getFrontend()->setValue($productId);
        $attribute->getBackend()->setValue($productId);
        $attribute->save();
    }
}


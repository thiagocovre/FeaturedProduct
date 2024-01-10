<?php
namespace Vendor\CustomFeaturedProduct\Block;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\CatalogInventory\Api\StockItemRepositoryInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;
use Magento\Catalog\Block\Product\AbstractProduct;
use Magento\Catalog\Helper\Image;
use Magento\Catalog\Model\Product;

class FeaturedProduct extends Template
{
    protected $_template = 'CustomFeaturedProduct::featured_product.phtml';

    /**
     * @var Image
     */
    protected $imageHelper;
    
    protected $productRepository;
    protected $stockItemRepository;
    protected $productCollectionFactory;
    protected $_priceHelper;

    public function __construct(
        Context $context,
        ProductRepositoryInterface $productRepository,
        StockItemRepositoryInterface $stockItemRepository,
        ProductCollectionFactory $productCollectionFactory,
        Image $imageHelper,
        \Magento\Framework\Pricing\Helper\Data $priceHelper,
        array $data = []
    ) {
        $this->productRepository = $productRepository;
        $this->stockItemRepository = $stockItemRepository;
        $this->productCollectionFactory = $productCollectionFactory;
        $this->imageHelper = $imageHelper;
        $this->_priceHelper = $priceHelper;

        parent::__construct($context, $data);
    }

    public function getFeaturedProduct()
    {
        $featuredProductCollection = $this->productCollectionFactory->create()
            ->addAttributeToFilter('featured_product', ['eq' => 1])
            ->addAttributeToSelect('*') 
            ->setPageSize(1) 
            ->setCurPage(1)
            ->getItems();

        shuffle($featuredProductCollection);

        if (!empty($featuredProductCollection)) {
            $featuredProduct = reset($featuredProductCollection);
            return $featuredProduct;
        }

        return null;
    }

    public function getStockQty($productId)
    {
        try {
            $stockItem = $this->stockItemRepository->get($productId);
            return $stockItem->getQty();
        } catch (\Exception $e) {
            return 0; 
        }
    }

    public function getProductPrice($product)
    {
        return $this->_priceHelper->currency($product->getPrice(), true, false);
    }

    public function getFeaturedProductImageUrl()
    {
        $product = $this->getFeaturedProduct();
        if ($product) {
            return $this->imageHelper->init($product, 'product_page_image_large')->getUrl();
        }
        return null;
    }
}



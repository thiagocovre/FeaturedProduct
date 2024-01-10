<?php
namespace Vendor\CustomFeaturedProduct\Controller\Ajax;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;

class Update extends Action
{
    protected $resultJsonFactory;

    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();

        $featuredProductHtml = $this->_view->getLayout()
            ->createBlock(\Vendor\CustomFeaturedProduct\Block\FeaturedProduct::class)
            ->setTemplate('Vendor_CustomFeaturedProduct::featured_product.phtml')
            ->toHtml();

        return $result->setData(['product' => $featuredProductHtml]);
    }
}

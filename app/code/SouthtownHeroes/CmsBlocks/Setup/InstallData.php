<?php
namespace SouthTownHeroes\CmsBlocks\Setup;

use Magento\Cms\Model\BlockFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Psr\Log\LoggerInterface;

class InstallData implements InstallDataInterface
{
    protected $blockFactory;
    protected $logger;

    public function __construct(
        BlockFactory $blockFactory,
        LoggerInterface $logger
    )
    {
        $this->logger = $logger;
        $this->blockFactory = $blockFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $content = <<<HTML
<ul class="topbar-links">
    <li><a href="#"><i class="icon-card"></i><span>Loyalty Membership</span></a></li>
    <li><a href="#"><i class="icon-box"></i><span>Subscription Boxes</span></a></li>
    <li><a href="#"><i class="icon-blog"></i><span>Blog</span></a></li>
    <li><a href="#"><i class="icon-wishlist"></i><span>Wishlists</span></a></li>
    <li><a href="#"><i class="icon-locator"></i><span>Store Finder</span></a></li>
    <li><a href="#"><i class="icon-track-order"></i><span>Track Orders</span></a></li>
    <li><a href="#"><i class="icon-help"></i><span>Help</span></a></li>
</ul>
HTML;
        $block = [
            'title' => 'NBS top center navigation links',
            'identifier' => 'nbs-top-center-navigation-links',
            'content' => $content,
            'stores' => [0],
            'is_active' => 0,
        ];
        try {
            $this->blockFactory->create()->setData($block)->save();
        } catch (\Exception $e) {
            $this->logger->critical($e->__toString());
        }
        $installer->endSetup();
    }
}
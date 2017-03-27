<?php
namespace SouthTownHeroes\CmsBlocks\Setup;

use Magento\Cms\Model\BlockFactory;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Psr\Log\LoggerInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $blockFactory;
    protected $logger;
    protected $widgetInstanceFactory;

    public function __construct(
        BlockFactory $blockFactory,
        LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->blockFactory = $blockFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $content = <<<HTML
<ul class="topbar-links">
    <li><a href="#"><i class="icon-phone"></i><span>Pre-order a book</span></a></li>
    <li><a href="#"><i class="icon-book"></i><span>Get the App</span></a></li>
</ul>
HTML;
            $block = [
                'title' => 'NBS top right navigation links',
                'identifier' => 'nbs-top-right-navigation-links',
                'content' => $content,
                'stores' => [0],
                'is_active' => 1,
            ];
            try {
                $this->blockFactory->create()->setData($block)->save();
            } catch (\Exception $e) {
                $this->logger->critical($e->__toString());
            }
        } // version 1.0.1

        if (version_compare($context->getVersion(), '1.0.2', '<')) {
            $content = <<<HTML
<div class="footer-top">
    <div class="newsletter-link">
        <h2>Stay up-to-date on the latest news, special events and new arrivals.</h2> {{block class="Magento\Newsletter\Block\Subscribe" name="static.newsletter" template="Magento_Newsletter::subscribe.phtml"}}</div>
    <div class="store-locator-link">
        <h2>Visit Your Local Store</h2>
        <p>200++ Branch Nationwide</p>
        <button class="action primary">Find a Store</button></div>
    <div class="social-media-links">
        <h2>Follow our social media accounts for news and updates</h2>
        <div class="social-media-icons"><a href="https://www.facebook.com/nbsalert/" target="_blank"><span class="facebook-logo">&nbsp;</span></a> <a href="https://twitter.com/nbsalert" target="_blank"><span class="twitter-logo">&nbsp;</span> </a>
            <a href="https://www.instagram.com/nbsalert/"
                target="_blank"><span class="instagram-logo">&nbsp;</span></a>
        </div>
    </div>
</div>
<div class="footer-mid">
    <ul class="footer-about">
        <li class="footer-about-nbs">
            <h3>About NBS</h3>
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">NBS Foundation</a></li>
                <li><a href="#">Careers</a></li>
            </ul>
        </li>
        <li class="footer-blog">
            <h3>Blog</h3>
            <ul>
                <li><a href="#">Book Signings</a></li>
                <li><a href="#">Laking National</a></li>
                <li><a href="#">Branch Directory</a></li>
                <li><a href="#">Payment Method</a></li>
            </ul>
        </li>
        <li class="footer-customer-services">
            <h3>Customer Service</h3>
            <ul>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Track Order</a></li>
                <li><a href="#">Order Status</a></li>
                <li><a href="#">Help Center</a></li>
                <li><a href="#">How to Buy</a></li>
                <li><a href="#">Shipping &amp; Delivery</a></li>
                <li><a href="#">Sitemap</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </li>
        <li class="footer-payment-shipment">
            <p>You can pay through:</p>
            <div class="payment-icons"><span class="visa-logo">&nbsp;</span> <span class="mastercard-logo">&nbsp;</span> <span class="paypal-logo">&nbsp;</span> <span class="bpi-logo">&nbsp;</span> <span class="cod-logo">&nbsp;</span></div>
            <p>We deliver nationwide:</p>
            <div class="shipment-icons"><span class="xend-logo">&nbsp;</span> <span class="go-logo">&nbsp;</span></div>
        </li>
    </ul>
</div>
<div class="footer-bottom">
    <div class="footer-logo"></div>
    <div class="copyright">
        <p>&copy;2017 National Bookstore.</p>
        <p>Questions? You may call us at <span class="highlight">(Mon-Sun 8AM-10PM) (632)8888-627</span></p>
        <ul>
            <li><a href="#">Terms of Use</a></li>
            <li><a href="#">Copyright &amp; Trademark</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Accessibility</a></li>
        </ul>
    </div>
    <div class="download-app-links">
        <div class="app-store"></div>
        <div class="play-store"></div>
    </div>
</div>
HTML;

            $block = [
                'title' => 'NBS footer links',
                'identifier' => 'nbs-footer-links',
                'content' => $content,
                'stores' => [0],
                'is_active' => 1,
            ];

            try {
                $footerLinkBlock = $this->blockFactory->create()
                    ->setData($block)->save();
            } catch (\Exception $e) {
                $this->logger->critical($e->__toString());
            }

            // $this->blockFactory->create()->load();



        } // version 1.0.2

        if (version_compare($context->getVersion(), '1.0.3', '<')) {

            $content = <<<HTML
<ul>
<li class="item outer-level highlight"><a href="#">Back to School Sale</a></li>
<li class="item outer-level"><a href="#">Gift Guide</a></li>
<li class="item outer-level"><a href="#">Cash on Delivery</a></li>
<li class="item outer-level"><a href="#">Tips &amp; Ideas</a></li>
</ul>
HTML;

            $block = [
                'title' => 'NBS top navigation blocks',
                'identifier' => 'nbs-top-navigation-blocks',
                'content' => $content,
                'stores' => [0],
                'is_active' => 1,
            ];

            try {
                $this->blockFactory->create()->setData($block)->save();
            } catch (\Exception $e) {
                $this->logger->critical($e->__toString());
            }
        } // version 1.0.3

        if (version_compare($context->getVersion(), '1.0.4', '<')) {

            $content = <<<HTML
<ul class="misc-navigation-blocks">
<li class="item outer-level highlight"><a href="#">Introducing Pick Up Order!</a></li>
</ul>
HTML;
            $block = [
                'title' => 'NBS top misc navigation blocks',
                'identifier' => 'nbs-top-misc-navigation-blocks',
                'content' => $content,
                'stores' => [0],
                'is_active' => 1,
            ];

            try {
                $this->blockFactory->create()->setData($block)->save();
            } catch (\Exception $e) {
                $this->logger->critical($e->__toString());
            }
        } // version 1.0.4

        $installer->endSetup();
    }
}

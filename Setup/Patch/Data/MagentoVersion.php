<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MagentoEse\StoryStore\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Config\Model\ResourceModel\Config as ResourceConfig;
use Magento\Framework\App\ProductMetadataInterface as ProductMetadata;


class MagentoVersion implements DataPatchInterface
{
    /** @var ResourceConfig  */
    protected $resourceConfig;
    protected $productMetadata;

    public function __construct(
        ResourceConfig $resourceConfig,
        ProductMetadata $productMetadata
    )
    {
        $this->resourceConfig = $resourceConfig;
        $this->productMetadata = $productMetadata;
    }

    public function getMagentoVersion() { 
        return $this->productMetadata->getVersion(); 
    }

    public function apply()
    {
        $this->resourceConfig->saveConfig("magentoese_storystore/all/misc_config/magento_version", $this->productMetadata->getVersion(), "default", 0);
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }
}
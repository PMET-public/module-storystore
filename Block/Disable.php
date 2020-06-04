<?php
namespace MagentoEse\StoryStore\Block;
 
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Config\Block\System\Config\Form\Field;
 
class Disable extends Field
{    
    protected function _getElementHtml(AbstractElement $element)
    {
        $element->setDisabled('disabled');
        return $element->getElementHtml();
 
    }
}
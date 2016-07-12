<?php 

       namespace Paarth\HelloWorld\Setup;
	    use Magento\Framework\Setup\UpgradeDataInterface;
		use Magento\Framework\Setup\ModuleContextInterface;
		use Magento\Framework\Setup\ModuleDataSetupInterface;
		
	class UpgradeData implements UpgradeDataInterface
	{
	          
			   protected $resourceConfig  , $categorySetupFactory ;
			   
			   
		public function __construct
		(\Magento\Config\Model\ResourceModel\Config $resourceConfig,
		\Magento\Catalog\Setup\CategorySetupFactory $categorySetupFactory
       ) {
		$this->resourceConfig = $resourceConfig;
		$this->categorySetupFactory = $categorySetupFactory;
}
	public function upgrade(ModuleDataSetupInterface $setup,
				ModuleContextInterface $context) {	
	
	if (version_compare($context->getVersion(), '2.0.4') < 0) {
						$categorySetup = $this->categorySetupFactory->create(['setup' => $setup]);
						$entityTypeId = $categorySetup->getEntityTypeId
						(\Magento\Catalog\Model\Category::ENTITY);
						$categorySetup->addAttribute($entityTypeId,
						'custom_text', array(
						'type' => 'varchar',
						'label' => 'HeloWorld label',
						'input' => 'text',
						'required' => false,
						'group' => 'HelloWorld'
						));
}
}

}
<?php
namespace GHSVS\Plugin\System\OnUrlRobotsGhsvs\Extension;

\defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\DispatcherInterface;
use GHSVS\Plugin\System\OnUrlRobotsGhsvs\Helper\OnUrlRobotsGhsvsHelper;

final class OnUrlRobotsGhsvs extends CMSPlugin
{

	private $helper;

	public function __construct(
		DispatcherInterface $dispatcher,
		array $config,
		OnUrlRobotsGhsvsHelper $helper,
	) {
		parent::__construct($dispatcher, $config);

		$this->helper = $helper;
	}

	public function onBeforeCompileHead()
	{
		$doc = $this->getApplication()->getDocument();

		if ($doc->getType() !== 'html' || !$this->getApplication()->isClient('site'))
		{
			return;
		}

		if ($optionsToDo = $this->helper->getRules($this->params))
		{
			if (in_array($this->getApplication()->getInput()->get('option', ''), $optionsToDo))
			{
				$doc->setMetadata('robots', $this->params->get('robotsContent', 'index,follow'));
			}
		}
	}
}

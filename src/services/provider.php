<?php
\defined('_JEXEC') or die;

use Joomla\CMS\Extension\PluginInterface;

use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;
use GHSVS\Plugin\System\OnUrlRobotsGhsvs\Extension\OnUrlRobotsGhsvs;
use GHSVS\Plugin\System\OnUrlRobotsGhsvs\Helper\OnUrlRobotsGhsvsHelper;

return new class () implements ServiceProviderInterface {
	public function register(Container $container): void
	{
		$container->set(
			PluginInterface::class,
			function (Container $container)
			{
				$dispatcher = $container->get(DispatcherInterface::class);
				$plugin = new OnUrlRobotsGhsvs(
					$dispatcher,
					(array) PluginHelper::getPlugin('system', 'onurlrobotsghsvs'),
					new OnUrlRobotsGhsvsHelper()
				);
				$plugin->setApplication(Factory::getApplication());

				return $plugin;
			}
		);
	}
};

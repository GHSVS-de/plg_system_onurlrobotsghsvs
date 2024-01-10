<?php
namespace GHSVS\Plugin\System\OnUrlRobotsGhsvs\Helper;

\defined('_JEXEC') or die;

use Joomla\Registry\Registry;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\Factory;

class OnUrlRobotsGhsvsHelper
{
	private $optionRules = null;

	public function getRules(Registry $pluginParams) : array
	{
		if (is_null($this->optionRules))
		{
			if (!($this->optionRules = trim($pluginParams->get('optionRules', ''))))
			{
				return ($this->optionRules = []);
			}

			$replaceWhat = [
				"\n\r",
				"\r\n",
				"\r",
			];

			$this->optionRules = str_replace($replaceWhat, "\n", $this->optionRules);
			$this->optionRules = array_filter(
				array_map('trim', explode("\n", $this->optionRules))
			);
		}
		return $this->optionRules;
	}

	public function getIsFrontpage()
	{
		$menu = Factory::getApplication()->getMenu();

		if (Multilanguage::isEnabled())
		{
			$home = $menu->getDefault(Factory::getLanguage()->getTag());
		}
		else
		{
			$home = $menu->getDefault();
		}

		if ($menu->getActive() === $home)
		{
			return true;
		}

		return false;
	}
}

<?php

namespace Hfu\HfuOpus\ViewHelpers;

use Hfu\HfuOpus\Utility\OpusApi as OPUS;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;


/**
 * Class PublistViewHelper
 * @package Hfu\HfuOpus\ViewHelpers
 */
class PublistViewHelper extends AbstractViewHelper
{
    public function initializeArguments()
    {
        $this->registerArgument('publistid', 'string', '', true);
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return mixed|string
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
    {
        $configurationManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager');
        $typoScript = $configurationManager->getConfiguration(
            ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT
        );
        $settings = $typoScript['plugin.']['tx_hfu_opus.']['settings.'];

        return OPUS::fetchPubList($arguments['publistid'], $settings['baseUrl']);
    }

}
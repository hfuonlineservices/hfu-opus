<?php
defined('TYPO3_MODE') or die();

call_user_func(function () {

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['hfu_opus_publist'] =
        \Hfu\HfuOpus\Hooks\PageLayoutView\PublistPreviewRenderer::class;

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
        [GLOBAL]
        mod.wizards.newContentElement.wizardItems.special {
            elements {
                hfu_opus_publist {
                    iconIdentifier = apps-clipboard-list
                    title = LLL:EXT:hfu_opus/Resources/Private/Language/locallang.xlf:ce_hfu_opus_publist.title
                    description = LLL:EXT:hfu_opus/Resources/Private/Language/locallang.xlf:ce_hfu_opus_publist.description
                    tt_content_defValues {
                        CType = hfu_opus_publist
                    }
                }
            }
            show := addToList(hfu_opus_publist)
        }
    ');
});
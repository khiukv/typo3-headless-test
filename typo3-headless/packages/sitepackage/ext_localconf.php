<?php

defined('TYPO3') or die();

use Sitepackage\Sitepackage\DataProcessing\AllPagesProcessor;

$GLOBALS['TYPO3_CONF_VARS']['SYS']['dataProcessing']['allPages'] = AllPagesProcessor::class;

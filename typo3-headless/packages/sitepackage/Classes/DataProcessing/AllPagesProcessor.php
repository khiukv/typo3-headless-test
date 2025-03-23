<?php
declare(strict_types=1);

namespace Sitepackage\Sitepackage\DataProcessing;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class AllPagesProcessor
{
    public function render()
    {
        header('Content-Type: application/json');
        
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('pages');

        $pages = $queryBuilder
            ->select('uid', 'title', 'slug')
            ->from('pages')
            ->where(
                $queryBuilder->expr()->eq('deleted', $queryBuilder->createNamedParameter(0)),
                $queryBuilder->expr()->eq('hidden', $queryBuilder->createNamedParameter(0)),
                $queryBuilder->expr()->neq('doktype', $queryBuilder->createNamedParameter(254))
            )
            ->orderBy('sorting', 'ASC')
            ->executeQuery()
            ->fetchAllAssociative();

        echo json_encode($pages);
        exit;
    }
}

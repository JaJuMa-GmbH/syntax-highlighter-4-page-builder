<?php
/**
 * @author    JaJuMa GmbH <info@jajuma.de>
 * @copyright Copyright (c) 2023-present JaJuMa GmbH <https://www.jajuma.de>. All rights reserved.
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 */

declare(strict_types=1);

namespace Jajuma\SyntaxHighlighter\Block\Adminhtml\SyntaxHighlighter;

use Magento\Directory\Helper\Data as DirectoryHelper;
use Magento\Framework\Json\Helper\Data as JsonHelper;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\UrlInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem\Driver\File as DriverFile;
use Psr\Log\LoggerInterface;

class SyntaxHighlighter extends \Magento\Backend\Block\Template
{
    /**
     * @var UrlInterface
     */
    protected UrlInterface $urlBuilder;

    /**
     * @var DirectoryList
     */
    private DirectoryList $directoryList;

    /**
     * @var DriverFile
     */
    private DriverFile $driverFile;

    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;

    /**
     * @var Asset\Repository
     */
    private $assetRepo;

    /**
     * Undocumented function
     *
     * @param Context $context
     * @param UrlInterface $urlBuilder
     * @param DirectoryList $directoryList
     * @param DriverFile $driverFile
     * @param LoggerInterface $logger
     * @param array $data
     * @param JsonHelper|null $jsonHelper
     * @param DirectoryHelper|null $directoryHelper
     */
    public function __construct(
        Context $context,
        UrlInterface $urlBuilder,
        DirectoryList $directoryList,
        DriverFile $driverFile,
        LoggerInterface $logger,
        array $data = [],
        ?JsonHelper $jsonHelper = null,
        ?DirectoryHelper $directoryHelper = null,
    ) {
        parent::__construct(
            $context,
            $data,
            $jsonHelper,
            $directoryHelper
        );
        $this->urlBuilder = $urlBuilder;
        $this->directoryList = $directoryList;
        $this->driverFile = $driverFile;
        $this->logger = $logger;
        $this->assetRepo = $context->getAssetRepository();
    }

    /**
     * Get screenshot folder
     *
     * @return string
     */
    public function getScreenshotUrl(): string
    {
        return $this->assetRepo->getUrl('Jajuma_SyntaxHighlighter::image/screenshots');
    }

    /**
     * Get all theme files function
     *
     * @param string $path
     * @return void
     */
    public function getThemeFiles(string $path = '/import/')
    {
        $paths = [];
        try {
            //get the base folder path you want to scan (replace var with pub / media or any other core folder)
            $path = $this->directoryList->getPath('var') . $path;
            //read just that single directory
            $paths =  $this->driverFile->readDirectory($path);
            //read all folders
            $paths =  $this->driverFile->readDirectoryRecursively($path);
        } catch (\Magento\Framework\Exception\FileSystemException $e) {
            $this->logger->error($e->getMessage());
        }

        return $paths;
    }
}

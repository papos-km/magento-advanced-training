<?php

namespace Setup\Blocks\Setup\Patch\Data;

use Magento\Framework\Exception\NoSuchEntityException as NoSuchEntityExceptionAlias;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;

class Copyright implements DataPatchInterface
{
    /**
     * @var WriterInterface
     */
    private $writer;

    /**
     * SetCopyright constructor.
     *
     * @param WriterInterface $writer
     */
    public function __construct(
        WriterInterface $writer

    ) {
        $this->writer = $writer;
    }

    /**
     * @inheritdoc
     * @throws NoSuchEntityExceptionAlias
     */
    public function apply()
    {
        $this->writer->save(
            'design/footer/copyright',
            'Luma 2016 - 2021 © Copyright. All rights reserved'
        );
    }

    /**
     * @inheritdoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function getAliases()
    {
        return [];
    }
}

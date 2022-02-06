<?php

namespace Ivann\MetroCoding\Command;

use Ivann\MetroCoding\Offer\FilteredCollectionByVendorID;
use Ivann\MetroCoding\Offer\OfferCollectionInterface;
use Ivann\MetroCoding\Offer\OfferInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CountByVendorID extends Command
{
    private const ATTR_VENDOR_ID = 'vendor-id';
    protected static $defaultName = 'count_by_vendor_id';
    private OfferCollectionInterface $offerCollection;

    public function __construct(OfferCollectionInterface $offerCollection)
    {
        parent::__construct();
        $this->offerCollection = $offerCollection;
    }

    protected function configure()
    {
        $this->addArgument(self::ATTR_VENDOR_ID, InputArgument::REQUIRED, 'Vendor ID');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $vendorID = (int) $input->getArgument(self::ATTR_VENDOR_ID);

        $offerCollection = (new FilteredCollectionByVendorID($vendorID))->filter($this->offerCollection);

        $output->write('count: '.iterator_count($offerCollection->getIterator()));

        return self::SUCCESS;
    }
}
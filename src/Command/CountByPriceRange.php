<?php

namespace Ivann\MetroCoding\Command;

use Ivann\MetroCoding\Offer\FilteredCollectionByPriceRange;
use Ivann\MetroCoding\Offer\OfferCollectionInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CountByPriceRange extends Command
{
    private const ATTR_PRICE_FROM = 'price-from';
    private const ATTR_PRICE_TO = 'price-to';
    protected static $defaultName = 'count_by_price_range';
    private OfferCollectionInterface $offerCollection;

    public function __construct(OfferCollectionInterface $offerCollection)
    {
        parent::__construct();
        $this->offerCollection = $offerCollection;
    }

    protected function configure()
    {
        $this->addArgument(self::ATTR_PRICE_FROM, InputArgument::REQUIRED);
        $this->addArgument(self::ATTR_PRICE_TO, InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $priceFrom = (int) $input->getArgument(self::ATTR_PRICE_FROM);
        $priceTo = (int) $input->getArgument(self::ATTR_PRICE_TO);

        $offerCollection = (new FilteredCollectionByPriceRange($priceFrom, $priceTo))->filter($this->offerCollection);

        $output->write('count: '.iterator_count($offerCollection->getIterator()));

        return self::SUCCESS;
    }
}
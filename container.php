<?php
$builder = new DI\ContainerBuilder();

$builder->addDefinitions([
    'collection.file' => __DIR__.'/example.json',

    \Ivann\MetroCoding\Offer\ReaderInterface::class => \DI\create(\Ivann\MetroCoding\Offer\ReaderJsonFile::class),
    \Ivann\MetroCoding\Offer\OfferCollectionInterface::class => \DI\factory(
        [\Ivann\MetroCoding\Offer\ReaderInterface::class, 'read']
    )->parameter('input', \DI\string('{collection.file}')),
]);

return $container = $builder->build();
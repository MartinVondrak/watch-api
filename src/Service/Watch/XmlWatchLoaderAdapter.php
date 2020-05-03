<?php


namespace App\Service\Watch;


use App\DTO\WatchDto;
use App\Exception\XmlLoaderException;
use App\Loader\XmlWatchLoader;

class XmlWatchLoaderAdapter implements WatchExternalSourceInterface
{
    private XmlWatchLoader $xmlWatchLoader;

    public function __construct(XmlWatchLoader $xmlWatchLoader)
    {
        $this->xmlWatchLoader = $xmlWatchLoader;
    }

    public function retrieveById(int $id): ?WatchDto
    {
        try {
            $watch = $this->xmlWatchLoader->loadByIdFromXml((string)$id);
        } catch (XmlLoaderException $ex) {
            return null;
        }

        return new WatchDto($watch['id'], $watch['title'], $watch['price'], $watch['desc']);
    }
}

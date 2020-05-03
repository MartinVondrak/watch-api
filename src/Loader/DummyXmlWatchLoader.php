<?php

namespace App\Loader;

use App\Exception\XmlLoaderException;

class DummyXmlWatchLoader implements XmlWatchLoader
{
    public function loadByIdFromXml(string $watchIdentification): ?array
    {
        $watchId = (int)$watchIdentification;
        $mod = $watchId % 3;
        $watch = null;

        if (0 === $mod) {
            $watch = [
                'id' => $watchId,
                'title' => sprintf('Watch %d', $watchId),
                'price' => random_int(200, 200000),
                'desc' => sprintf('Watch %d description', $watchId),
            ];
        } elseif (2 === $mod) {
            throw new XmlLoaderException(sprintf('Loadding watch "%s" from XML failed.', $watchIdentification));
        }

        return $watch;
    }

}

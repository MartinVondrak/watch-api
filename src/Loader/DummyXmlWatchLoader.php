<?php

namespace App\Loader;

use App\Exception\XmlLoaderException;

class DummyXmlWatchLoader implements XmlWatchLoader
{
    /**
     * @param string $watchIdentification
     * @return int[]|string[]|null
     */
    public function loadByIdFromXml(string $watchIdentification): ?array
    {
        $watchId = (int)$watchIdentification;
        $mod = $watchId % 3;
        $watch = null;

        if (0 === $mod) {
            $watch = [
                'id' => $watchId,
                'title' => sprintf('Watch %d', $watchId),
                'price' => $watchId * 500,
                'desc' => sprintf('Watch %d description', $watchId),
            ];
        } elseif (2 === $mod) {
            throw new XmlLoaderException(sprintf('Loadding watch "%s" from XML failed.', $watchIdentification));
        }

        return $watch;
    }

}

<?php

namespace Biplane\YandexDirect\Api\V5\Contract;

/**
 * Auto-generated code.
 */
class GetClientsResponse
{

//    Can be omit.
//    protected $Clients = null;

    /**
     * Creates a new instance of GetClientsResponse.
     *
     * @return self
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Gets Clients.
     *
     * @return ClientGetItem[]|null
     */
    public function getClients()
    {
        return isset($this->Clients) ? $this->Clients : null;
    }

    /**
     * Sets Clients.
     *
     * @param ClientGetItem[]|null $value
     * @return $this
     */
    public function setClients(array $value = null)
    {
        $this->Clients = $value;

        return $this;
    }


}


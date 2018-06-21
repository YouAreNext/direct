<?php

namespace Biplane\YandexDirect\Api\V5\Contract;

/**
 * Auto-generated code.
 */
class AddBidModifiersResponse
{

//    Can be omit.
//    protected $AddResults = null;

    /**
     * Creates a new instance of AddBidModifiersResponse.
     *
     * @return self
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Gets AddResults.
     *
     * @return MultiIdsActionResult[]|null
     */
    public function getAddResults()
    {
        return isset($this->AddResults) ? $this->AddResults : null;
    }

    /**
     * Sets AddResults.
     *
     * @param MultiIdsActionResult[]|null $value
     * @return $this
     */
    public function setAddResults(array $value = null)
    {
        $this->AddResults = $value;

        return $this;
    }


}


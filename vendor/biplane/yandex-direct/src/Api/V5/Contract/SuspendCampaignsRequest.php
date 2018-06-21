<?php

namespace Biplane\YandexDirect\Api\V5\Contract;

/**
 * Auto-generated code.
 */
class SuspendCampaignsRequest
{

    protected $SelectionCriteria = null;

    /**
     * Creates a new instance of SuspendCampaignsRequest.
     *
     * @return self
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Gets SelectionCriteria.
     *
     * @return IdsCriteria
     */
    public function getSelectionCriteria()
    {
        return $this->SelectionCriteria;
    }

    /**
     * Sets SelectionCriteria.
     *
     * @param IdsCriteria $value
     * @return $this
     */
    public function setSelectionCriteria(IdsCriteria $value)
    {
        $this->SelectionCriteria = $value;

        return $this;
    }


}


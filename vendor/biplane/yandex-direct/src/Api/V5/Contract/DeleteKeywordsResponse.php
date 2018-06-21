<?php

namespace Biplane\YandexDirect\Api\V5\Contract;

/**
 * Auto-generated code.
 */
class DeleteKeywordsResponse
{

    protected $DeleteResults = [];

    /**
     * Creates a new instance of DeleteKeywordsResponse.
     *
     * @return self
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Gets DeleteResults.
     *
     * @return ActionResult[]
     */
    public function getDeleteResults()
    {
        return $this->DeleteResults;
    }

    /**
     * Sets DeleteResults.
     *
     * @param ActionResult[] $value
     * @return $this
     */
    public function setDeleteResults(array $value)
    {
        $this->DeleteResults = $value;

        return $this;
    }


}


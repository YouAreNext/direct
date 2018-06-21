<?php

namespace Biplane\YandexDirect\Api\V5\Contract;

/**
 * Auto-generated code.
 */
class WebpageAddItem
{

    protected $Name = null;

    protected $AdGroupId = null;

//    Can be omit.
//    protected $Conditions = null;

//    Can be omit.
//    protected $Bid = null;

//    Can be omit.
//    protected $ContextBid = null;

//    Can be omit.
//    protected $StrategyPriority = null;

    /**
     * Creates a new instance of WebpageAddItem.
     *
     * @return self
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Gets Name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Sets Name.
     *
     * @param string $value
     * @return $this
     */
    public function setName($value)
    {
        $this->Name = $value;

        return $this;
    }

    /**
     * Gets AdGroupId.
     *
     * @return int
     */
    public function getAdGroupId()
    {
        return $this->AdGroupId;
    }

    /**
     * Sets AdGroupId.
     *
     * @param int $value
     * @return $this
     */
    public function setAdGroupId($value)
    {
        $this->AdGroupId = $value;

        return $this;
    }

    /**
     * Gets Conditions.
     *
     * @return WebpageCondition[]|null
     */
    public function getConditions()
    {
        return isset($this->Conditions) ? $this->Conditions : null;
    }

    /**
     * Sets Conditions.
     *
     * @param WebpageCondition[]|null $value
     * @return $this
     */
    public function setConditions(array $value = null)
    {
        $this->Conditions = $value;

        return $this;
    }

    /**
     * Gets Bid.
     *
     * @return int|null
     */
    public function getBid()
    {
        return isset($this->Bid) ? $this->Bid : null;
    }

    /**
     * Sets Bid.
     *
     * @param int|null $value
     * @return $this
     */
    public function setBid($value = null)
    {
        $this->Bid = $value;

        return $this;
    }

    /**
     * Gets ContextBid.
     *
     * @return int|null
     */
    public function getContextBid()
    {
        return isset($this->ContextBid) ? $this->ContextBid : null;
    }

    /**
     * Sets ContextBid.
     *
     * @param int|null $value
     * @return $this
     */
    public function setContextBid($value = null)
    {
        $this->ContextBid = $value;

        return $this;
    }

    /**
     * Gets StrategyPriority.
     *
     * @return string|null
     * @see PriorityEnum
     */
    public function getStrategyPriority()
    {
        return isset($this->StrategyPriority) ? $this->StrategyPriority : null;
    }

    /**
     * Sets StrategyPriority.
     *
     * @param string|null $value
     * @return $this
     * @see PriorityEnum
     */
    public function setStrategyPriority($value = null)
    {
        $this->StrategyPriority = $value;

        return $this;
    }


}


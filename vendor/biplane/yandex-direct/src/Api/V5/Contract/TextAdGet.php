<?php

namespace Biplane\YandexDirect\Api\V5\Contract;

/**
 * Auto-generated code.
 */
class TextAdGet extends TextAdGetBase
{

//    Can be omit.
//    protected $Text = null;

//    Can be omit.
//    protected $Title = null;

//    Can be omit.
//    protected $Title2 = null;

//    Can be omit.
//    protected $Href = null;

//    Can be omit.
//    protected $Mobile = null;

//    Can be omit.
//    protected $DisplayDomain = null;

//    Can be omit.
//    protected $DisplayUrlPath = null;

//    Can be omit.
//    protected $DisplayUrlPathModeration = null;

//    Can be omit.
//    protected $VideoExtension = null;

    /**
     * Creates a new instance of TextAdGet.
     *
     * @return self
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Gets Text.
     *
     * @return string|null
     */
    public function getText()
    {
        return isset($this->Text) ? $this->Text : null;
    }

    /**
     * Sets Text.
     *
     * @param string|null $value
     * @return $this
     */
    public function setText($value = null)
    {
        $this->Text = $value;

        return $this;
    }

    /**
     * Gets Title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return isset($this->Title) ? $this->Title : null;
    }

    /**
     * Sets Title.
     *
     * @param string|null $value
     * @return $this
     */
    public function setTitle($value = null)
    {
        $this->Title = $value;

        return $this;
    }

    /**
     * Gets Title2.
     *
     * @return string|null
     */
    public function getTitle2()
    {
        return isset($this->Title2) ? $this->Title2 : null;
    }

    /**
     * Sets Title2.
     *
     * @param string|null $value
     * @return $this
     */
    public function setTitle2($value = null)
    {
        $this->Title2 = $value;

        return $this;
    }

    /**
     * Gets Href.
     *
     * @return string|null
     */
    public function getHref()
    {
        return isset($this->Href) ? $this->Href : null;
    }

    /**
     * Sets Href.
     *
     * @param string|null $value
     * @return $this
     */
    public function setHref($value = null)
    {
        $this->Href = $value;

        return $this;
    }

    /**
     * Gets Mobile.
     *
     * @return string|null
     * @see YesNoEnum
     */
    public function getMobile()
    {
        return isset($this->Mobile) ? $this->Mobile : null;
    }

    /**
     * Sets Mobile.
     *
     * @param string|null $value
     * @return $this
     * @see YesNoEnum
     */
    public function setMobile($value = null)
    {
        $this->Mobile = $value;

        return $this;
    }

    /**
     * Gets DisplayDomain.
     *
     * @return string|null
     */
    public function getDisplayDomain()
    {
        return isset($this->DisplayDomain) ? $this->DisplayDomain : null;
    }

    /**
     * Sets DisplayDomain.
     *
     * @param string|null $value
     * @return $this
     */
    public function setDisplayDomain($value = null)
    {
        $this->DisplayDomain = $value;

        return $this;
    }

    /**
     * Gets DisplayUrlPath.
     *
     * @return string|null
     */
    public function getDisplayUrlPath()
    {
        return isset($this->DisplayUrlPath) ? $this->DisplayUrlPath : null;
    }

    /**
     * Sets DisplayUrlPath.
     *
     * @param string|null $value
     * @return $this
     */
    public function setDisplayUrlPath($value = null)
    {
        $this->DisplayUrlPath = $value;

        return $this;
    }

    /**
     * Gets DisplayUrlPathModeration.
     *
     * @return ExtensionModeration|null
     */
    public function getDisplayUrlPathModeration()
    {
        return isset($this->DisplayUrlPathModeration) ? $this->DisplayUrlPathModeration : null;
    }

    /**
     * Sets DisplayUrlPathModeration.
     *
     * @param ExtensionModeration|null $value
     * @return $this
     */
    public function setDisplayUrlPathModeration(ExtensionModeration $value = null)
    {
        $this->DisplayUrlPathModeration = $value;

        return $this;
    }

    /**
     * Gets VideoExtension.
     *
     * @return VideoExtensionGetItem|null
     */
    public function getVideoExtension()
    {
        return isset($this->VideoExtension) ? $this->VideoExtension : null;
    }

    /**
     * Sets VideoExtension.
     *
     * @param VideoExtensionGetItem|null $value
     * @return $this
     */
    public function setVideoExtension(VideoExtensionGetItem $value = null)
    {
        $this->VideoExtension = $value;

        return $this;
    }


}


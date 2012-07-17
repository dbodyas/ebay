<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package PictureDetailsType
 */
class PictureDetailsType {

// Fields
    private $ExternalPictureURL;
    private $GalleryDuration;
    private $GalleryErrorInfo;
    private $GalleryStatus;
    private $GalleryType;
    private $GalleryURL;
    private $PhotoDisplay;
    private $PictureSource;
    private $PictureURL;

    /**
     * Builds XML
     * @access public 
     */
    public function build() {

        $xml = FALSE;

// ExternalPictureURL
        if (isset($this->ExternalPictureURL)) {
            $xml .= '<ExternalPictureURL>' . $this->ExternalPictureURL . '</ExternalPictureURL>';
        }

// GalleryDuration
        if (isset($this->GalleryDuration)) {
            $xml .= '<GalleryDuration>' . $this->GalleryDuration . '</GalleryDuration>';
        }

// GalleryErrorInfo
        if (isset($this->GalleryErrorInfo)) {
            $xml .= '<GalleryErrorInfo>' . $this->GalleryErrorInfo . '</GalleryErrorInfo>';
        }

// GalleryStatus
        if (isset($this->GalleryStatus)) {
            $xml .= '<GalleryStatus>' . $this->GalleryStatus . '</GalleryStatus>';
        }

// GalleryType
        if (isset($this->GalleryType)) {
            $xml .= '<GalleryType>' . $this->GalleryType . '</GalleryType>';
        }

// GalleryURL
        if (isset($this->GalleryURL)) {
            $xml .= '<GalleryURL>' . $this->GalleryURL . '</GalleryURL>';
        }

// PhotoDisplay
        if (isset($this->PhotoDisplay)) {
            $xml .= '<PhotoDisplay>' . $this->PhotoDisplay . '</PhotoDisplay>';
        }

// PictureSource
        if (isset($this->PictureSource)) {
            $xml .= '<PictureSource>' . $this->PictureSource . '</PictureSource>';
        }

// PictureURL
        if (isset($this->PictureURL)) {
            foreach ($this->PictureURL as $purl) {
                $xml .= '<PictureURL>' . $purl . '</PictureURL>';
            }
        }

        return $xml;
    }

    /**
     * ExternalPictureURL
     * @access public
     * @param string $ExternalPictureURL 
     */
    public function ExternalPictureURL($ExternalPictureURL) {
        $this->ExternalPictureURL = $ExternalPictureURL;
        return $this;
    }

    /**
     * GalleryDuration
     * @access public
     * @param string $GalleryDuration 
     */
    public function GalleryDuration($GalleryDuration) {
        $this->GalleryDuration = $GalleryDuration;
        return $this;
    }

    /**
     * GalleryErrorInfo
     * @access public
     * @param string $GalleryErrorInfo 
     */
    public function GalleryErrorInfo($GalleryErrorInfo) {
        $this->GalleryErrorInfo = $GalleryErrorInfo;
        return $this;
    }

    /**
     * GalleryStatus
     * @access public
     * @param GalleryStatusCodeType $GalleryStatusCodeType
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GalleryStatusCodeType.html
     */
    public function GalleryStatus($GalleryStatusCodeType) {
        $this->GalleryStatus = $GalleryStatusCodeType;
        return $this;
    }

    /**
     * GalleryType
     * @access public
     * @param GalleryTypeCodeType $GalleryTypeCodeType
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GalleryTypeCodeType.html
     */
    public function GalleryType($GalleryTypeCodeType) {
        $this->GalleryType = $GalleryTypeCodeType;
        return $this;
    }

    /**
     * GalleryURL
     * @access public
     * @param string $GalleryURL 
     */
    public function GalleryURL($GalleryURL) {
        $this->GalleryURL = $GalleryURL;
        return $this;
    }

    /**
     * PhotoDisplayCodeType
     * @access public
     * @param PhotoDisplayCodeType $PhotoDisplayCodeType
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/PhotoDisplayCodeType.html
     */
    public function PhotoDisplay($PhotoDisplayCodeType) {
        $this->PhotoDisplay = $PhotoDisplayCodeType;
        return $this;
    }
    
    /**
     * PictureSource
     * @param PictureSourceCodeType $PictureSourceCodeType 
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/PictureSourceCodeType.html
     */
    public function PictureSource($PictureSourceCodeType){
        $this->PictureSource = $PictureSourceCodeType;
        return $this;
    }
    
    /**
     * PictureURL
     * @access public
     * @param array[] $PictureURL 
     */
    public function PictureURL($PictureURL){
        if(is_array($PictureURL)){
            $this->PictureURL = $PictureURL;
        } else {
            $this->PictureURL = array($PictureURL);
        }
        return $this;
    }

}
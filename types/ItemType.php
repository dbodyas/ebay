<?php

namespace rearley\Ebay\Types;

/**
 * Ebay API
 * @author Rick Earley <rick@earleyholdings.com>
 * @category Ebay API
 * @package ItemType
 */
class ItemType {

    // Fields
    private $ApplicationData;
    private $AutoPay;
    private $BidGroupItem;
    private $BuyerResponsibleForShipping;
    private $BuyItNowPrice;
    private $CategoryBasedAttributesPrefill;
    private $CategoryMappingAllowed;
    private $CeilingPrice;
    private $ClassifiedAdPayPerLeadFee;
    private $ConditionDisplayName;
    private $ConditionID;
    private $Country;
    private $CrossBorderTrade;
    private $Currency;
    private $Description;
    private $DescriptionReviseModel;
    private $DisableBuyerRequirements;
    private $DispatchTimeMax;
    private $eBayNotes;
    private $FloorPrice;
    private $GetItFast;
    private $GiftIcon;
    private $HitCount;
    private $HitCounter;
    private $IntegratedMerchantCreditCardEnabled;
    private $InventoryTrackingMethod;
    private $ItemCompatibilityCount;
    private $ItemID;
    private $LeadCount;
    private $LimitedWarrantyEligible;
    private $ListingDuration;
    private $ListingEnhancement;
    private $ListingSubtype2;
    private $ListingType;
    private $Location;
    private $LocationDefaulted;
    private $LotSize;
    private $MechanicalCheckAccepted;
    private $MotorsGermanySearchable;
    private $NewLeadCount;
    private $PaymentAllowedSite;
    private $PaymentMethods;
    private $PayPalEmailAddress;
    private $PostalCode;
    private $PostCheckoutExperienceEnabled;
    private $PrivateListing;
    private $PrivateNotes;
    private $ProxyItem;
    private $Quantity;
    private $QuantityAvailable;
    private $QuantityAvailableHint;
    private $QuantityThreshold;
    private $QuestionCount;
    private $Relisted;
    private $RelistLink;
    private $ReservePrice;
    private $ScheduleTime;
    private $SellerInventoryID;
    private $SellerProvidedTitle;
    private $SellerVacationNote;
    private $ShippingTermsInDescription;
    private $ShipToLocations;
    private $Site;
    private $SKU;
    private $SkypeContactOption;
    private $SkypeEnabled;
    private $SkypeID;
    private $StartPrice;
    private $SubTitle;
    private $TaxCategory;
    private $ThirdPartyCheckout;
    private $ThirdPartyCheckoutIntegration;
    private $TimeLeft;
    private $Title;
    private $TopRatedListing;
    private $TotalQuestionCount;
    private $UpdateReturnPolicy;
    private $UpdateSellerInfo;
    private $UseRecommendedProduct;
    private $UseTaxTable;
    private $UUID;
    private $VIN;
    private $VINLink;
    private $VRM;
    private $VRMLink;
    private $WatchCount;

    // Types
    private $ApplyBuyerProtection; // BuyerProtectionDetailsType
    private $AttributeArray; // AttributeArrayType
    private $AttributeSetArray; // AttributeSetArrayType
    private $BestOfferDetails; // BestOfferDetailsType
    private $BiddingDetails; // BiddingDetailsType
    private $BusinessSellerDetails; // BusinessSellerDetailsType
    private $BuyerRequirementDetails; // BuyerRequirementDetailsType
    private $Charity; // CharityType
    private $CrossPromotion; // CrossPromotionsType
    private $DiscountPriceInfo; // DiscountPriceInfoType
    private $ExtendedSellerContactDetails; // ExtendedContactDetailsType
    private $ExternalProductID; //  ExternalProductIDType    
    private $FreeAddedCategory; //CategoryType
    private $ItemCompatibilityList; //  ItemCompatibilityListType
    private $ItemPolicyViolation; // ItemPolicyViolationType
    private $ItemSpecifics; // NameValueListArrayType
    private $ListingCheckoutRedirectPreference; // ListingCheckoutRedirectPreferenceType
    private $ListingDesigner; // ListingDesignerType
    private $ListingDetails; // ListingDetailsType
    private $LookupAttributeArray; // LookupAttributeArrayType
    private $PaymentDetails; // PaymentDetailsType
    private $PictureDetails; // PictureDetailsType
    private $PrimaryCategory; // CategoryType
    private $ProductListingDetails; // ProductListingDetailsType
    private $QuantityInfo; // QuantityInfoType
    private $ReturnPolicy; // ReturnPolicyType
    private $ReviseStatus; // ReviseStatusType
    private $SearchDetails; // SearchDetailsType
    private $SecondaryCategory; // CategoryType
    private $Seller; // UserType
    private $SellerContactDetails; // AddressType 
    private $SellerProfiles; // SellerProfilesType
    private $SellingStatus; // SellingStatusType
    private $ShippingDetails; //  ShippingDetailsType
    private $ShippingPackageDetails; // ShipPackageDetailsType 
    private $Storefront; // StorefrontType
    private $Variations; // VariationsType 
    private $VATDetails; // VATDetailsType 
    
    
    function __construct() {
               
    }
    
    /**
     * Builds XML
     * @access public 
     */
    function build(){
        
        $xml = FALSE;
        
        // ApplicationData
        if(isset($this->ApplicationData)){
            $xml .= '<ApplicationData>'.$this->ApplicationData.'</ApplicationData>';
        }
        
        // ApplyBuyerProtection
        if(isset($this->ApplyBuyerProtection)){
            
            $xml .= '<ApplyBuyerProtection>';
            $xml .= $this->ApplyBuyerProtection->build();
            $xml .= '</ApplyBuyerProtection>';
        }
        
        // AttributeArray
        if(isset($this->AttributeArray)){
            $xml .= '<AttributeArray>';
            $xml .= $this->AttributeArray->build();
            $xml .= '</AttributeArray>';
        }
        
        // AutoPay
        if(isset($this->AutoPay)){
            $xml .= '<AutoPay>'.$this->AutoPay.'</AutoPay>';
        }
        
        // BestOfferDetails
        if(isset($this->BestOfferDetails)){
            $xml .= '<BestOfferDetails>';
            $xml .= $this->BestOfferDetails->build();
            $xml .= '</BestOfferDetails>';
        }
        
        // BuyerRequirementDetails
        if(isset($this->BuyerRequirementDetails)){
            $xml .= '<BuyerRequirementDetails>';
            $xml .= $this->BuyerRequirementDetails->build();
            $xml .= '</BuyerRequirementDetails>';
        }
        
        return $xml;
        
    }
        
    /**
     * ApplicationData
     * @access private
     * @param string $ApplicationData [0..1]
     */
    public function ApplicationData($ApplicationData){
        $this->ApplicationData = $ApplicationData;
        return $this;
    }
    
    /**
     * ApplyBuyerProtection
     * @access public
     * @param BuyerProtectionDetailsType $BuyerProtectionDetailsType [0..1]
     */
    public function ApplyBuyerProtection($BuyerProtectionDetailsType){

        $this->ApplyBuyerProtection = $BuyerProtectionDetailsType;        
        return $this;
    }
    
    /**
     * AttributeArray
     * @access public
     * @param AttributeArray $AttributeArrayType [0..1]
     */
    public function AttributeArray($AttributeArrayType){
        $this->AttributeArray = $AttributeArrayType;
        return $this;
    }
    
    /**
     * AutoPay
     * @access public
     * @param boolean $AutoPay [0..1] 
     */
    public function AutoPay($AutoPay){
        $this->AutoPay = $this->_get_boolean($AutoPay);
        return $this;
    }
    
    /**
     * BestOfferDetails
     * @access public
     * @param BestOfferDetailsType $BestOfferDetails [0..1]
     */
    public function BestOfferDetails($BestOfferDetails){
        $this->BestOfferDetails = $BestOfferDetails;
        return $this;
    }
    
    /**
     * BuyerRequirementDetails
     * @access public
     * @param BuyerRequirementDetailsType $BuyerRequirementDetails
     */
    public function BuyerRequirementDetails($BuyerRequirementDetails){
        $this->BuyerRequirementDetails = $BuyerRequirementDetails;
        return $this;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /**
     * ItemCompatibilityList
     * @access public
     * @param array[] $array Array Structure of ItemCompatibilityListType
     */
    public function ItemCompatibilityList($array){
        $this->ItemCompatibilityList = $array;
    }
    
    /**
     * Returns 1/0 for boolean check
     * @param string|boolean $field
     * @return int 
     */
    private function _get_boolean($field){
        
        $boolean = '';
        
        if(is_bool($field)){
            if($field){
                $boolean =  '1';
            } else {
                $boolean = '0';
            }
        } else {
            if(strtolower($field) == 'true'){
                $boolean = '1';
            } else {
                $boolean = '0';
            }
        }
        
        return $boolean;
    }

}
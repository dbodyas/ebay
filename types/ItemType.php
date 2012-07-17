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
    private $BuyItNowPrice_AmountType;
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
    private $GiftServices;
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
        
        // BuyerResponsibleForShipping
        if(isset($this->BuyerResponsibleForShipping)){
            $xml .= '<BuyerResponsibleForShipping>'.$this->BuyerResponsibleForShipping.'</BuyerResponsibleForShipping>';
        }
        
        // BuyItNowPrice
        if(isset($this->BuyItNowPrice)){
            
            $xml . '<BuyItNowPrice';
            
            if(isset($this->BuyItNowPrice_AmountType)){
                $xml .= ' currencyID = "'.$this->BuyItNowPrice_AmountType.'">';
            } else {
                $xml .= '>';
            }
            
            $xml .= $this->BuyItNowPrice.'</BuyItNowPrice>';
        }
        
        // CategoryBasedAttributesPrefill
        if(isset($this->CategoryBasedAttributesPrefill)){
            $xml .= '<CategoryBasedAttributesPrefill>'.$this->CategoryBasedAttributesPrefill.'</CategoryBasedAttributesPrefill>';
        }
        
        // CategoryMappingAllowed
        if(isset($this->CategoryMappingAllowed)){
            $xml .= '<CategoryMappingAllowed>'.$this->CategoryMappingAllowed.'</CategoryMappingAllowed>';
        }
        
        // Charity
        if(isset($this->Charity)){
            $xml .= '<Charity>';
            $xml .= $this->Charity->build();
            $xml .= '</Charity>';
        }
        
        // ConditionID
        if(isset($this->ConditionID)){
            $xml .= '<ConditionID>'.$this->ConditionID.'</ConditionID>';
        }
        
        // Country
        if(isset($this->Country)){
            $xml .='<Country>'.$this->Country.'</Country>';
        }
        
        // CrossBorderTrade
        if(isset($this->CrossBorderTrade)){
            
            foreach($this->CrossBorderTrade as $cbt){
                $xml .= '<CrossBorderTrade>';
                $xml .= $cbt;
                $xml .= '</CrossBorderTrade>';
            }
        }
        
        // Currency
        if(isset($this->Currency)){
            $xml .= '<Currency>'.$this->Currency.'</Currency>';
        }
        
        // Description
        if(isset($this->Description)){
            $xml .= '<Description>'.$this->Description.'</Description>';
        }
        
        // DisableBuyerRequirements
        if(isset($this->DisableBuyerRequirements)){
            $xml .= '<DisableBuyerRequirements>'.$this->DisableBuyerRequirements.'</DisableBuyerRequirements>';
        }
        
        // DiscountPriceInfo
        if(isset($this->DiscountPriceInfo)){
            $xml .= '<DiscountPriceInfo>';
            $xml .= $this->DiscountPriceInfo->build();
            $xml .= '</DiscountPriceInfo>';
        }
        
        // DispatchTimeMax
        if(isset($this->DispatchTimeMax)){
            $xml .= '<DispatchTimeMax>'.$this->DispatchTimeMax.'</DispatchTimeMax>';
        }
        
        // ExtendedSellerContactDetails
        if(isset($this->ExtendedSellerContactDetails)){
            $xml .= '<ExtendedSellerContactDetails>';
            $xml .= $this->ExtendedSellerContactDetails->build();
            $xml .= '</ExtendedSellerContactDetails>';
        }
        
        // GetItFast
        if(isset($this->GetItFast)){
            $xml .= '<GetItFast>'.$this->GetItFast.'</GetItFast>';
        }
        
        // GiftIcon
        if(isset($this->GiftIcon)){
            $xml .= '<GiftIcon>'.$this->GiftIcon.'</GiftIcon>';
        }
        
        // GiftServices
        if(isset($this->GiftServices)){
            foreach($this->GiftServices as $gs){
                $xml .= '<GiftServices>'.$gs.'</GiftServices>';
            }
        }
        
        // HitCounter
        if(isset($this->HitCounter)){
            $xml .= '<HitCounter>'.$this->HitCounter.'</HitCounter>';
        }
        
        // ItemCompatibilityList
        if(isset($this->ItemCompatibilityList)){
            $xml .= '<ItemCompatibilityList>';
            $xml .= $this->ItemCompatibilityList->build();
            $xml .= '</ItemCompatibilityList>';
        }
        
        // ItemSpecifics
        if(isset($this->ItemSpecifics)){
            $xml .= '<ItemSpecifics>';
            $xml .= $this->ItemSpecifics->build();
            $xml .= '</ItemSpecifics>';
        }
        
        // ListingCheckoutRedirectPreference
        if(isset($this->ListingCheckoutRedirectPreference)){
            $xml .= '<ListingCheckoutRedirectPreference>';
            $xml .= $this->ListingCheckoutRedirectPreference->build();
            $xml .= '</ListingCheckoutRedirectPreference>';
        }
        
        // ListingDesigner
        if(isset($this->ListingDesigner)){
            $xml .= '<ListingDesigner>';
            $xml .= $this->ListingDesigner->build();
            $xml .= '</ListingDesigner>';
        }
        
        // ListingDetails
        if(isset($this->ListingDetails)){
            $xml .= '<ListingDetails>';
            $xml .= $this->ListingDetails->build();
            $xml .= '</ListingDetails>';
        }
        
        // ListingDuration
        if(isset($this->ListingDuration)){
            $xml .= '<ListingDuration>'.$this->ListingDuration.'</ListingDuration>';
        }
        
        // ListingEnhancement
        if(isset($this->ListingEnhancement)){
            foreach($this->ListingEnhancement as $le){
                $xml .= '<ListingEnhancement>'.$le.'</ListingEnhancement>';
            }            
        }
        
        // ListingSubtype2
        if(isset($this->ListingSubtype2)){
            $xml .= '<ListingSubtype2>'.$this->ListingSubtype2.'</ListingSubtype2>';
        }
        
        // ListingType
        if(isset($this->ListingType)){
            $xml .= '<ListingType>'.$this->ListingType.'</ListingType>';
        }
        
        // Location
        if(isset($this->Location)){
            $xml .= '<Location>'.$this->Location.'</Location>';
        }
        
        // LookupAttributeArray
        if(isset($this->LookupAttributeArray)){
            $xml .= '<LookupAttributeArray>';
            $xml .= $this->LookupAttributeArray->build();
            $xml .= '</LookupAttributeArray>';
        }
        
        // LotSize
        if(isset($this->LotSize)){
            $xml .= '<LotSize>'.$this->LotSize.'</LotSize>';
        }
        
        // MotorsGermanySearchable
        if(isset($this->MotorsGermanySearchable)){
            $xml .= '<MotorsGermanySearchable>'.$this->MotorsGermanySearchable.'</MotorsGermanySearchable>';
        }
        
        // PaymentDetails
        if(isset($this->PaymentDetails)){
            $xml .= '<PaymentDetails>';
            $xml .= $this->PaymentDetails->build();
            $xml .= '</PaymentDetails>';
        }
        
        // PaymentMethods
        if(isset($this->PaymentMethods)){
            foreach($this->PaymentMethods as $pm){
                $xml .= '<PaymentMethods>'.$pm.'</PaymentMethods>';
            }
        }
        
        // PayPalEmailAddress
        if(isset($this->PayPalEmailAddress)){
            $xml .= '<PayPalEmailAddress>'.$this->PayPalEmailAddress.'</PayPalEmailAddress>';
        }
        
        // PictureDetails
        if(isset($this->PictureDetails)){
            $xml .= '<PictureDetails>';
            $xml .= $this->PictureDetails->build();
            $xml .= '</PictureDetails>';
        }
        
        // PostalCode
        if(isset($this->PostalCode)){
            $xml .= '<PostalCode>'.$this->PostalCode.'</PostalCode>';
        }
        
        // PostCheckoutExperienceEnabled
        if(isset($this->PostCheckoutExperienceEnabled)){
            $xml .= '<PostCheckoutExperienceEnabled>'.$this->PostCheckoutExperienceEnabled.'</PostCheckoutExperienceEnabled>';
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
     * @param BuyerRequirementDetailsType $BuyerRequirementDetails [0..1]
     */
    public function BuyerRequirementDetails($BuyerRequirementDetails){
        $this->BuyerRequirementDetails = $BuyerRequirementDetails;
        return $this;
    }
    
    /**
     * BuyerResponsibleForShipping
     * @access public
     * @param boolean $BuyerResponsibleForShipping [0..1]
     */
    public function BuyerResponsibleForShipping($BuyerResponsibleForShipping){
        $this->BuyerResponsibleForShipping = $this->_get_boolean($BuyerResponsibleForShipping);
        return $this;
    }
    
    /**
     * BuyItNowPrice
     * @access public
     * @param double $amount
     * @param string $amountType [0..1]
     */
    public function BuyItNowPrice($amount,$amountType = NULL){
        $this->BuyItNowPrice = $amount;
        $this->BuyItNowPrice_AmountType = $amountType;
        return $this;
    }
    
    /**
     * CategoryBasedAttributesPrefill
     * @access public
     * @param boolean $CategoryBasedAttributesPrefill [0..1]
     */
    public function CategoryBasedAttributesPrefill($CategoryBasedAttributesPrefill){
        $this->CategoryBasedAttributesPrefill = $this->_get_boolean($CategoryBasedAttributesPrefill);
        return $this;
    }
    
    /**
     * CategoryMappingAllowed
     * @access public
     * @param boolean $CategoryMappingAllowed [0..1]
     */
    public function CategoryMappingAllowed($CategoryMappingAllowed){
        $this->CategoryMappingAllowed = $this->_get_boolean($CategoryMappingAllowed);
        return $this;
    }
    
    /**
     * Charity
     * @access public
     * @param CharityType $CharityType [0..1] 
     */
    public function Charity($CharityType){
        $this->Charity = $CharityType;
        return $this;
    }
    
    /**
     * ConditionID
     * @access public
     * @param int $ConditionID [0..1]
     */
    public function ConditionID($ConditionID){
        $this->ConditionID = $ConditionID;
        return $this;
    }
    
    /**
     * Country
     * @access public
     * @param CountryCodeType $CountryCodeType [1] See Link for Values
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CountryCodeType.html
     */
    public function Country($CountryCodeType){
        $this->Country = $CountryCodeType;
        return $this;
    }
    
    /**
     * CrossBorderTrade
     * @access public
     * @param array[] $CrossBorderTrade [0..*]
     */
    public function CrossBorderTrade($CrossBorderTrade){
        if(is_array($CrossBorderTrade)){
            $this->CrossBorderTrade = $CrossBorderTrade;
        }else{
            $this->CrossBorderTrade = array($CrossBorderTrade);
        }
        return $this;
    }
    
    /**
     * Currency
     * @access public
     * @param CurrencyCodeType $Currency [1]
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CurrencyCodeType.html
     */
    public function Currency($Currency){
        $this->Currency = $Currency;
        return $this;
    }
    
    /**
     * Description
     * @access public
     * @param string $Description [0..1]
     */
    public function Description($Description){
        $this->Description = $Description;
        return $this;
    }
    
    /**
     * DisableBuyerRequirements
     * @access public
     * @param boolean $DisableBuyerRequirements [0..1]
     */
    public function DisableBuyerRequirements($DisableBuyerRequirements){
        $this->DisableBuyerRequirements = $this->_get_boolean($DisableBuyerRequirements);
        return $this;
    }
    
    /**
     * DiscountPriceInfo
     * @access public
     * @param DiscountPriceInfoType $DiscountPriceInfoType [0..1]
     */
    public function DiscountPriceInfo($DiscountPriceInfoType){
        $this->DiscountPriceInfo = $DiscountPriceInfoType;
        return $this;
    }
    
    /**
     * DispatchTimeMax
     * @access public
     * @param int $DispatchTimeMax [0..1]
     */
    public function DispatchTimeMax($DispatchTimeMax){
        $this->DispatchTimeMax = $DispatchTimeMax;
        return $this;
    }
    
    /**
     * ExtendedSellerContactDetails
     * @access public
     * @param ExtendedSellerContactDetailsType $ExtendedSellerContactDetailsType [0..1]
     */
    public function ExtendedSellerContactDetails($ExtendedSellerContactDetailsType){
        $this->ExtendedSellerContactDetails = $ExtendedSellerContactDetailsType;
        return $this;
    }
    
    /**
     * GetItFast
     * @access public
     * @param boolean $GetItFast [0..1]
     */
    public function GetItFast($GetItFast){
        $this->GetItFast = $this->_get_boolean($GetItFast);
        return $this;
    }
    
    /**
     * GiftIcon
     * @access public
     * @param int $GiftIcon [0..1]
     */
    public function GiftIcon($GiftIcon){
        $this->GiftIcon = $GiftIcon;
        return $this;
    }
    
    /**
     * GiftServices
     * @access public
     * @param array[] $GiftServicesCodeType [0..*] See Link for Values
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GiftServicesCodeType.html
     */
    public function GiftServices($GiftServicesCodeType){
        if(is_array($GiftServicesCodeType)){
            $this->GiftServices = $GiftServicesCodeType;
        }else{
            $this->GiftServices = array($GiftServicesCodeType);
        }
        return $this;
  
    }
    
    /**
     * HitCounter
     * @access public
     * @param string $HitCounter [0..1] See Link for Values
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/HitCounterCodeType.html
     */
    public function HitCounter($HitCounter){
        $this->HitCounter = $HitCounter;
        return $this;
    }
    
    /**
     * ItemCompatibilityList
     * @access public
     * @param ItemCompatibilityListType $ItemCompatibilityListType [0..1]
     */
    public function ItemCompatibilityList($ItemCompatibilityListType){
        $this->ItemCompatibilityList = $ItemCompatibilityListType;
        return $this;
    }
    
    /**
     * ItemSpecifics
     * @access public
     * @param NameValueListArrayType $NameValueListArrayType [0..1]
     */
    public function ItemSpecifics($NameValueListArrayType){
        $this->ItemSpecifics = $NameValueListArrayType;
        return $this;
    }
    
    /**
     * ListingCheckoutRedirectPreference
     * @access public
     * @param ListingCheckoutRedirectPreferenceType $ListingCheckoutRedirectPreferenceType [0..1]
     */
    public function ListingCheckoutRedirectPreference($ListingCheckoutRedirectPreferenceType){
        $this->ListingCheckoutRedirectPreference = $ListingCheckoutRedirectPreferenceType;
        return $this;
    }
    
    /**
     * ListingDesigner
     * @access public
     * @param ListingDesignerType $ListingDesignerType [0..1]
     */
    public function ListingDesigner($ListingDesignerType){
        $this->ListingDesigner = $ListingDesignerType;
        return $this;
    }
    
    /**
     * ListingDetails
     * @access public
     * @param ListingDetailsType $ListingDetailsType 
     */
    public function ListingDetails($ListingDetailsType){
        $this->ListingDetails = $ListingDetailsType;
        return $this;
    }
    
    /**
     * ListingDuration
     * @access public
     * @param string $ListingDuration 
     */
    public function ListingDuration($ListingDuration){
        $this->ListingDuration = $ListingDuration;
        return $this;
    }
    
    /**
     * ListingEnhancement
     * @access public
     * @param ListingEnhancementsCodeType[] $ListingEnhancementsCodeType See Link for values
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ListingEnhancementsCodeType.html
     */
    public function ListingEnhancement($ListingEnhancementsCodeType){
        if(is_array($ListingEnhancementsCodeType)){
            $this->ListingEnhancement = $ListingEnhancementsCodeType;
        } else {
            $this->ListingEnhancement = array($ListingEnhancementsCodeType);
        }
        
        return $this;
    }
    
    /**
     * ListingSubtype2
     * @access public
     * @param ListingSubtypeCodeType $ListingSubtypeCodeType
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ListingSubtypeCodeType.html
     */
    public function ListingSubtype2($ListingSubtypeCodeType){
        $this->ListingSubtype2 = $ListingSubtypeCodeType;
        return $this;
    }
    
    /**
     * ListingType
     * @access public
     * @param ListingSubtypeCodeType $ListingSubtypeCodeType
     * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ListingSubtypeCodeType.html
     */
    public function ListingType($ListingSubtypeCodeType){
        $this->ListingType = $ListingSubtypeCodeType;
        return $this;
    }
    
    /**
     * Location
     * @access public
     * @param string $Location 
     */
    public function Location($Location){
        $this->Location = $Location;
        return $this;
    }
    
    /**
     * LookupAttributeArray
     * @access public
     * @param LookupAttributeArrayType $LookupAttributeArrayType 
     */
    public function LookupAttributeArray($LookupAttributeArrayType){
        $this->LookupAttributeArray = $LookupAttributeArrayType;
        return $this;
    }
    
    /**
     * LotSize
     * @access public
     * @param int $LotSize 
     */
    public function LotSize($LotSize){
        $this->LotSize = $LotSize;
        return $this;
    }
    
    /**
     * MotorsGermanySearchable
     * @access public
     * @param boolean $MotorsGermanySearchable 
     */
    public function MotorsGermanySearchable($MotorsGermanySearchable){
        $this->MotorsGermanySearchable = $this->_get_boolean($MotorsGermanySearchable);
        return $this;
    }
    
    /**
     * PaymentDetails
     * @access public
     * @param PaymentDetailsType $PaymentDetailsType 
     */
    public function PaymentDetails($PaymentDetailsType){
        $this->PaymentDetails = $PaymentDetailsType;
        return $this;
    }
    
    /**
     * PaymentMethods
     * @access public
     * @param BuyerPaymentMethodCodeType[] $BuyerPaymentMethodCodeType 
     */
    public function PaymentMethods($BuyerPaymentMethodCodeType){
        if(is_array($BuyerPaymentMethodCodeType)){
            $this->PaymentMethods = $BuyerPaymentMethodCodeType;
        } else {
            $this->PaymentMethods = array($BuyerPaymentMethodCodeType);
        }
        return $this;
    }
    
    /**
     * PayPalEmailAddress
     * @access public
     * @param string $PayPalEmailAddress 
     */
    public function PayPalEmailAddress($PayPalEmailAddress){
        $this->PayPalEmailAddress = $PayPalEmailAddress;
        return $this;
    }
    
    /**
     * PictureDetails
     * @access public
     * @param PictureDetailsType $PictureDetailsType 
     */
    public function PictureDetails($PictureDetailsType){
        $this->PictureDetails = $PictureDetailsType;
        return $this;
    }
    
    /**
     * PostalCode
     * @access public
     * @param string $PostalCode 
     */
    public function PostalCode($PostalCode){
        $this->PostalCode = $PostalCode;
        return $this;
    }
    
    /**
     * PostCheckoutExperienceEnabled
     * @access public
     * @param boolean $PostCheckoutExperienceEnabled 
     */
    public function PostCheckoutExperienceEnabled($PostCheckoutExperienceEnabled){
        $this->PostCheckoutExperienceEnabled = $this->_get_boolean($PostCheckoutExperienceEnabled);
        return $this;
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
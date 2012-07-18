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
    private $CategoryBasedAttributesPrefill;
    private $CategoryMappingAllowed;
    private $ConditionID;
    private $Country;
    private $CrossBorderTrade;
    private $Currency;
    private $Description;
    private $DisableBuyerRequirements;
    private $DispatchTimeMax;
    private $GetItFast;
    private $GiftIcon;
    private $GiftServices;
    private $HitCounter;
    private $InventoryTrackingMethod;
    private $ListingDuration;
    private $ListingEnhancement;
    private $ListingType;
    private $Location;
    private $PaymentMethods;
    private $PayPalEmailAddress;
    private $PostalCode;
    private $PostCheckoutExperienceEnabled;
    private $PrivateListing;
    private $PrivateNotes;
    private $Quantity;
    private $ScheduleTime;
    private $SellerProvidedTitle;
    private $ShippingTermsInDescription;
    private $ShipToLocations;
    private $Site;
    private $SKU;
    private $SkypeContactOption;
    private $SkypeEnabled;
    private $SkypeID;
    private $StartPrice;
    private $StartPrice_AmountType;
    private $SubTitle;
    private $TaxCategory;
    private $ThirdPartyCheckout;
    private $ThirdPartyCheckoutIntegration;
    private $Title;
    private $UseRecommendedProduct;
    private $UseTaxTable;
    private $UUID;
    private $VIN;
    private $VRM;

    // Types
    private $BuyerRequirementDetails; // BuyerRequirementDetailsType
    private $Charity; // CharityType
    private $DiscountPriceInfo; // DiscountPriceInfoType
    private $ExternalProductID; // ExternalProductIDType
    private $ItemCompatibilityList; // ItemCompatibilityListType
    private $ItemSpecifics; // NameValueListArrayType
    private $ListingCheckoutRedirectPreference; // ListingCheckoutRedirectPreferenceType
    private $ListingDesigner; // ListingDesignerType
    private $ListingDetails; // ListingDetailsType
    private $LookupAttributeArray; // LookupAttributeArrayType
    private $PictureDetails; // PictureDetailsType
    private $PrimaryCategory; // CategoryType
    private $ProductListingDetails; // ProductListingDetailsType
    private $QuantityInfo; // QuantityInfoType
    private $ReturnPolicy; // ReturnPolicyType
    private $SecondaryCategory; // CategoryType
    private $SellerProfiles; // SellerProfilesType
    private $ShippingDetails; // ShippingDetailsType
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
    function build() {

        $xml = FALSE;
        
        // ApplicationData
        if(isset($this->ApplicationData)){
            $xml .= '<ApplicationData>'.$this->ApplicationData.'</ApplicationData>';
        }
        
        // AutoPay
        if(isset($this->AutoPay)){
            $xml .= '<AutoPay>'.$this->AutoPay.'</AutoPay>';
        }
        
        // BuyerRequirementDetails
        if(isset($this->BuyerRequirementDetails)){
            $xml .= '<BuyerRequirementDetails>';
            $xml .= $this->BuyerRequirementDetails->build();
            $xml .= '</BuyerRequirementDetails>';
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
            $xml .= '<Country>'.$this->Country.'</Country>';
        }
        
        // CrossBorderTrade
        if(isset($this->CrossBorderTrade)){
            foreach($this->CrossBorderTrade as $cbt){
                $xml .= '<CrossBorderTrade>'.$cbt.'</CrossBorderTrade>';
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
        
        // ExternalProductID
        if(isset($this->ExternalProductID)){
            $xml .= '<ExternalProductID>';
            $xml .= $this->ExternalProductID->build();
            $xml .= '</ExternalProductID>';
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
        
        // InventoryTrackingMethod
        if(isset($this->InventoryTrackingMethod)){
            $xml .= '<InventoryTrackingMethod>'.$this->InventoryTrackingMethod.'</InventoryTrackingMethod>';
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
        
        // PrimaryCategory
        if(isset($this->PrimaryCategory)){
            $xml .= '<PrimaryCategory>';
            $xml .= $this->PrimaryCategory->build();
            $xml .= '</PrimaryCategory>';
        }
        
        // PrivateListing
        if(isset($this->PrivateListing)){
            $xml .= '<PrivateListing>'.$this->PrivateListing.'</PrivateListing>';
        }
        
        // PrivateNotes
        if(isset($this->PrivateNotes)){
            $xml .= '<PrivateNotes>'.$this->PrivateNotes.'</PrivateNotes>';
        }
        
        // ProductListingDetails
        if(isset($this->ProductListingDetails)){
            $xml .= '<ProductListingDetails>';
            $xml .= $this->ProductListingDetails->build();
            $xml .= '</ProductListingDetails>';
        }
        
        // Quantity
        if(isset($this->Quantity)){
            $xml .= '<Quantity>'.$this->Quantity.'</Quantity>';
        }
        
        // QuantityInfo
        if(isset($this->QuantityInfo)){
            $xml .= '<QuantityInfo>';
            $xml .= $this->QuantityInfo->build();
            $xml .= '</QuantityInfo>';
        }
        
        // ReturnPolicy
        if(isset($this->ReturnPolicy)){
            $xml .= '<ReturnPolicy>';
            $xml .= $this->ReturnPolicy->build();
            $xml .= '</ReturnPolicy>';
        }
        
        // ScheduleTime
        if(isset($this->ScheduleTime)){
            $xml .= '<ScheduleTime>'.$this->ScheduleTime.'</ScheduleTime>';
        }
        
        // SecondaryCategory
        if(isset($this->SecondaryCategory)){
            $xml .= '<SecondaryCategory>';
            $xml .= $this->SecondaryCategory->build();
            $xml .= '</SecondaryCategory>';
        }
        
        // SellerProfiles
        if(isset($this->SellerProfiles)){
            $xml .= '<SellerProfiles>';
            $xml .= $this->SellerProfiles->build();
            $xml .= '</SellerProfiles>';
        }
        
        // SellerProvidedTitle
        if(isset($this->SellerProvidedTitle)){
            $xml .= '<SellerProvidedTitle>'.$this->SellerProvidedTitle.'</SellerProvidedTitle>';
        }
        
        // ShippingDetails
        if(isset($this->ShippingDetails)){
            $xml .= '<ShippingDetails>';
            $xml .= $this->ShippingDetails->build();
            $xml .= '</ShippingDetails>';
        }
        
        // ShippingPackageDetails
        if(isset($this->ShippingPackageDetails)){
            $xml .= '<ShippingPackageDetails>';
            $xml .= $this->ShippingPackageDetails->build();
            $xml .= '</ShippingPackageDetails>';
        }
        
        // ShippingTermsInDescription
        if(isset($this->ShippingTermsInDescription)){
            $xml .= '<ShippingTermsInDescription>'.$this->ShippingTermsInDescription.'</ShippingTermsInDescription>';
        }
        
        // ShipToLocations
        if(isset($this->ShipToLocations)){
            foreach($this->ShipToLocations as $sl){
                $xml .= '<ShipToLocations>'.$sl.'</ShipToLocations>';
            }
        }
        
        // Site
        if(isset($this->Site)){
            $xml .= '<Site>'.$this->Site.'</Site>';
        }
        
        // SKU
        if(isset($this->SKU)){
            $xml .= '<SKU>'.$this->SKU.'</SKU>';
        }
        
        // SkypeContactOption
        if(isset($this->SkypeContactOption)){
            $xml .= '<SkypeContactOption>'.$this->SkypeContactOption.'</SkypeContactOption>';
        }
        
        // SkypeEnabled
        if(isset($this->SkypeEnabled)){
            $xml .= '<SkypeEnabled>'.$this->SkypeEnabled.'</SkypeEnabled>';
        }
        
        // SkypeID
        if(isset($this->SkypeID)){
            $xml .= '<SkypeID>'.$this->SkypeID.'</SkypeID>';
        }
        
        // StartPrice
        if(isset($this->StartPrice)){
            $xml .= '<StartPrice';
            
            if(isset($this->StartPrice_AmountType)){
                $xml .= ' currencyID="'.$this->StartPrice_AmountType.'">';
            } else {
                $xml .= '>';
            }
            
            $xml .= $this->StartPrice.'</StartPrice>';
        }
        
        // Storefront
        if(isset($this->Storefront)){
            $xml .= '<Storefront>';
            $xml .= $this->Storefront->build();
            $xml .= '</Storefront>';
        }
        
        // SubTitle
        if(isset($this->SubTitle)){
            $xml .= '<SubTitle>'.$this->SubTitle.'</SubTitle>';
        }
        
        // TaxCategory
        if(isset($this->TaxCategory)){
            $xml .= '<TaxCategory>'.$this->TaxCategory.'</TaxCategory>';
        }
        
        // ThirdPartyCheckout
        if(isset($this->ThirdPartyCheckout)){
            $xml .= '<ThirdPartyCheckout>'.$this->ThirdPartyCheckout.'</ThirdPartyCheckout>';
        }
        
        // ThirdPartyCheckoutIntegration
        if(isset($this->ThirdPartyCheckoutIntegration)){
            $xml .= '<ThirdPartyCheckoutIntegration>'.$this->ThirdPartyCheckoutIntegration.'</ThirdPartyCheckoutIntegration>';
        }
        
        // Title
        if(isset($this->Title)){
            $xml .= '<Title>'.$this->Title.'</Title>';
        }
        
        // UseRecommendedProduct
        if(isset($this->UseRecommendedProduct)){
            $xml .= '<UseRecommendedProduct>'.$this->UseRecommendedProduct.'</UseRecommendedProduct>';
        }
        
        // UseTaxTable
        if(isset($this->UseTaxTable)){
            $xml .= '<UseTaxTable>'.$this->UseTaxTable.'</UseTaxTable>';
        }
        
        // UUID
        if(isset($this->UUID)){
            $xml .= '<UUID>'.$this->UUID.'</UUID>';
        }
        
        // Variations
        if(isset($this->Variations)){
            $xml .= '<Variations>';
            $xml .= $this->Variations->build();
            $xml .= '</Variations>';
        }
        
        // VATDetails
        if(isset($this->VATDetails)){
            $xml .= '<VATDetails>';
            $xml .= $this->VATDetails->build();
            $xml .= '</VATDetails>';
        }
        
        // VIN
        if(isset($this->VIN)){
            $xml .= '<VIN>'.$this->VIN.'</VIN>';
        }
        
        // VRM
        if(isset($this->VRM)){
            $xml .= '<VRM>'.$this->VRM.'</VRM>';
        }
        
        
        return $xml;
    }
    
    /**
     * ApplicationData
     * @access public
     * @param string $ApplicationData 
     */
    public function ApplicationData($ApplicationData){
        $this->ApplicationData = $ApplicationData;
        return $this;
    }
    
    /**
     * AutoPay
     * @access public
     * @param boolean $AutoPay 
     */
    public function AutoPay($AutoPay){
        $this->AutoPay = $this->_get_boolean($AutoPay);
        return $this;
    }
    
    /**
     * BuyerRequirementDetails
     * @access public
     * @param BuyerRequirementDetailsType $BuyerRequirementDetailsType 
     */
    public function BuyerRequirementDetails($BuyerRequirementDetailsType){
        $this->BuyerRequirementDetails = $BuyerRequirementDetailsType;
        return $this;
    }
    
    /**
     * CategoryBasedAttributesPrefill
     * @access public
     * @param boolean $CategoryBasedAttributesPrefill 
     */
    public function CategoryBasedAttributesPrefill($CategoryBasedAttributesPrefill){
        $this->CategoryBasedAttributesPrefill = $CategoryBasedAttributesPrefill;
        return $this;
    }
    
    /**
     * CategoryMappingAllowed
     * @access public
     * @param boolean $CategoryMappingAllowed 
     */
    public function CategoryMappingAllowed($CategoryMappingAllowed){
        $this->CategoryMappingAllowed = $this->_get_boolean($CategoryMappingAllowed);
        return $this;
    }
    
    /**
     * Charity
     * @access public
     * @param CharityType $CharityType 
     */
    public function Charity($CharityType){
        $this->Charity = $CharityType;
        return $this;
    }
    
    /**
     * ConditionID
     * @access public
     * @param int $ConditionID 
     */
    public function ConditionID($ConditionID){
        $this->ConditionID = $ConditionID;
        return $this;
    }
    
    /**
     * Country
     * @access public
     * @param (string)CountryCodeType $CountryCodeType 
     */
    public function Country($CountryCodeType){
        $this->Country = $CountryCodeType;
        return $this;
    }
    
    /**
     * CrossBorderTrade
     * @access public
     * @param string $CrossBorderTrade 
     */
    public function CrossBorderTrade($CrossBorderTrade){
        $this->CrossBorderTrade = $CrossBorderTrade;
        return $this;
    }
    
    /**
     * Currency
     * @access public
     * @param (string)CurrencyCodeType $CurrencyCodeType 
     */
    public function Currency($CurrencyCodeType){
        $this->Currency = $CurrencyCodeType;
        return $this;
    }
    
    /**
     * Description
     * @access public
     * @param string $Description 
     */
    public function Description($Description){
        $this->Description = $Description;
        return $this;
    }
    
    /**
     * DisableBuyerRequirements
     * @access public
     * @param boolean $DisableBuyerRequirements 
     */
    public function DisableBuyerRequirements($DisableBuyerRequirements){
        $this->DisableBuyerRequirements = $DisableBuyerRequirements;
        return $this;
    }
    
    /**
     * DiscountPriceInfo
     * @access public
     * @param DiscountPriceInfoType $DiscountPriceInfoType 
     */
    public function DiscountPriceInfo($DiscountPriceInfoType){
        $this->DiscountPriceInfo = $DiscountPriceInfoType;
        return $this;
    }
    
    /**
     * DispatchTimeMax
     * @access public
     * @param int $DispatchTimeMax 
     */
    public function DispatchTimeMax($DispatchTimeMax){
        $this->DispatchTimeMax = $DispatchTimeMax;
        return $this;
    }
    
    /**
     * ExternalProductID
     * @access public
     * @param ExternalProductIDType $ExternalProductIDType 
     */
    public function ExternalProductID($ExternalProductIDType){
        $this->ExternalProductID = $ExternalProductIDType;
        return $this;
    }
    
    /**
     * GetItFast
     * @access public
     * @param boolean $GetItFast 
     */
    public function GetItFast($GetItFast){
        $this->GetItFast = $this->_get_boolean($GetItFast);
        return $this;
    }
    
    /**
     * GiftIcon
     * @access public
     * @param int $GiftIcon 
     */
    public function GiftIcon($GiftIcon){
        $this->GiftIcon = $GiftIcon;
        return $this;
    }
    
    /**
     * GiftServices
     * @access public
     * @param (string)GiftServicesCodeType $GiftServicesCodeType 
     */
    public function GiftServices($GiftServicesCodeType){
        $this->GiftServices = $GiftServicesCodeType;
        return $this;
    }
    
    /**
     * HitCounter
     * @access public
     * @param (string)HitCounterCodeType $HitCounterCodeType 
     */
    public function HitCounter($HitCounterCodeType){
        $this->HitCounter = $HitCounterCodeType;
        return $this;
    }
    
    /**
     * InventoryTrackingMethod
     * @access public
     * @param (string)InventoryTrackingMethodCodeType $InventoryTrackingMethodCodeType 
     */
    public function InventoryTrackingMethod($InventoryTrackingMethodCodeType){
        $this->InventoryTrackingMethod = $InventoryTrackingMethodCodeType;
        return $this;
    }
    
    /**
     * ItemCompatibilityList
     * @access public
     * @param ItemCompatibilityListType $ItemCompatibilityListType 
     */
    public function ItemCompatibilityList($ItemCompatibilityListType){
        $this->ItemCompatibilityList = $ItemCompatibilityListType;
        return $this;
    }
    
    /**
     * ItemSpecifics
     * @access public
     * @param NameValueListArrayType $NameValueListArrayType 
     */
    public function ItemSpecifics($NameValueListArrayType){
        $this->ItemSpecifics = $NameValueListArrayType;
        return $this;
    }
    
    /**
     * ListingCheckoutRedirectPreference
     * @access public
     * @param ListingCheckoutRedirectPreferenceType $ListingCheckoutRedirectPreferenceType 
     */
    public function ListingCheckoutRedirectPreference($ListingCheckoutRedirectPreferenceType){
        $this->ListingCheckoutRedirectPreference = $ListingCheckoutRedirectPreferenceType;
        return $this;
    }
    
    /**
     * ListingDesigner
     * @access public
     * @param ListingDesignerType $ListingDesignerType 
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
     * @param (array)ListingEnhancementCodeType $ListingEnhancementCodeType 
     */
    public function ListingEnhancement($ListingEnhancementCodeType){
        if(is_array($ListingEnhancementCodeType)){
            $this->ListingEnhancement = $ListingEnhancementCodeType;
        } else {
            $this->ListingEnhancement = array($ListingEnhancementCodeType);
        }
        return $this;
    }
    
    /**
     * ListingType
     * @access public
     * @param (string)ListingTypeCodeType $ListingTypeCodeType 
     */
    public function ListingType($ListingTypeCodeType){
        $this->ListingType = $ListingTypeCodeType;
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
     * PaymentMethods
     * @access public
     * @param (array)PaymentMethodCodeType $PaymentMethodCodeType 
     */
    public function PaymentMethods($PaymentMethodCodeType){
        if(is_array($PaymentMethodCodeType)){
            $this->PaymentMethods = $PaymentMethodCodeType;
        } else {
            $this->PaymentMethods = array($PaymentMethodCodeType);
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
        $this->PostCheckoutExperienceEnabled = $PostCheckoutExperienceEnabled;
        return $this;
    }
    
    /**
     * PrimaryCategory
     * @access public
     * @param CategoryType $CategoryType 
     */
    public function PrimaryCategory($CategoryType){
        $this->PrimaryCategory = $CategoryType;
        return $this;
    }
    
    /**
     * PrivateListing
     * @access public
     * @param boolean $PrivateListing 
     */
    public function PrivateListing($PrivateListing){
        $this->PrivateListing = $this->_get_boolean($PrivateListing);
        return $this;
    }
    
    /**
     * PrivateNotes
     * @access public
     * @param string $PrivateNotes 
     */
    public function PrivateNotes($PrivateNotes){
        $this->PrivateNotes = $PrivateNotes;
        return $this;
    }
    
    /**
     * ProductListingDetails
     * @access public
     * @param ProductListingDetailsType $ProductListingDetailsType 
     */
    public function ProductListingDetails($ProductListingDetailsType){
        $this->ProductListingDetails = $ProductListingDetailsType;
        return $this;
    }
    
    /**
     * Quantity
     * @access public
     * @param int $Quantity 
     */
    public function Quantity($Quantity){
        $this->Quantity = $Quantity;
        return $this;
    }
    
    /**
     * QuantityInfo
     * @access public
     * @param QuantityInfoType $QuantityInfoType 
     */
    public function QuantityInfo($QuantityInfoType){
        $this->QuantityInfo = $QuantityInfoType;
        return $this;
    }
    
    /**
     * ReturnPolicy
     * @access public
     * @param ReturnPolicyType $ReturnPolicyType 
     */
    public function ReturnPolicy($ReturnPolicyType){
        $this->ReturnPolicy = $ReturnPolicyType;
        return $this;
    }
    
    /**
     * ScheduleTime
     * @access public
     * @param dateTime $ScheduleTime 
     */
    public function ScheduleTime($ScheduleTime){
        $this->ScheduleTime = $ScheduleTime;
        return $this;
    }
    
    /**
     * SecondaryCategory
     * @access public
     * @param CategoryType $CategoryType 
     */
    public function SecondaryCategory($CategoryType){
        $this->SecondaryCategory = $CategoryType;
        return $this;
    }
    
    /**
     * SellerProfiles
     * @access public
     * @param SellerProfilesType $SellerProfilesType 
     */
    public function SellerProfiles($SellerProfilesType){
        $this->SellerProfiles = $SellerProfilesType;
        return $this;
    }
    
    /**
     * SellerProvidedTitle
     * @access public
     * @param string $SellerProvidedTitle 
     */
    public function SellerProvidedTitle($SellerProvidedTitle){
        $this->SellerProvidedTitle = $SellerProvidedTitle;
        return $this;
    }
    
    /**
     * ShippingDetails
     * @access public
     * @param ShippingDetailsType $ShippingDetailsType 
     */
    public function ShippingDetails($ShippingDetailsType){
        $this->ShippingDetails = $ShippingDetailsType;
        return $this;
    }
    
    /**
     * ShippingPackageDetails
     * @access public
     * @param ShipPackageDetailsType $ShipPackageDetailsType 
     */
    public function ShippingPackageDetails($ShipPackageDetailsType){
        $this->ShippingPackageDetails = $ShipPackageDetailsType;
        return $this;
    }
    
    /**
     * ShippingTermsInDescription
     * @access public
     * @param boolean $ShippingTermsInDescription 
     */
    public function ShippingTermsInDescription($ShippingTermsInDescription){
        $this->ShippingTermsInDescription = $ShippingTermsInDescription;
        return $this;
    }
    
    /**
     * ShipToLocations
     * @access public
     * @param string $ShipToLocations 
     */
    public function ShipToLocations($ShipToLocations){
        $this->ShipToLocations = $ShipToLocations;
        return $this;
    }
    
    /**
     * Site
     * @access public
     * @param (string)SiteCodeType $SiteCodeType 
     */
    public function Site($SiteCodeType){
        $this->Site = $SiteCodeType;
        return $this;
    }
    
    /**
     * SKU
     * @access public
     * @param string $SKU 
     */
    public function SKU($SKU){
        $this->SKU = $SKU;
        return $this;
    }
    
    /**
     * SkypeContactOption
     * @access public
     * @param (array)SkypeContactOptionCodeType $SkypeContactOptionCodeType 
     */
    public function SkypeContactOption($SkypeContactOptionCodeType){
        if(is_array($SkypeContactOptionCodeType)){
            $this->SkypeContactOption = $SkypeContactOptionCodeType;
        } else {
            $this->SkypeContactOption = array($SkypeContactOptionCodeType);
        }
        return $this;
    }
    
    /**
     * SkypeEnabled
     * @access public
     * @param boolean $SkypeEnabled 
     */
    public function SkypeEnabled($SkypeEnabled){
        $this->SkypeEnabled = $this->_get_boolean($SkypeEnabled);
        return $this;
    }
    
    /**
     * SkypeID
     * @access public
     * @param string $SkypeID 
     */
    public function SkypeID($SkypeID){
        $this->SkypeID = $SkypeID;
        return $this;
    }
    
    /**
     * StartPrice
     * @access public
     * @param double $StartPrice
     * @param (string)CurrencyCodeType  $AmountType 
     */
    public function StartPrice($StartPrice,$AmountType = 'USD'){
        $this->StartPrice = $StartPrice;
        $this->StartPrice_AmountType = $AmountType;
        return $this;
    }
    
    /**
     * Storefront
     * @access public
     * @param StorefrontType $StorefrontType 
     */
    public function Storefront($StorefrontType){
        $this->Storefront = $StorefrontType;
        return $this;
    }
    
    /**
     * SubTitle
     * @acess public
     * @param string $SubTitle 
     */
    public function SubTitle($SubTitle){
        $this->SubTitle = $SubTitle;
        return $this;
    }
    
    /**
     * TaxCategory
     * @access public
     * @param string $TaxCategory 
     */
    public function TaxCategory($TaxCategory){
        $this->TaxCategory = $TaxCategory;
        return $this;
    }
    
    /**
     * ThirdPartyCheckout
     * @access public
     * @param boolean $ThirdPartyCheckout 
     */
    public function ThirdPartyCheckout($ThirdPartyCheckout){
        $this->ThirdPartyCheckout = $this->_get_boolean($ThirdPartyCheckout);
        return $this;        
    }
    
    /**
     * ThirdPartyCheckoutIntegration
     * @access public
     * @param boolean $ThirdPartyCheckoutIntegration 
     */
    public function ThirdPartyCheckoutIntegration($ThirdPartyCheckoutIntegration){
        $this->ThirdPartyCheckoutIntegration = $this->_get_boolean($ThirdPartyCheckoutIntegration);
        return $this;
    }
    
    /**
     * Title
     * @access public
     * @param string $Title 
     */
    public function Title($Title){
        $this->Title = $Title;
        return $this;
    }
    
    /**
     * UseRecommendedProduct
     * @access public
     * @param boolean $UseRecommendedProduct 
     */
    public function UseRecommendedProduct($UseRecommendedProduct){
        $this->UseRecommendedProduct = $this->_get_boolean($UseRecommendedProduct);
        return $this;
    }
    
    /**
     * UseTaxTable
     * @access public
     * @param boolean $UseTaxTable 
     */
    public function UseTaxTable($UseTaxTable){
        $this->UseTaxTable = $this->_get_boolean($UseTaxTable);
        return $this;
    }
    
    /**
     * UUID
     * @access public
     * @param string $UUID 
     */
    public function UUID($UUID){
        $this->UUID = $UUID;
        return $this;
    }
    
    /**
     * Variations
     * @access public
     * @param VariationsType $Variations 
     */
    public function Variations($Variations){
        $this->Variations = $Variations;
        return $this;
    }
    
    /**
     * VATDetails
     * @access public
     * @param VATDetailsType $VATDetailsType 
     */
    public function VATDetails($VATDetailsType){
        $this->VATDetails = $VATDetailsType;
        return $this;
    }
    
    /**
     * VIN
     * @access public
     * @param string $VIN 
     */
    public function VIN($VIN){
        $this->VIN = $VIN;
        return $this;
    }
    
    /**
     * VRM
     * @access public
     * @param string $VRM 
     */
    public function VRM($VRM){
        $this->VRM = $VRM;
        return $this;
    }

    /**
     * Returns 1/0 for boolean check
     * @param string|boolean $field
     * @return int 
     */
    private function _get_boolean($field) {

        $boolean = '';

        if (is_bool($field)) {
            if ($field) {
                $boolean = '1';
            } else {
                $boolean = '0';
            }
        } else {
            if (strtolower($field) == 'true') {
                $boolean = '1';
            } else {
                $boolean = '0';
            }
        }

        return $boolean;
    }

}
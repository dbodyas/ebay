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
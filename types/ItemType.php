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
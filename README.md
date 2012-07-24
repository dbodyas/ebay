eBay API
========
The goal for this API is to make a reliable PHP class to communicate with the finding, shopping and trading API.

Important Note
==============
The library is still under development and at this time only the Finding API has been implemented. The documentation is a work in progress and will be updated as we move along in development.

Finding API
===========
The library uses the Call Reference found here:http://developer.ebay.com/Devzone/finding/CallRef/index.html

For both the standard input fields as well as the call-specific field, the examples below will be the same.

Initialize Library

`$ebay = new \rearley\Ebay\Finding('your_ebay_key');`

Select call reference, will mirror the call reference name in eBay's documentation

`$ebay->call_type('findItemsIneBayStores');`

Here are a few examples of setting up each option. Any other option not listed in the example but listed in the documents will follow the same syntax.

Aspect Filters

`$ebay->add_aspectFilter('Brand', array('Apple','Bacon'));`

Domain Filter

`$ebay->add_domainFilter('Other_MP3_Players');`

Item Filters

`$ebay->add_itemFilter('MinPrice', '100','Currency','USD');`


`$ebay->add_itemFilter('MaxPrice', '200','Currency','USD');`

`$ebay->add_itemFilter('FreeShippingOnly', 'true');`


To complete the call

`$results = $ebay->search();`


$results will be FALSE on any errors caused through the code. Any errors that would generate a error response from eBay will not flag an error.

`$ebay->results`

To get other errors not generated from ebay:

`$error = $ebay->error`;
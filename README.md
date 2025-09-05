[![Rate your Sample](views/Ratesample.png)][ss1][![Yes](views/Thumbup.png)][ss2][![No](views/Thumbdown.png)][ss3]

# SampleApp-CRUD-PHP

Please use this CRUD examples combined with the doc: https://intuit.github.io/QuickBooks-V3-PHP-SDK/

You will find examples with using OAuth1/OAuth2 tokens, SendEmail, get Reports, DownloadPDF, etc in the doc.

SampleApp-CRUD-PHP

<p>Welcome to the Intuit Developer's PHP Sample App for CRUD operations.</p>
<p>This sample app provides working examples of how to integrate your app with the Intuit Small Business ecosystem. Specifically, this sample app demonstrates how to:</p>

<ul>
	<li>Use the Create, Read, Query, Update, Delete, and Void entities</li>
	<li>Perform operations using the QuickBooks PHP SDK</li>
</ul>

<p>Note that while these examples work, features not called out above are not intended to be taken and used in production business applications. In other words, this is not a seed project to be taken cart blanche and deployed to your production environment.</p>  

<p>For example, certain concerns are not addressed at all in our samples (e.g., security, privacy, scalability). In our sample apps, we strive to strike a balance between clarity, maintainability, and performance where we can. However, clarity is ultimately the most important quality in a sample app.</p>

<p>Therefore there are certain instances where we might forgo a more complicated implementation (e.g., caching a frequently used value, robust error handling, more generic domain model structure) in favor of code that is easier to read. In that light, we welcome any feedback that makes our samples apps easier to learn from.</p>

## Table of Contents

* [Requirements](#requirements)
* [First Use Instructions](#first-use-instructions)
* [Running the code](#running-the-code)
* [Project Structure](#project-structure)


## Requirements

In order to successfully run this sample app you need a few things:

1. Install the PHP SDK. Refer to the instructions [here](https://developer.intuit.com/docs/0100_quickbooks_online/0400_tools/0005_accounting/0209_php/0002_install_the_php_sdk).
2. A [developer.intuit.com](http://developer.intuit.com) account.
3. An app on [developer.intuit.com](http://developer.intuit.com) and the associated app token, consumer key, and consumer secret.
4. One sandbox company, connect the company with your app and generate the OAuth tokens.

## First Use Instructions

1. Clone the GitHub repo to your computer
2. Check and update latest PHP SDK version in composer.json file  
3. Run `composer install` from project folder location in Terminal
4. If you updated composer.json, run `composer update`
5. Update OAuth 2 tokens, Client ID, Client Secret, Company ID in each PHP file

## Running the code

This app provides individual sample code for CRUD operations for various QBO entities.
Each PHP file can be run individually.

Steps described below is to run the PHP file for creating a customer.

1. Open the terminal window or command prompt and cd into the CRUD directory `/SampleApp-CRUD-PHP/CRUD/Customer`.
2. Run the command `php CustomerCreate.php`.
3. On the console you'll see the log being generated with the new customer ID.
4. Request/Response XMLs are generated in the folder you specified.

Follow similar steps for other classes.

Note: The sample code has been implemented for a company with a US locale. Certain fields may not be applicable for other locales or minor versions. Care should be taken to handle such scenarios separately.

[ss1]: #
[ss2]: https://customersurveys.intuit.com/jfe/form/SV_9LWgJBcyy3NAwHc?check=Yes&checkpoint=SampleApp-CRUD-PHP&pageUrl=github
[ss3]: https://customersurveys.intuit.com/jfe/form/SV_9LWgJBcyy3NAwHc?check=No&checkpoint=SampleApp-CRUD-PHP&pageUrl=github

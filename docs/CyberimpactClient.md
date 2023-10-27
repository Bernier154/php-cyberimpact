# bernier154\PhpCyberimpact\CyberimpactClient  







## Methods

| Name | Description |
|------|-------------|
|[DeleteMailing](#cyberimpactclientdeletemailing)|Delete a specific mailing based on its id (If it's not already sent).|
|[__construct](#cyberimpactclient__construct)|Create an instance of {CyberimpactClient}|
|[addGroup](#cyberimpactclientaddgroup)|Add a new static group in your account.|
|[addGroupsToMember](#cyberimpactclientaddgroupstomember)|Make the specified member part of the specified groups.|
|[addMember](#cyberimpactclientaddmember)|Add a new member in your account. If you need the member to confirm its subscription, it is recommended that you use optins, If you use this method in an online form, it is strongly recommended to add a CAPTCHA to it in order to avoid abuse, Warning: This method is throttled. If you wish to use it for synchronization purposes between two systems, please contact us to know how you can avoid being throttled. If you need to add multiple members at once, it is recommended that you use batches.|
|[createMailing](#cyberimpactclientcreatemailing)|Create a new mailing scheduled to be sent.|
|[createTemplate](#cyberimpactclientcreatetemplate)|Create a new template.|
|[deleteGroup](#cyberimpactclientdeletegroup)|Delete a specific group based on its id.|
|[deleteMember](#cyberimpactclientdeletemember)|Delete a specific member based on its key.|
|[deleteTemplate](#cyberimpactclientdeletetemplate)|Delete a specific template based on its id.|
|[editGroup](#cyberimpactclienteditgroup)|Modify the representation of a group by changing only the specified attributes. Unspecified attributes are left untouched. Note that editing a dynamic group is not possible from the API.|
|[editMember](#cyberimpactclienteditmember)|Modifiy the representation of a member by changing only the specified attributes. Unspecified attributes are left untouched.|
|[generateToken](#cyberimpactclientgeneratetoken)|Generate a token that will be associated to your account and be used to call this API.|
|[optInMember](#cyberimpactclientoptinmember)|Send an opt-in email to the specified email address, creating the member if not already existing and adding it to the specified list of groups, Warning: This method is throttled. If you wish to use it for synchronization purposes between two systems, please contact us to know how you can avoid being throttled, If you use this method in an online form, it is strongly recommended to add a CAPTCHA to it in order to avoid abuse.|
|[ping](#cyberimpactclientping)|Simple function to verify your connection with the API.|
|[removeAllGroupMembers](#cyberimpactclientremoveallgroupmembers)|Remove all members from a specific group.|
|[removeGroupMember](#cyberimpactclientremovegroupmember)|Remove the specified member from the specified group.|
|[replaceGroup](#cyberimpactclientreplacegroup)|Modify the representation of a group so that it become completely like specified. Unspecified attributes will be resetted to their default empty values. Note that replacing a dynamic group is not possible from the API.|
|[replaceMember](#cyberimpactclientreplacemember)|Modifiy the representation of a member so that it become completely like specified. Unspecified attributes will be resetted to their default empty values.|
|[replaceMemberGroups](#cyberimpactclientreplacemembergroups)|Replace completely the list of groups that a member is part of by the ones specified.|
|[replaceTemplate](#cyberimpactclientreplacetemplate)|Modify the representation of a template so that it become completely like specified. Unspecified attributes will be resetted to their default empty values.|
|[retrieveBouncedMembers](#cyberimpactclientretrievebouncedmembers)|Retrieve a paginated list of members for which we received a hard bounce for the last mailing we sent to them.|
|[retrieveGroup](#cyberimpactclientretrievegroup)|Retrieve a specific group based on its id.|
|[retrieveGroupMembers](#cyberimpactclientretrievegroupmembers)|retrieveGroupMembers|
|[retrieveGroups](#cyberimpactclientretrievegroups)|retrieveGroups|
|[retrieveMailing](#cyberimpactclientretrievemailing)|Retrieve a specific mailing based on its id.|
|[retrieveMailingHardBounces](#cyberimpactclientretrievemailinghardbounces)|Retrieve a paginated list of a mailing's hard bounces.|
|[retrieveMember](#cyberimpactclientretrievemember)|Retrieve a specific member based on its key.|
|[retrieveMemberConsentDetails](#cyberimpactclientretrievememberconsentdetails)|Retrieve more consent information for a specific member based on its key.|
|[retrieveMemberGroups](#cyberimpactclientretrievemembergroups)|Retrieve a paginated list of the groups that the specified member is part of.|
|[retrieveMemberMailings](#cyberimpactclientretrievemembermailings)|Retrieve a paginated list of the member's received mailings.|
|[retrieveMembers](#cyberimpactclientretrievemembers)|Retrieve a paginated list of your members, Active members are subscribed members that are part of group(s), Orphan members are subscribed members that are not part of a group.|
|[retrieveScheduledMailings](#cyberimpactclientretrievescheduledmailings)|Retrieve a paginated list of all scheduled mailings.|
|[retrieveSentMailings](#cyberimpactclientretrievesentmailings)|Retrieve a paginated list of all sent mailings.|
|[retrieveTemplate](#cyberimpactclientretrievetemplate)|Retrieve a specific template based on its id.|
|[retrieveTemplates](#cyberimpactclientretrievetemplates)|Retrieve a paginated list of the templates.|
|[retrieveUnsubscribedMember](#cyberimpactclientretrieveunsubscribedmember)|Retrieve a specific unsubscribed member based on its email.|
|[retrieveUnsubscribedMembers](#cyberimpactclientretrieveunsubscribedmembers)|Retrieve a paginated list of members for which we received a hard bounce for the last mailing we sent to them.|
|[setMemberConsent](#cyberimpactclientsetmemberconsent)|Set consent for a specific member based on its key. Be advised that some consent cannot be overridden, this method will return a 422 status code with a message when that happen.|
|[unsubscribeMember](#cyberimpactclientunsubscribemember)|Unsubscribe a member based on its key.|




### CyberimpactClient::DeleteMailing  

**Description**

```php
public DeleteMailing (int $id)
```

Delete a specific mailing based on its id (If it's not already sent). 

 

**Parameters**

* `(int) $id`
: The mailing's numerical id  

**Return Values**

`object`

> The id of the mailing and it's status.


<hr />


### CyberimpactClient::__construct  

**Description**

```php
public __construct (string $apiToken)
```

Create an instance of {CyberimpactClient} 

 

**Parameters**

* `(string) $apiToken`
: The Cyberimpact api token  

**Return Values**

`void`




<hr />


### CyberimpactClient::addGroup  

**Description**

```php
public addGroup (string $title, bool $isPublic)
```

Add a new static group in your account. 

 

**Parameters**

* `(string) $title`
: The title of the new group  
* `(bool) $isPublic`
: Should the new group be a public group or not. See our documentation for the difference between the two types: http://support.cyberimpact.com/articles/63?l=en_ca#publicvsprivategroup  

**Return Values**

`\Group`

> The newly created group


<hr />


### CyberimpactClient::addGroupsToMember  

**Description**

```php
public addGroupsToMember (string|int $key, string $groups)
```

Make the specified member part of the specified groups. 

 

**Parameters**

* `(string|int) $key`
: Can be either the member's email address or its numerical Id  
* `(string) $groups`
: A csv list of the groups that the member will become part of  

**Return Values**

`\GroupCollection`

> List of the member's subscriptions


<hr />


### CyberimpactClient::addMember  

**Description**

```php
public addMember (string $email, string $gender, string $groups, string $firstname, string $lastname, string $company, string $language, string $birthdate, string $postalCode, string $country, string $note, array $customFields)
```

Add a new member in your account. If you need the member to confirm its subscription, it is recommended that you use optins, If you use this method in an online form, it is strongly recommended to add a CAPTCHA to it in order to avoid abuse, Warning: This method is throttled. If you wish to use it for synchronization purposes between two systems, please contact us to know how you can avoid being throttled. If you need to add multiple members at once, it is recommended that you use batches. 

 

**Parameters**

* `(string) $email`
: The member's email address  
* `(string) $gender`
: The member's gender (m, f or o)  
* `(string) $groups`
: A csv list of the groups to which this new member should be subscribed  
* `(string) $firstname`
: The member's firstname  
* `(string) $lastname`
: The member's lastname  
* `(string) $company`
: The member's company  
* `(string) $language`
: The language to use for communication with this member (en_ca or fr_ca)  
* `(string) $birthdate`
: The member's birthdate in format Y-m-d  
* `(string) $postalCode`
: The member's postal code  
* `(string) $country`
: The member's ISO 3166-1 alpha-2 country code  
* `(string) $note`
: A note  
* `(array) $customFields`
: Any non-confidential data can be stored here. The key is a string containing the ID of the field  

**Return Values**

`\Member`




<hr />


### CyberimpactClient::createMailing  

**Description**

```php
public createMailing (string $subject, string $language, string $groups, string $sendAt, string $replyTo, string $fromName, string $mailFrom, string $bodyHtml, string $bodyText, bool $googleAnalytics, string $googleAnalyticsCampaign, int $updateProfileForm)
```

Create a new mailing scheduled to be sent. 

 

**Parameters**

* `(string) $subject`
: The subject of the mailing  
* `(string) $language`
: The language of the mailing (en_ca or fr_ca)  
* `(string) $groups`
: A csv list of the groups to which the mailing should be sent  
* `(string) $sendAt`
: The date and time at which the mailing should start to be sent. format: yyyy-mm-dd HH:mm:ss  
* `(string) $replyTo`
: The email address to set as a reply-to address  
* `(string) $fromName`
: The name to put as From: for the mailing  
* `(string) $mailFrom`
: The email address to put as From: for the mailing. This must be a validated sender email address in your account.  
* `(string) $bodyHtml`
: The html body of the mailing. It is required that a mailing has at least either a html or a text body. Having both is recommended  
* `(string) $bodyText`
: The text body of the mailing. It is required that a mailing has at least either a html or a text body. Having both is recommended  
* `(bool) $googleAnalytics`
: Boolean to tell if Google Analytics tracking is added to the links in the mailing  
* `(string) $googleAnalyticsCampaign`
: If Google Analytics is used, this field is used as the campaign name  
* `(int) $updateProfileForm`
: The update profile form ID used at the bottom of the mailing  

**Return Values**

`\Mailing`




<hr />


### CyberimpactClient::createTemplate  

**Description**

```php
public createTemplate (string $title, string $bodyHtml, string $bodyText)
```

Create a new template. 

 

**Parameters**

* `(string) $title`
: The title of the template  
* `(string) $bodyHtml`
: The html body of the template. It is required that a template has at least either a html or a text body. Having both is recommended  
* `(string) $bodyText`
: The text body of the template. It is required that a template has at least either a html or a text body. Having both is recommended  

**Return Values**

`\Template`




<hr />


### CyberimpactClient::deleteGroup  

**Description**

```php
public deleteGroup (int $id)
```

Delete a specific group based on its id. 

 

**Parameters**

* `(int) $id`
: The group's numerical id  

**Return Values**

`object`

> The id of the group and it's status.


<hr />


### CyberimpactClient::deleteMember  

**Description**

```php
public deleteMember (string|int $key)
```

Delete a specific member based on its key. 

 

**Parameters**

* `(string|int) $key`
: Can be either the member's email address or its numerical Id  

**Return Values**

`void`




<hr />


### CyberimpactClient::deleteTemplate  

**Description**

```php
public deleteTemplate (int $id)
```

Delete a specific template based on its id. 

 

**Parameters**

* `(int) $id`
: The template's numerical id  

**Return Values**

`object`

> The id of the template and it's status.


<hr />


### CyberimpactClient::editGroup  

**Description**

```php
public editGroup (string $title, bool $isPublic)
```

Modify the representation of a group by changing only the specified attributes. Unspecified attributes are left untouched. Note that editing a dynamic group is not possible from the API. 

 

**Parameters**

* `(string) $title`
: The title of the group  
* `(bool) $isPublic`
: Should the group be a public group or not. See our documentation for the difference between the two types: http://support.cyberimpact.com/articles/63?l=en_ca#publicvsprivategroup  

**Return Values**

`\Group`

> The modified group


<hr />


### CyberimpactClient::editMember  

**Description**

```php
public editMember (string|int $key, string $email, string $gender, string $groups, string $firstname, string $lastname, string $company, string $language, string $birthdate, string $postalCode, string $country, string $note, array $customFields)
```

Modifiy the representation of a member by changing only the specified attributes. Unspecified attributes are left untouched. 

 

**Parameters**

* `(string|int) $key`
: Can be either the member's email address or its numerical Id  
* `(string) $email`
: The member's email address  
* `(string) $gender`
: The member's gender (m, f or o)  
* `(string) $groups`
: A csv list of the groups to which this new member should be subscribed  
* `(string) $firstname`
: The member's firstname  
* `(string) $lastname`
: The member's lastname  
* `(string) $company`
: The member's company  
* `(string) $language`
: The language to use for communication with this member (en_ca or fr_ca)  
* `(string) $birthdate`
: The member's birthdate in format Y-m-d  
* `(string) $postalCode`
: The member's postal code  
* `(string) $country`
: The member's ISO 3166-1 alpha-2 country code  
* `(string) $note`
: A note  
* `(array) $customFields`
: Any non-confidential data can be stored here. The key is a string containing the ID of the field  

**Return Values**

`\Member`




<hr />


### CyberimpactClient::generateToken  

**Description**

```php
public generateToken (void)
```

Generate a token that will be associated to your account and be used to call this API. 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Token`




<hr />


### CyberimpactClient::optInMember  

**Description**

```php
public optInMember (string $email, string $gender, string $groups, string $firstname, string $lastname, string $company, string $language, string $birthdate, string $postalCode, string $country, string $note, string $optinConfirmUrl, array $customFields)
```

Send an opt-in email to the specified email address, creating the member if not already existing and adding it to the specified list of groups, Warning: This method is throttled. If you wish to use it for synchronization purposes between two systems, please contact us to know how you can avoid being throttled, If you use this method in an online form, it is strongly recommended to add a CAPTCHA to it in order to avoid abuse. 

 

**Parameters**

* `(string) $email`
: The member's email address  
* `(string) $gender`
: The member's gender (m, f or o)  
* `(string) $groups`
: A csv list of the groups to which this new member should be subscribed  
* `(string) $firstname`
: The member's firstname  
* `(string) $lastname`
: The member's lastname  
* `(string) $company`
: The member's company  
* `(string) $language`
: The language to use for communication with this member (en_ca or fr_ca)  
* `(string) $birthdate`
: The member's birthdate in format Y-m-d  
* `(string) $postalCode`
: The member's postal code  
* `(string) $country`
: The member's ISO 3166-1 alpha-2 country code  
* `(string) $note`
: A note  
* `(string) $optinConfirmUrl`
: URL that will be used as the opt-in confirmation page (format: http://www.example.com)  
* `(array) $customFields`
: Any non-confidential data can be stored here. The key is a string containing the ID of the field  

**Return Values**

`object`

> The id of the Opt-in request and it's status.


<hr />


### CyberimpactClient::ping  

**Description**

```php
public ping (void)
```

Simple function to verify your connection with the API. 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Ping`




<hr />


### CyberimpactClient::removeAllGroupMembers  

**Description**

```php
public removeAllGroupMembers (int $id)
```

Remove all members from a specific group. 

 

**Parameters**

* `(int) $id`
: The group's numerical id  

**Return Values**

`object`

> An object containing a prop [members] contiaining ids


<hr />


### CyberimpactClient::removeGroupMember  

**Description**

```php
public removeGroupMember (string|int $key, int $groupId)
```

Remove the specified member from the specified group. 

 

**Parameters**

* `(string|int) $key`
: Can be either the member's email address or its numerical Id  
* `(int) $groupId`
: Numerical Id of the group to remove from the member's groups list  

**Return Values**

`object`

> Status of the subscription to the specified group.


<hr />


### CyberimpactClient::replaceGroup  

**Description**

```php
public replaceGroup (string $title, bool $isPublic)
```

Modify the representation of a group so that it become completely like specified. Unspecified attributes will be resetted to their default empty values. Note that replacing a dynamic group is not possible from the API. 

 

**Parameters**

* `(string) $title`
: The title of the group  
* `(bool) $isPublic`
: Should the group be a public group or not. See our documentation for the difference between the two types: http://support.cyberimpact.com/articles/63?l=en_ca#publicvsprivategroup  

**Return Values**

`\Group`

> The modified group


<hr />


### CyberimpactClient::replaceMember  

**Description**

```php
public replaceMember (string|int $key, string $email, string $gender, string $groups, string $firstname, string $lastname, string $company, string $language, string $birthdate, string $postalCode, string $country, string $note, array $customFields)
```

Modifiy the representation of a member so that it become completely like specified. Unspecified attributes will be resetted to their default empty values. 

 

**Parameters**

* `(string|int) $key`
: Can be either the member's email address or its numerical Id  
* `(string) $email`
: The member's email address  
* `(string) $gender`
: The member's gender (m, f or o)  
* `(string) $groups`
: A csv list of the groups to which this new member should be subscribed  
* `(string) $firstname`
: The member's firstname  
* `(string) $lastname`
: The member's lastname  
* `(string) $company`
: The member's company  
* `(string) $language`
: The language to use for communication with this member (en_ca or fr_ca)  
* `(string) $birthdate`
: The member's birthdate in format Y-m-d  
* `(string) $postalCode`
: The member's postal code  
* `(string) $country`
: The member's ISO 3166-1 alpha-2 country code  
* `(string) $note`
: A note  
* `(array) $customFields`
: Any non-confidential data can be stored here. The key is a string containing the ID of the field  

**Return Values**

`\Member`




<hr />


### CyberimpactClient::replaceMemberGroups  

**Description**

```php
public replaceMemberGroups (string|int $key, string $groups)
```

Replace completely the list of groups that a member is part of by the ones specified. 

 

**Parameters**

* `(string|int) $key`
: Can be either the member's email address or its numerical Id  
* `(string) $groups`
: A csv list of the groups that the member will become part of  

**Return Values**

`\GroupCollection`

> List of the member's groups


<hr />


### CyberimpactClient::replaceTemplate  

**Description**

```php
public replaceTemplate (int $id, string $title, string $bodyHtml, string $bodyText)
```

Modify the representation of a template so that it become completely like specified. Unspecified attributes will be resetted to their default empty values. 

 

**Parameters**

* `(int) $id`
: The template's numerical Id  
* `(string) $title`
: The title of the template  
* `(string) $bodyHtml`
: The html body of the template. It is required that a template has at least either a html or a text body. Having both is recommended  
* `(string) $bodyText`
: The text body of the template. It is required that a template has at least either a html or a text body. Having both is recommended  

**Return Values**

`\Template`




<hr />


### CyberimpactClient::retrieveBouncedMembers  

**Description**

```php
public retrieveBouncedMembers (int $page, int $limit, string $sort, string $joinedOnFrom, string $bouncedOnFrom, string $bouncedOnTo, string $updatedOnFrom, string $updatedOnTo)
```

Retrieve a paginated list of members for which we received a hard bounce for the last mailing we sent to them. 

 

**Parameters**

* `(int) $page`
: The page of results to view.  
* `(int) $limit`
: The amount of results per page (max: 10 000)  
* `(string) $sort`
: In which order should the results be returned.  
Possible values: email_asc , email_desc , language_asc , language_desc , fullname_asc , fullname_desc , date_asc , date_desc , consent_type_asc , consent_type_desc , consent_date_asc , consent_date_desc , updated_asc , updated_desc .  
* `(string) $joinedOnFrom`
: Date (start of the day) from which members have been added in the account (format: yyyy-mm-dd)  
* `(string) $bouncedOnFrom`
: Date (start of the day) from which members have bounced (format: yyyy-mm-dd)  
* `(string) $bouncedOnTo`
: Date (end of the day) to which members have bounced (format: yyyy-mm-dd)  
* `(string) $updatedOnFrom`
: Date (start of the day) from which members have been last updated in the account (format: yyyy-mm-dd)  
* `(string) $updatedOnTo`
: Date (end of the day) to which members have been last updated in the account (format: yyyy-mm-dd)  

**Return Values**

`\MemberCollection`




<hr />


### CyberimpactClient::retrieveGroup  

**Description**

```php
public retrieveGroup (int $id)
```

Retrieve a specific group based on its id. 

 

**Parameters**

* `(int) $id`
: The group numerical id  

**Return Values**

`?\Group`

> null if not found


<hr />


### CyberimpactClient::retrieveGroupMembers  

**Description**

```php
public retrieveGroupMembers (int $id, int $page, int $limit, string $sort, string $joinedOnFrom, string $joinedOnTo, string $updatedOnFrom, string $updatedOnTo)
```

retrieveGroupMembers 

 

**Parameters**

* `(int) $id`
: The group's numerical Id  
* `(int) $page`
: The page of results to view.  
* `(int) $limit`
: he amount of results per page (max: 10 000)  
* `(string) $sort`
: In which order should the results be returned.  
Possible values: email_asc , email_desc , language_asc , language_desc , fullname_asc , fullname_desc , date_asc , date_desc , consent_type_asc , consent_type_desc , consent_date_asc , consent_date_desc , updated_asc , updated_desc .  
* `(string) $joinedOnFrom`
: Date (start of the day) from which members have been added in the account (format: yyyy-mm-dd)  
* `(string) $joinedOnTo`
: Date (end of the day) to which members have been added in the account (format: yyyy-mm-dd)  
* `(string) $updatedOnFrom`
: Date (start of the day) from which members have been last updated in the account (format: yyyy-mm-dd)  
* `(string) $updatedOnTo`
: Date (end of the day) to which members have been last updated in the account (format: yyyy-mm-dd)  

**Return Values**

`void`




<hr />


### CyberimpactClient::retrieveGroups  

**Description**

```php
public retrieveGroups (int $page, int $limit, string $sort)
```

retrieveGroups 

 

**Parameters**

* `(int) $page`
: The page of results to view  
* `(int) $limit`
: The amount of results per page (max: 10 000)  
* `(string) $sort`
: In which order should the results be returned.  
Possible values: group_asc , group_desc , nbmember_asc , nbmember_desc , type_asc , type_desc , nbnewsletter_asc , nbnewsletter_desc , date_asc , date_desc .  

**Return Values**

`void`




<hr />


### CyberimpactClient::retrieveMailing  

**Description**

```php
public retrieveMailing (int $id)
```

Retrieve a specific mailing based on its id. 

 

**Parameters**

* `(int) $id`
: The mailing's numerical id  

**Return Values**

`\Mailing`




<hr />


### CyberimpactClient::retrieveMailingHardBounces  

**Description**

```php
public retrieveMailingHardBounces (int $id, int $page, int $limit, string $sort)
```

Retrieve a paginated list of a mailing's hard bounces. 

 

**Parameters**

* `(int) $id`
: The mailing's numerical id  
* `(int) $page`
: The page of results to view  
* `(int) $limit`
: The amount of results per page (max: 10 000)  
* `(string) $sort`
: In which order should the results be returned  
Possible values: email_asc, email_desc, language_asc, language_desc, fullname_asc, fullname_desc, date_asc, date_desc  

**Return Values**

`\MemberCollection`




<hr />


### CyberimpactClient::retrieveMember  

**Description**

```php
public retrieveMember (string|int $key)
```

Retrieve a specific member based on its key. 

 

**Parameters**

* `(string|int) $key`
: Can be either the member's email address or its numerical Id  

**Return Values**

`?\Member`




<hr />


### CyberimpactClient::retrieveMemberConsentDetails  

**Description**

```php
public retrieveMemberConsentDetails (string|int $key)
```

Retrieve more consent information for a specific member based on its key. 

 

**Parameters**

* `(string|int) $key`
: Can be either the member's email address or its numerical Id  

**Return Values**

`\ConsentDetails`




<hr />


### CyberimpactClient::retrieveMemberGroups  

**Description**

```php
public retrieveMemberGroups (int|string $key, int $page, int $limit, string $sort)
```

Retrieve a paginated list of the groups that the specified member is part of. 

 

**Parameters**

* `(int|string) $key`
: Can be either the member's email address or its numerical Id  
* `(int) $page`
: The page of results to view  
* `(int) $limit`
: The amount of results per page (max: 10 000)  
* `(string) $sort`
: In which order should the results be returned.  
Possible values: title_asc , title_desc , created_asc , created_desc .  

**Return Values**

`\GroupCollection`




<hr />


### CyberimpactClient::retrieveMemberMailings  

**Description**

```php
public retrieveMemberMailings (int|string $key, int $page, int $limit, string $sort)
```

Retrieve a paginated list of the member's received mailings. 

 

**Parameters**

* `(int|string) $key`
: Can be either the member's email address or its numerical Id  
* `(int) $page`
: The page of results to view  
* `(int) $limit`
: The amount of results per page (max: 10 000)  
* `(string) $sort`
: In which order should the results be returned.  
Possible values: date_sent_asc , date_sent_desc , date_opened_asc , date_opened_desc .  

**Return Values**

`\MailingCollection`




<hr />


### CyberimpactClient::retrieveMembers  

**Description**

```php
public retrieveMembers (int $page, int $limit, string $status, string $sort, string $joinedOnFrom, string $joinedOnTo, string $updatedOnFrom, string $updatedOnTo)
```

Retrieve a paginated list of your members, Active members are subscribed members that are part of group(s), Orphan members are subscribed members that are not part of a group. 

 

**Parameters**

* `(int) $page`
: The page of results to view.  
* `(int) $limit`
: The amount of results per page (max: 10 000)  
* `(string) $status`
: The status of the member in your account.  
Possible values: active , orphans , all .  
* `(string) $sort`
: In which order should the results be returned.  
Possible values: email_asc , email_desc , language_asc , language_desc , fullname_asc , fullname_desc , date_asc , date_desc , consent_type_asc , consent_type_desc , consent_date_asc , consent_date_desc , updated_asc , updated_desc .  
* `(string) $joinedOnFrom`
: Date (start of the day) from which members have been added in the account (format: yyyy-mm-dd)  
* `(string) $joinedOnTo`
: Date (end of the day) to which members have been added in the account (format: yyyy-mm-dd)  
* `(string) $updatedOnFrom`
: Date (start of the day) from which members have been last updated in the account (format: yyyy-mm-dd)  
* `(string) $updatedOnTo`
: Date (end of the day) to which members have been last updated in the account (format: yyyy-mm-dd)  

**Return Values**

`\MemberCollection`




<hr />


### CyberimpactClient::retrieveScheduledMailings  

**Description**

```php
public retrieveScheduledMailings (int $page, int $limit, string $sort)
```

Retrieve a paginated list of all scheduled mailings. 

 

**Parameters**

* `(int) $page`
: The page of results to view  
* `(int) $limit`
: The amount of results per page (max: 10 000)  
* `(string) $sort`
: In which order should the results be returned.  
Possible values: language_asc , language_desc , subject_asc , subject_desc , recipients_asc , recipients_desc , date_asc , date_desc .  

**Return Values**

`\MailingCollection`




<hr />


### CyberimpactClient::retrieveSentMailings  

**Description**

```php
public retrieveSentMailings (int $page, int $limit, string $sort)
```

Retrieve a paginated list of all sent mailings. 

 

**Parameters**

* `(int) $page`
: The page of results to view  
* `(int) $limit`
: The amount of results per page (max: 10 000)  
* `(string) $sort`
: In which order should the results be returned.  
Possible values: language_asc , language_desc , subject_asc , subject_desc , recipients_asc , recipients_desc , date_asc , date_desc .  

**Return Values**

`\MailingCollection`




<hr />


### CyberimpactClient::retrieveTemplate  

**Description**

```php
public retrieveTemplate (int $id)
```

Retrieve a specific template based on its id. 

 

**Parameters**

* `(int) $id`
: The template's numerical id  

**Return Values**

`\Template`




<hr />


### CyberimpactClient::retrieveTemplates  

**Description**

```php
public retrieveTemplates (int $page, int $limit, string $sort)
```

Retrieve a paginated list of the templates. 

 

**Parameters**

* `(int) $page`
: The page of results to view  
* `(int) $limit`
: The amount of results per page (max: 10 000)  
* `(string) $sort`
: In which order should the results be returned  
Possible values: template_asc , template_desc , language_asc , language_desc , subject_asc , subject_desc , updated_asc , updated_desc , usage_asc , usage_desc , created_asc , created_desc .  

**Return Values**

`\TemplateCollection`




<hr />


### CyberimpactClient::retrieveUnsubscribedMember  

**Description**

```php
public retrieveUnsubscribedMember (string $email)
```

Retrieve a specific unsubscribed member based on its email. 

 

**Parameters**

* `(string) $email`
: The unsubscribed member's email address  

**Return Values**

`?\Member`




<hr />


### CyberimpactClient::retrieveUnsubscribedMembers  

**Description**

```php
public retrieveUnsubscribedMembers (int $page, int $limit, string $sort, string $joinedOnFrom, string $unsubscribedOnFrom, string $unsubscribedOnTo, string $updatedOnFrom, string $updatedOnTo)
```

Retrieve a paginated list of members for which we received a hard bounce for the last mailing we sent to them. 

 

**Parameters**

* `(int) $page`
: The page of results to view.  
* `(int) $limit`
: The amount of results per page (max: 10 000)  
* `(string) $sort`
: In which order should the results be returned.  
Possible values: email_asc , email_desc , language_asc , language_desc , fullname_asc , fullname_desc , date_asc , date_desc , consent_type_asc , consent_type_desc , consent_date_asc , consent_date_desc , updated_asc , updated_desc .  
* `(string) $joinedOnFrom`
: Date (start of the day) from which members have been added in the account (format: yyyy-mm-dd)  
* `(string) $unsubscribedOnFrom`
: Date (start of the day) from which members have unsubscribed (format: yyyy-mm-dd)  
* `(string) $unsubscribedOnTo`
: Date (end of the day) to which members have unsubscribed (format: yyyy-mm-dd)  
* `(string) $updatedOnFrom`
: Date (start of the day) from which members have been last updated in the account (format: yyyy-mm-dd)  
* `(string) $updatedOnTo`
: Date (end of the day) to which members have been last updated in the account (format: yyyy-mm-dd)  

**Return Values**

`\MemberCollection`




<hr />


### CyberimpactClient::setMemberConsent  

**Description**

```php
public setMemberConsent (string|int $key, string $relationType, string $consentDate, string $consentProof)
```

Set consent for a specific member based on its key. Be advised that some consent cannot be overridden, this method will return a 422 status code with a message when that happen. 

 

**Parameters**

* `(string|int) $key`
: Can be either the member's email address or its numerical Id  
* `(string) $relationType`
: The relation type for the consent.  
Accepted values: express-consent, active-clients, information-request, business-card, web-contacts, purchased-list, contest-participants, mixed-list, association-members, employees, partners, inactive-clients  
* `(string) $consentDate`
: Date the consent was obtained in format Y-m-d (can also be null)  
* `(string) $consentProof`
: The consent proof description  

**Return Values**

`\ConsentDetails`




<hr />


### CyberimpactClient::unsubscribeMember  

**Description**

```php
public unsubscribeMember (string|int $key)
```

Unsubscribe a member based on its key. 

 

**Parameters**

* `(string|int) $key`
: Can be either the member's email address or its numerical Id  

**Return Values**

`\Member`




<hr />


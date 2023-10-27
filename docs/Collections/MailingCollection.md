# bernier154\PhpCyberimpact\Collections\MailingCollection  

Paginated list of maillings.





## Methods

| Name | Description |
|------|-------------|
|[__construct](#mailingcollection__construct)|Returns a paginated list of maillings.|
|[fromJSON](#mailingcollectionfromjson)|Create a MailingCollection from the return value of the API.|




### MailingCollection::__construct  

**Description**

```php
public __construct (\Mailling[] $maillings, int $totalCount, int $page, int $limit, string $sort)
```

Returns a paginated list of maillings. 

 

**Parameters**

* `(\Mailling[]) $maillings`
: Array of mailling  
* `(int) $totalCount`
: Total count of mailings  
* `(int) $page`
: The page of results to view  
* `(int) $limit`
: The amount of results per page (max: 10 000)  
* `(string) $sort`
: $sort In which order should the results be returned.  
Possible values: date_sent_asc , date_sent_desc , date_opened_asc , date_opened_desc .  

**Return Values**

`void`




<hr />


### MailingCollection::fromJSON  

**Description**

```php
public static fromJSON (object $json)
```

Create a MailingCollection from the return value of the API. 

 

**Parameters**

* `(object) $json`

**Return Values**

`\MailingCollection`




<hr />


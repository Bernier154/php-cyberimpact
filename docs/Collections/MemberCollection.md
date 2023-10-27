# bernier154\PhpCyberimpact\Collections\MemberCollection  

Paginated list of groups.





## Methods

| Name | Description |
|------|-------------|
|[__construct](#membercollection__construct)|Returns a paginated list of members.|
|[fromJSON](#membercollectionfromjson)|Create a MemberCollection from the return value of the API.|




### MemberCollection::__construct  

**Description**

```php
public __construct (\Member[] $members, int $totalCount, int $page, int $limit, string $sort)
```

Returns a paginated list of members. 

 

**Parameters**

* `(\Member[]) $members`
: Array of members  
* `(int) $totalCount`
: Total count of members  
* `(int) $page`
: The page of results to view  
* `(int) $limit`
: The amount of results per page (max: 10 000)  
* `(string) $sort`
: $sort In which order should the results be returned.  
Possible values: group_asc , group_desc , nbmember_asc , nbmember_desc , type_asc , type_desc , nbnewsletter_asc , nbnewsletter_desc , date_asc , date_desc .  

**Return Values**

`void`




<hr />


### MemberCollection::fromJSON  

**Description**

```php
public static fromJSON (object $json)
```

Create a MemberCollection from the return value of the API. 

 

**Parameters**

* `(object) $json`

**Return Values**

`\MemberCollection`




<hr />


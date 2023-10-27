# bernier154\PhpCyberimpact\Collections\TemplateCollection  

Paginated list of groups.





## Methods

| Name | Description |
|------|-------------|
|[__construct](#templatecollection__construct)|Returns a paginated list of templates.|
|[fromJSON](#templatecollectionfromjson)|Create a TemplateCollection from the return value of the API.|




### TemplateCollection::__construct  

**Description**

```php
public __construct (\Template[] $templates, int $totalCount, int $page, int $limit, string $sort)
```

Returns a paginated list of templates. 

 

**Parameters**

* `(\Template[]) $templates`
: Array of templates  
* `(int) $totalCount`
: Total count of templates  
* `(int) $page`
: The page of results to view  
* `(int) $limit`
: The amount of results per page (max: 10 000)  
* `(string) $sort`
: $sort In which order should the results be returned.  
Possible values: template_asc , template_desc , language_asc , language_desc , subject_asc , subject_desc , updated_asc , updated_desc , usage_asc , usage_desc , created_asc , created_desc .  

**Return Values**

`void`




<hr />


### TemplateCollection::fromJSON  

**Description**

```php
public static fromJSON (object $json)
```

Create a TemplateCollection from the return value of the API. 

 

**Parameters**

* `(object) $json`

**Return Values**

`\TemplateCollection`




<hr />


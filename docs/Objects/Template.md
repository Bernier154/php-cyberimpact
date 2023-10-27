# bernier154\PhpCyberimpact\Objects\Template  

Template





## Methods

| Name | Description |
|------|-------------|
|[__construct](#template__construct)|Return an instance of Template|
|[fromJSON](#templatefromjson)|Create a Template from the return value of the API.|




### Template::__construct  

**Description**

```php
public __construct (int $id, string $title, string $createdOn, string $updatedOn, string $bodyHtml, string $bodyText)
```

Return an instance of Template 

 

**Parameters**

* `(int) $id`
* `(string) $title`
* `(string) $createdOn`
* `(string) $updatedOn`
* `(string) $bodyHtml`
* `(string) $bodyText`

**Return Values**

`void`




<hr />


### Template::fromJSON  

**Description**

```php
public static fromJSON (object $json)
```

Create a Template from the return value of the API. 

 

**Parameters**

* `(object) $json`

**Return Values**

`\Template`




<hr />


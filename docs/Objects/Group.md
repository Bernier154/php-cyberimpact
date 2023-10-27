# bernier154\PhpCyberimpact\Objects\Group  

Groups are collection of member. Members can have multiple groups.





## Methods

| Name | Description |
|------|-------------|
|[__construct](#group__construct)|Return an instance of Group|
|[fromJSON](#groupfromjson)|Create a Group from the return value of the API.|




### Group::__construct  

**Description**

```php
public __construct (int $id, string $title, bool $isPublic, int $membersCount, int $mailingsCount, string $createdOn, bool $isDynamic)
```

Return an instance of Group 

 

**Parameters**

* `(int) $id`
: The id of the group  
* `(string) $title`
: The title of the group  
* `(bool) $isPublic`
: Should the group be a public group or not. See our documentation for the difference between the two types: http://support.cyberimpact.com/articles/63?l=en_ca#publicvsprivategroup  
* `(int) $membersCount`
: The number of member in the group.  
* `(int) $mailingsCount`
: The number of mailing related to that group  
* `(string) $createdOn`
: The date of creation of the group  
* `(bool) $isDynamic`
: if the group is dynamic  

**Return Values**

`void`




<hr />


### Group::fromJSON  

**Description**

```php
public static fromJSON (object $json)
```

Create a Group from the return value of the API. 

 

**Parameters**

* `(object) $json`

**Return Values**

`\Group`




<hr />


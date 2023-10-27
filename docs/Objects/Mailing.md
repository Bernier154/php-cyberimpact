# bernier154\PhpCyberimpact\Objects\Mailing  

Mailing





## Methods

| Name | Description |
|------|-------------|
|[__construct](#mailing__construct)|Return an instance of Mailing|
|[fromJSON](#mailingfromjson)|Create a Mailing from the return value of the API.|




### Mailing::__construct  

**Description**

```php
public __construct (int $id, string $subject, string $language, string $startedOn, string $sentOn, bool $opened, string $openedOn)
```

Return an instance of Mailing 

 

**Parameters**

* `(int) $id`
* `(string) $subject`
* `(string) $language`
* `(string) $startedOn`
* `(string) $sentOn`
* `(bool) $opened`
* `(string) $openedOn`

**Return Values**

`void`




<hr />


### Mailing::fromJSON  

**Description**

```php
public static fromJSON (object $json)
```

Create a Mailing from the return value of the API. 

 

**Parameters**

* `(object) $json`

**Return Values**

`\Mailing`




<hr />


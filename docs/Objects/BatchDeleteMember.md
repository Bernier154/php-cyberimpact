# bernier154\PhpCyberimpact\Objects\BatchDeleteMember  

BatchDeleteMember





## Methods

| Name | Description |
|------|-------------|
|[__construct](#batchdeletemember__construct)|Create an instance of BatchDeleteMember|
|[fromJSON](#batchdeletememberfromjson)||




### BatchDeleteMember::__construct  

**Description**

```php
public __construct (int $id, string $batchType, object $batchJson, string $createdOn, string $status, object $result, array $successes)
```

Create an instance of BatchDeleteMember 

 

**Parameters**

* `(int) $id`
: the id of the batch  
* `(string) $batchType`
: The type of the batch  
* `(object) $batchJson`
: The original batch data  
* `(string) $createdOn`
: The date where the batch was created  
* `(string) $status`
: The status of the batch  
* `(object) $result`
: An array of details about the result of the batch  
* `(array) $successes`
: an array of id of succesful addition  

**Return Values**

`void`




<hr />


### BatchDeleteMember::fromJSON  

**Description**

```php
 fromJSON (void)
```

 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`void`


<hr />


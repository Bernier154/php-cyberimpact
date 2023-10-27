# bernier154\PhpCyberimpact\Objects\BatchUnsubscribe  

BatchUnsubscribe





## Methods

| Name | Description |
|------|-------------|
|[__construct](#batchunsubscribe__construct)|Create an instance of BatchUnsubscribe|
|[fromJSON](#batchunsubscribefromjson)||




### BatchUnsubscribe::__construct  

**Description**

```php
public __construct (int $id, string $batchType, object $batchJson, string $createdOn, string $status, object $result, array $successes)
```

Create an instance of BatchUnsubscribe 

 

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


### BatchUnsubscribe::fromJSON  

**Description**

```php
 fromJSON (void)
```

 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`void`


<hr />


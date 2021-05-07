# Fgsl Filter

* Fgsl\Filter\FourOperations

This class allows to make arithmetic operations.

Example: to make doubles

```php
use Fgsl\Filter\FourOperations;

$filter = new FourOperations(['operation'=>'mul','value'=>2]);
$value = $filter->filter(24);
// $value is equal to 48

```
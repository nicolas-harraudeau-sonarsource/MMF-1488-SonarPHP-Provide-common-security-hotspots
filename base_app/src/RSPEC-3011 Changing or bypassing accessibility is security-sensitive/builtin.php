<?php

// http://php.net/manual/en/book.reflection.php
// http://php.net/manual/en/language.oop5.overloading.php
// http://php.net/manual/en/language.oop5.visibility.php

class MyClass
{
    public static $publicstatic = 'Static';
    private static $privatestatic = 'private Static';
    private $private = 'Private';
    private const CONST_PRIVATE = 'Private CONST';
    public $myfield = 42;

    private function __construct() {
        $this->myfield = 21;
    }
    
    private function privateMethod()
    {}

    public function __set($property, $value)
    {
        if ($property == 'private' && preg_match_all('/^a+$/', $value) == 0) {
            throw new Exception('Invalid value');
        }
        $this->$property = $value . 'test';
    }

    public function __get($property)
    {
        if ($property == 'private') {
            throw new Exception('Unauthorized access');
        }
        return $this->$property;
    }
}


$clazz = new ReflectionClass('MyClass');
$clazz->setStaticPropertyValue('publicstatic', '42'); // OK as there is no overloading to bypass and it respects access control.
$clazz->getStaticPropertyValue('publicstatic'); // OK as there is no overloading to bypass and it respects access control. 

$clazz->getstaticProperties(); // Questionable. This gives access to private static properties

$clazz->getConstant('CONST_PRIVATE'); // Questionable. This can access private or protected constants.
$clazz->getConstants(); // Questionable. This can access private or protected constants.
$clazz->getReflectionConstant('CONST_PRIVATE'); // Questionable. This can access private or protected constants.
$clazz->getReflectionConstants(); // Questionable. This can access private or protected constants.

$obj = $clazz->newInstanceWithoutConstructor(); // Questionable. Bypassing private constructor.

$constructor = $clazz->getConstructor();
$constructorClosure = $constructor->getClosure($obj); // Questionable. It is possible to call private methods with closures.
$constructorClosure->call($obj);
$constructor->setAccessible(true); // Questionable. Bypassing constructor accessibility.
$constructor->invoke($obj);

$prop = new ReflectionProperty('MyClass', 'private');
$prop->setAccessible(true); // Questionable. Change accessibility of a property.
$prop->setValue($obj, "newValue"); // Questionable. Bypass of the __set method.
$prop->getValue($obj); // Questionable. Bypass of the __get method.

$prop2 = $clazz->getProperties()[2];
$prop2->setAccessible(true); // Questionable. Change accessibility of a property.
$prop2->setValue($obj, "newValue"); // Questionable. Bypass of the __set method.
$prop2->getValue($obj); // Questionable. Bypass of the __get method.

$meth = new ReflectionMethod('MyClass', 'privateMethod');
$clos = $meth->getClosure($obj); // Questionable. It is possible to call private methods with closures.
$clos->call($obj);
$meth->setAccessible(true); // Questionable. Change accessibility of a method.
$meth->invoke($obj);

$meth2 = $clazz->getMethods()[0];
$clos2 = $meth2->getClosure($obj); // Questionable. It is possible to call private methods with closures.
$clos2->call($obj);
$meth2->setAccessible(true); // Questionable. Change accessibility of a method.
$meth2->invoke($obj);


// Using a ReflectionObject instead of the class

$objr = new ReflectionObject($obj);
$objr->newInstanceWithoutConstructor(); // Questionable. Bypassing private constructor.

$objr->getStaticPropertyValue("publicstatic"); // OK as there is no overloading to bypass and it respects access control.
$objr->setStaticPropertyValue("publicstatic", "newValue"); // OK as there is no overloading to bypass and it respects access control.

$objr->getStaticProperties(); // Questionable. This gives access to private static properties

$objr->getConstant('CONST_PRIVATE'); // Questionable. This can access private or protected constants.
$objr->getConstants(); // Questionable. This can access private or protected constants.
$objr->getReflectionConstant('CONST_PRIVATE'); // Questionable. This can access private or protected constants.
$objr->getReflectionConstants(); // Questionable. This can access private or protected constants.

$constructor = $objr->getConstructor();
$constructorClosure = $constructor->getClosure($obj); // Questionable. It is possible to call private methods with closures.
$constructorClosure->call($obj);
$constructor->setAccessible(true); // Questionable. Bypassing constructor accessibility.
$constructor->invoke($obj);

$prop3 = $objr->getProperty('private');
$prop3->setAccessible(true); // Questionable. Change accessibility of a property.
$prop3->setValue($obj, "newValue"); // Questionable. Bypass of the __set method.
$prop3->getValue($obj); // Questionable. Bypass of the __get method.

$prop4 = $objr->getProperties()[2];
$prop4->setAccessible(true); // Questionable. Change accessibility of a property.
$prop4->setValue($obj, "newValue"); // Questionable. Bypass of the __set method.
$prop4->getValue($obj); // Questionable. Bypass of the __get method.

$meth3 = $objr->getMethod('privateMethod');
$clos3 = $meth3->getClosure($obj); // Questionable. It is possible to call private methods with closures.
$clos3->call($obj);
$meth3->setAccessible(true); // Questionable. Change accessibility of a method.
$meth3->invoke($obj);

$meth4 = $objr->getMethods()[0];
$clos4 = $meth4->getClosure($obj); // Questionable. It is possible to call private methods with closures.
$clos4->call($obj);
$meth4->setAccessible(true); // Questionable. Change accessibility of a method.
$meth4->invoke($obj);


<?php 

$objects = array('Foo', 'Bar');
    
class Foo {
    protected $_name = 'Foo';
    public function getName() {
        return $this->_name;
    }
}

class Bar extends Foo{
    protected $_name = 'Bar';
    public function getName() {
        parent::getName();
        
        return $this->_name;
    }
}

$Foo = new Foo();
$Bar = new Bar();

natsort($objects);

foreach ($objects as $object) {
    echo $$object->getName() . " ";
    break;
}

?>






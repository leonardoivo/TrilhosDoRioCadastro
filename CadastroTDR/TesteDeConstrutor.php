<?php

class Animal
{
    public function __construct()
    {
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();

        if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
        echo('Vazio');
    }
   
    public function __construct1($a1)
    {
        echo('__construct with 1 param called: '.$a1.PHP_EOL.'<br/>');
    }
   
    public function __construct2($a1, $a2)
    {
        echo('__construct with 2 params called: '.$a1.','.$a2.PHP_EOL).'<br/>';
    }
   
    public function __construct3($a1, $a2, $a3)
    {
        echo('__construct with 3 params called: '.$a1.','.$a2.','.$a3.PHP_EOL.'<br/>');
    }
}
$o= new Animal();
$o = new Animal('sheep');
$o = new Animal('sheep','cat');
$o = new Animal('sheep','cat','dog');

class Example {
    function __construct() {
        echo("construtor pai");

        $argv = func_get_args();
        switch( func_num_args() ) {
            case 1:
                self::__construct1($argv[0]);
                break;
            case 2:
                self::__construct2( $argv[0], $argv[1] );
                break;
            case 3:
                self::__construct3( $argv[0], $argv[1], $argv[2] );
         }

    }

    function __construct1($arg1) {
    echo($arg1);
    }

    function __construct2($arg1, $arg2) {
        echo($arg1.$arg2);
    }

    function __construct3($arg1, $arg2, $arg3) {
        echo($arg1.$arg2.$arg3);

    }
}

$a = new Example("Argument 1,<br/>");
$b = new Example("Argument 1,", "Argument 2 <br/>");
$b = new Example("Argument 1,", "Argument 2,", "Argument 3 <br/>");
$d = new Example();




?>
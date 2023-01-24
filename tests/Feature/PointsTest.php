
<?php

use App\ValueObject\MakePoints;

use function PHPUnit\Framework\assertEquals;

it('converts strings to array', function () {
   $string = 'hie *there *I am *a string';
   $array =  ['hie','there','I am','a string'];
   $response = MakePoints::from($string);

   assertEquals($array,$response);
   
   
});

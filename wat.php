<?php
echo "== Order of Operations / Truthiness\n";
echo (true ? 'Foo' : false ? 'Bar' : 'Baz'); // Bar
/*
  Explanation:
  You have to look at this expression like this:
  echo ((true ? 'Foo' : false) ? 'Bar' : 'Baz');
  Notice the extra ( & ), this is how PHP evaluates the expression.
  This means that PHP will display 'Bar' if
  (true ? 'Foo' : false)
  evaluates to `true`, which it does since the result of the expression is "Foo".
  And "Foo" is a truthy value.
*/

$a = INF;
$b = array();
$c = (object)array();
echo "\n\n== Circular\n";
var_dump($a < $b); // bool(true)
var_dump($b < $c); // bool(true)
var_dump($c < $a); // bool(true)
/*
  Explanation:
  PHP has a circular comparison graph, per: http://phpsadness.com/sad/52
*/


echo "\n\n== Octal\n";
echo (08 === 0) ? 
  "Invalid octal literals silently become something else\n" 
  : "Really, this should produce an error anyway\n";
echo (01181 === 9) ? 
  "Invalid octal literals silently become something else\n" 
  : "Really, this should produce an error anyway\n";
/*
  Explanation:
  When an invalid octal literal is used, it seems that PHP just silently drops 
  all the digits from the invalid one one.  Some languages have gotten rid of
  octal literals because they are error-prone (ES5 - http://es5.github.io/#B.1)
  but PHP not only supports them but silently mangles them.  This is especially
  bad when a developer didn't realize a leading zero means octal and types in
  what they think is a decimal number with a leading zero.
*/


echo "\n\n== Arrays\n";
$a = array();
$a[-5] = "-5";
$a[] = "after -5";
$a[""] = "empty string";
$a[null] = "null";
$a["00"] = "00";
$a["10"] = "10";
$a["11"] = "11";
$a[11.23] = "11.23";
$a[false] = "false";
$a[] = "after false";
var_dump($a);
/* 
Produces:
array(7) {
  [-5]=>
  string(2) "-5"
  [0]=>
  string(5) "false"
  [""]=>
  string(4) "null"
  ["00"]=>
  string(2) "00"
  [10]=>
  string(2) "10"
  [11]=>
  string(5) "11.23"
  [12]=>
  string(11) "after false"
}
*/
/*
  Explanation:
  Sometimes PHP decides your array indices should be cast from strings to
  integers, but sometimes not.  Can be pretty confusing when you are using
  arbitrary integer strings as keys.  Also, trying to use a float as an array
  index will cause it to be truncated to an integer index.  Also, booleans are
  turned into 0/1 array indices.  Also, if you use the $a[] = <val> syntax, per
  the PHP manual: (http://php.net/manual/en/language.types.array.php)
  	"if no key is specified, the maximum of the existing integer indices is 
  	taken, and the new key will be that maximum value plus 1 (but at least 0)"
  It is hard to keep all the rules straight, and as such can be a source of
  bugs.
*/


if("1 dog" + "2 cats" == "3 mammals" == True) {
  echo "PHP is the best language ever";
} else {
  echo "I knew...";
}

/*
Produces:
PHP is the best language ever
*/
/*
  Explanation:
  too lazy to explain it. :v sorry. (after all, i'm a PHP Developer)
*/

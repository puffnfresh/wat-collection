<?php
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

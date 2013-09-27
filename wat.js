[] + {}; // "[object Object]"
/*
  Explanation:
  When JavaScript needs to add "stuff" together it will covert the types to primitives.
  That usually means calling the `toString()` function.
  In this case:
    [].toString() produces an empty string
    {}.toString() produces "[object Object]"
    Which results in: "" + "[object Object]" -> "[object Object]"
*/

{} + []; // 0
/* Explanation: parsed as "{}; +[]" that is, an empty code block followed by coercing an empty array to a number. */
({} + []); // "[object Object]"
{} + {}; // NaN
/* Explanation: again, parsed as if there were a semicolon before the + */
({} + {}); // "[object Object][object Object]"
[0, -1, -2].sort(); // [-1, -2, 0]
',,,' == new Array(4) // true
/* Explanation: the == operator converts both arguments to strings */
["1", "2", "3", "4", "5", "6", "7", "8", "9"].map(parseInt) // [ 1, NaN, NaN, NaN, NaN, NaN, NaN, NaN, NaN ]
2147483648 | 0 // -2147483648
/* Explanation: parseInt takes two parameters (value and radix) and map passes three parameters to the given
   function (value, index, and 'this').  So parseInt("2",1) is what is evaluated for the second element, for
   example. */

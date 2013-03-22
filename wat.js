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
{} + {}; // NaN
[0, -1, -2].sort(); // [-1, -2, 0]
',,,' == new Array(4) // true
["1", "2", "3", "4", "5", "6", "7", "8", "9"].map(parseInt) // [ 1, NaN, NaN, NaN, NaN, NaN, NaN, NaN, NaN ]
2147483648 | 0 // -2147483648

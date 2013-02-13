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
/*
  Explanation:
  `.sort()` converts elements to strings before comparing them, 
  then it uses lexicographical sorting ("70" comes before "8" etc.).
  If you want numerical sorting you have to provide your own `compareFunction` as detailed here: 
  https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Array/sort
*/

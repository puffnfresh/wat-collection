[] + {}; // "[object Object]"
{} + []; // 0
{} + {}; // NaN
['wat'] == ['wat']; // false
var wat = {wat: 'wat'}; wat == {wat: 'wat'}; // false

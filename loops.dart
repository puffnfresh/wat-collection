main() {
  print("Test 1:");
  var callbacks = [];
  for (var i = 0; i < 4; i++) {
    callbacks.add(() => print(i));
  }
  callbacks.forEach((c) => c()); // Prints 0, 1, 2, 3
  
  print("Test 2:");
  callbacks = [];
  var i;
  for (i = 0; i < 4; i++) {
    callbacks.add(() => print(i));
  }
  callbacks.forEach((c) => c()); // Prints 4, 4, 4, 4

  print("Test 3:");
  callbacks = [];
  for (var i = 0; i < 4; i++) {
    callbacks.add(() => print(i));
    i = i + 1;
  }
  callbacks.forEach((c) => c()); // Prints 1, 3

  print("Test 4:");
  callbacks = [];
  for (var i = 0; i < 4;) {
    callbacks.add(() => print(i));
    i = i + 1;
  }
  callbacks.forEach((c) => c()); // Prints 1, 2, 3, 4
}

// Private classes in java are odd.

class BlackBox {
	// BlackBox.Wrapper is a private class and cannot be referred to
	// outside of BlackBox.
	private static class Wrapper {
		public final int x;
		public Wrapper(int x) {
			this.x = x;
		}
		public String toString() {
			return "Wrapper("+x+")";
		}
	}

	// We can, however, leak BlackBox.Wrapper objects from BlackBox
	// fields and methods!
	public static final BlackBox.Wrapper one = new BlackBox.Wrapper(1);

	public static BlackBox.Wrapper wrap(int x) {
		return new BlackBox.Wrapper(x);
	}
	// And similarly take BlackBox.Wrapper objects as arguments
	public static int unwrap(BlackBox.Wrapper w) {
		return w.x;
	}
}

public class Wat {
	public static void main(String[] args) {
		// OK, we can't access the public constructor because the class is private.
		//new BlackBox.Wrapper(0);

		// Composing works fine; prints 42
		System.out.println(BlackBox.unwrap(BlackBox.wrap(42)));

		// Accessing the Wrapper field also works fine. BlackBox.one is
		// considered as its super class, Object.
		System.out.println(BlackBox.one);

		// We can't declare a local variable of type BlackBox.Wrapper!
		//BlackBox.Wrapper w = BlackBox.wrap(1);

		// Assigning to Object works fine, of course
		Object w = BlackBox.wrap(2);

		// However, we can't cast back to BlackBox.Wrapper! Again,
		// because BlackBox.Wrapper is private to BlackBox.
		//System.out.println(BlackBox.unwrap((BlackBox.Wrapper) w));
	}
}

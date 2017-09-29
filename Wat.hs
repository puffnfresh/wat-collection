module Main where

-- Monomorphism restriction:

-- Won't compile
-- wat3 = show
-- wat3 = \a -> show a
-- Compiles
wat3 a = show a

-- Redefine maths:
wat1 = 2 + 2
    where 2 + 2 = 5

-- Confusing laziness:
wat2 = (a, b, c)
    where (a, b, c) = (b + 5, 3, a ^ 7)

-- No arbitrary restriction on a number of let bindings
wat42 = let in 42

-- The compiler is perfectly content with this function
-- even though there's no such thing as a fractional integer
-- So we've created an expression that can't be evaluated
wat4 :: (Fractional b, Integral b) => b -> b
wat4 n = n/2^n

main :: IO ()
main = do
  print wat1 -- 5
  print wat2 -- (8,3,2097152)
  print $ wat3 (1, True) -- "(1,True)"
  print wat42 -- 42

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

-- more laziness
-- print $ head wat3 works, print $ head wat4 will not
wat4 = foldr (:) [] [1..]
wat5 = foldl (flip (:)) [] [1..]

main :: IO ()
main = do
  print wat1 -- 5
  print wat2 -- (8,3,2097152)
  print $ wat3 (1, True) -- "(1,True)"

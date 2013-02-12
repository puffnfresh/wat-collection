(conj [1 2 3] 4)
;; => [1 2 3 4] (type is clojure.lang.PersistentVector)

(butlast (conj [1 2 3] 4))
;; => (1 2 3) (type is now clojure.lang.PersistentVector$ChunkedSeq)

(conj (butlast (conj [1 2 3] 4)) 4)
;; (4 1 2 3) (type is clojure.lang.Cons)

;; Basic idea behind it is that conj'ing to vector appends to end, and to list appends to beginning:

(conj [1 2 3] 4)
;; => [1 2 3 4]

(conj '(1 2 3) 4)
;; => (4 1 2 3) 


;; contains?

(contains? [1 2 3] 1)
;; => true

(contains? [1 2 3] 2)
;; => true

(contains? [1 2 3] 3)
;; => false

(contains? [1 2 3] 0)
;; => true

;; The contains? function returns true if the key or index is containable
;;  within a collection, not the value itself. This bites many a Clojure
;;  neophyte.


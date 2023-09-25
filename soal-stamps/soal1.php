<?php
function isPrime($n): bool
{
    if ($n <= 1) {
        return false;
    }

    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

for ($i = 100; $i >= 1; $i--) {
    if (!isPrime($i)) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            echo ("FooBar");
        } elseif ($i % 3 == 0) {
            echo ("Foo");
        } elseif ($i % 5 == 0) {
            echo ("Bar");
        } else {
            echo ($i);
        }
        if ($i > 1) {
            echo ", ";
        }
    }
}

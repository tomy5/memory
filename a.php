<?php
$num = "c05.png";
if (preg_match('/[0-9]{2}/', $num, $matches)) {
    echo "match";
} else {
    echo "not match";
}
print_r($matches[0]);
?>
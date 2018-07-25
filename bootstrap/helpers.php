<?php
/**
 * @param bool $bool
 * @param string $class
 * @return null|string
 */
function activeIf($bool, $class = 'active')
{
    if ($bool) {
        return $class;
    } else {
        return null;
    }
}
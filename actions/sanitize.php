<?php
function array_trim(array $items): array {
    return array_map(function ($item) {
        if (is_string($item)) {
            return trim($item);
        } elseif (is_array($item)) {
            return array_trim($item);
        } else
            return $item;
    }, $items);
}

function sanitize(array $inputs, array $fields, bool $trim = true) : array {
    $options = array_map(fn($field) => $filters[$field], $fields);
    $data = filter_var_array($inputs, $options);

    return $trim ? array_trim($data) : $data;
}
?>
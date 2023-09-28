<?php

/**
 *Оборачивает данные в meta
 * @param array $data
 * @return array
 */
function wrapMeta(array $data): array
{
    return [
        "meta" => $data
    ];
}

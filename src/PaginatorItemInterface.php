<?php

namespace Mention\Paginator;

/**
 * @template ItemT
 */
interface PaginatorItemInterface
{
    public function getCursor(): ?string;

    /** @return ItemT */
    public function getData();
}

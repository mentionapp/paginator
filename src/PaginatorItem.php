<?php

namespace Mention\Paginator;

/**
 * @template ItemT
 *
 * @implements PaginatorItemInterface<ItemT>
 */
final class PaginatorItem implements PaginatorItemInterface
{
    private ?string $cursor;

    /** @var ItemT */
    private $data;

    /**
     * @param ItemT $data
     */
    public function __construct(?string $cursor, $data)
    {
        $this->cursor = $cursor;
        $this->data = $data;
    }

    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @return ItemT
     */
    public function getData()
    {
        return $this->data;
    }
}

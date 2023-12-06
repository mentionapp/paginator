<?php

namespace Mention\Paginator;

/**
 * @template ItemT
 *
 * @implements PaginatorPageInterface<ItemT>
 */
final class PaginatorPage implements PaginatorPageInterface
{
    /** @var array<int,PaginatorItem<ItemT>> */
    private array $items;

    /**
     * @param \Iterator<PaginatorItem<ItemT>>|array<PaginatorItem<ItemT>> $items
     */
    public function __construct($items)
    {
        if ($items instanceof \Iterator) {
            $items = iterator_to_array($items);
        }

        $this->items = $items;
    }

    /**
     * {@inheritdoc}
     *
     * @see PaginatorPageInterface::items()
     */
    public function items(): array
    {
        return $this->items;
    }

    /**
     * {@inheritdoc}
     *
     * @see PaginatorPageInterface::__invoke()
     */
    public function __invoke(): array
    {
        return array_map(function (PaginatorItemInterface $item) {
            return $item->getData();
        }, $this->items);
    }

    /**
     * {@inheritdoc}
     *
     * @see PaginatorPageInterface::firstCursor()
     */
    public function firstCursor(): ?string
    {
        if (false !== $item = reset($this->items)) {
            return $item->getCursor();
        }

        return null;
    }

    /**
     * {@inheritdoc}
     *
     * @see PaginatorPageInterface::lastCursor()
     */
    public function lastCursor(): ?string
    {
        if (false !== $item = end($this->items)) {
            return $item->getCursor();
        }

        return null;
    }
}

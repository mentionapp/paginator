<?php

namespace Mention\Paginator;

/**
 * @template ItemT
 */
interface PaginatorPageInterface
{
    /**
     * @return array<int,PaginatorItemInterface<ItemT>>
     */
    public function items(): array;

    /**
     * Backwards compatibility wrapper.
     *
     * Returns an iterator over un-wrapped items
     *
     * This wrapper allows to use the paginator like this:
     *
     * foreach ($paginator as $page) {
     *     foreach ($page() as $data) {
     *     }
     *  }
     *
     * @return array<ItemT>
     */
    public function __invoke(): array;

    /**
     * Returns the cursor of the first item.
     */
    public function firstCursor(): ?string;

    /**
     * Returns the cursor of the last item.
     */
    public function lastCursor(): ?string;
}

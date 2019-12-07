<?php

namespace Mention\Paginator;

interface PaginatorPageInterface
{
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
     * @return mixed[]
     */
    public function __invoke(): array;

    /**
     * @return PaginatorItemInterface[]
     */
    public function items(): array;

    /**
     * Returns the cursor of the first item.
     */
    public function firstCursor(): ?string;

    /**
     * Returns the cursor of the last item.
     */
    public function lastCursor(): ?string;
}

<?php

namespace Mention\Paginator;

/**
 * A paginator that iterates over PaginatorPageInterface instances.
 *
 * Example:
 *
 * foreach ($paginator as $page) {
 *     // $page is a PaginatorPageInterface
 *     foreach ($page->items() as $item) {
 *         // ...
 *     }
 * }
 *
 * @phpstan-extends \IteratorAggregate<int, PaginatorPageInterface>
 */
interface PaginatorInterface extends \IteratorAggregate
{
    /**
     * Implementation of \IteratorAggregate::getIterator().
     *
     * Foreach calls this method.
     *
     * @phpstan-return \Traversable<int, PaginatorPageInterface>
     */
    public function getIterator();
}

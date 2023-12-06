<?php

namespace Mention\Paginator;

/**
 * PaginatorInterface.
 *
 * ## Example usage
 *
 * foreach ($paginator as $page) {
 *     // $page is a PaginatorPageInterface
 *     foreach ($page->items() as $item) {
 *         // ...
 *     }
 * }
 *
 * @template ItemT
 *
 * @extends \Iterator<int,PaginatorPageInterface<ItemT>>
 */
interface PaginatorInterface extends \Iterator
{
}

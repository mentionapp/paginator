<?php

namespace Mention\Paginator;

/**
 * A paginator that maps items through a callback.
 *
 * @template OrigItemT
 * @template NewItemT
 *
 * @implements PaginatorInterface<NewItemT>
 */
final class MappingPaginator implements PaginatorInterface
{
    /**
     * implementation of current()/key()/next()/rewind()/valid().
     *
     * @use GeneratorPaginatorTrait<NewItemT>
     */
    use GeneratorPaginatorTrait;

    /**
     * @var \Generator<int,PaginatorPage<NewItemT>>
     */
    private \Generator $generator;

    /**
     * @param PaginatorInterface<OrigItemT>                                                             $paginator
     * @param callable(array<int,PaginatorItemInterface<OrigItemT>>):array<int,PaginatorItem<NewItemT>> $callback
     */
    public function __construct(PaginatorInterface $paginator, callable $callback)
    {
        $this->generator = $this->createGenerator($paginator, $callback);
    }

    /**
     * @param PaginatorInterface<OrigItemT>                                                             $paginator
     * @param callable(array<int,PaginatorItemInterface<OrigItemT>>):array<int,PaginatorItem<NewItemT>> $callback
     *
     * @return \Generator<int,PaginatorPage<NewItemT>>
     */
    private function createGenerator(PaginatorInterface $paginator, callable $callback)
    {
        foreach ($paginator as $page) {
            yield new PaginatorPage($callback($page->items()));
        }
    }
}

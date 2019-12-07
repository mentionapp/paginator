<?php

namespace Mention\Paginator;

/**
 * A paginator that maps items through a callback.
 */
final class MappingPaginator implements PaginatorInterface
{
    /**
     * @phpstan-var \Generator<int, PaginatorPageInterface, mixed, mixed>
     */
    private $generator;

    public function __construct(PaginatorInterface $paginator, callable $callback)
    {
        $this->generator = $this->createGenerator($paginator, $callback);
    }

    /**
     * Implementation of \IteratorAggregate::getIterator().
     *
     * Foreach calls this method when iterating over an ArrayPaginator.
     *
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return $this->generator;
    }

    /**
     * @phpstan-return \Generator<int, PaginatorPageInterface, mixed, mixed>
     */
    private function createGenerator(PaginatorInterface $paginator, callable $callback)
    {
        foreach ($paginator as $page) {
            yield new PaginatorPage($callback($page->items()));
        }
    }
}

<?php

namespace Mention\Paginator;

/**
 * @template ItemT
 */
trait GeneratorPaginatorTrait
{
    /**
     * @return PaginatorPageInterface<ItemT>
     */
    public function current(): PaginatorPageInterface
    {
        return $this->generator->current();
    }

    public function key(): int
    {
        return $this->generator->key();
    }

    public function next(): void
    {
        $this->generator->next();
    }

    public function rewind(): void
    {
        $this->generator->rewind();
    }

    public function valid(): bool
    {
        return $this->generator->valid();
    }
}

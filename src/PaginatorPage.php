<?php

namespace Mention\Paginator;

final class PaginatorPage implements PaginatorPageInterface
{
    /** @var PaginatorItemInterface[] */
    private $items;

    /**
     * @param PaginatorItemInterface[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(): array
    {
        return array_map(function (PaginatorItemInterface $item) {
            return $item->getData();
        }, $this->items);
    }

    /**
     * {@inheritdoc}
     */
    public function items(): array
    {
        return $this->items;
    }

    /**
     * {@inheritdoc}
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
     */
    public function lastCursor(): ?string
    {
        if (false !== $item = end($this->items)) {
            return $item->getCursor();
        }

        return null;
    }

    /**
     * @phpstan-param iterable<PaginatorItemInterface> $it
     *
     * @phpstan-return array<PaginatorItemInterface>
     */
    private function toArray(iterable $it): array
    {
        $items = [];
        foreach ($it as $item) {
            $items[] = $item;
        }

        return $items;
    }
}

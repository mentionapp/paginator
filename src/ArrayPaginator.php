<?php

namespace Mention\Paginator;

final class ArrayPaginator implements PaginatorInterface
{
    /**
     * @phpstan-var \Generator<int, PaginatorPageInterface, mixed, mixed>
     */
    private $generator;

    /**
     * @param mixed[] $list    A flat list of paginated data
     * @param int     $perPage Number of items to display by page
     */
    public function __construct(array $list, int $perPage = 100)
    {
        $this->generator = (function () use ($list, $perPage): \Generator {
            $page = [];
            foreach ($list as $cursor => $data) {
                $page[] = new PaginatorItem((string) $cursor, $data);
                if (count($list) === $perPage) {
                    yield new PaginatorPage($page);
                    $page = [];
                }
            }

            if (count($list) !== 0) {
                yield new PaginatorPage($page);
            }
        })();
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
}

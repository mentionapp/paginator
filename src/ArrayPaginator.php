<?php

namespace Mention\Paginator;

/**
 * @template ItemT
 *
 * @implements PaginatorInterface<ItemT>
 */
final class ArrayPaginator implements PaginatorInterface
{
    /**
     * implementation of current()/key()/next()/rewind()/valid().
     *
     * @use GeneratorPaginatorTrait<ItemT>
     */
    use GeneratorPaginatorTrait;

    /** @var \Generator<int,PaginatorPage<ItemT>> */
    private \Generator $generator;

    /**
     * @param array<ItemT> $list    A flat array of final data
     * @param positive-int $perPage Number of items to display by page
     */
    public function __construct(array $list, int $perPage = 100)
    {
        $this->generator = $this->createGenerator($list, $perPage);
    }

    /**
     * @param array<ItemT> $list    A flat array of final data
     * @param positive-int $perPage Number of items to display by page
     *
     * @return \Generator<int,PaginatorPage<ItemT>>
     */
    private function createGenerator(array $list, int $perPage): \Generator
    {
        $page = [];
        foreach ($list as $cursor => $data) {
            $page[] = new PaginatorItem(
                (string) $cursor,
                $data,
            );
            if (\count($list) === $perPage) {
                yield new PaginatorPage($page);
                $page = [];
            }
        }

        if (\count($list) !== 0) {
            yield new PaginatorPage($page);
        }
    }
}

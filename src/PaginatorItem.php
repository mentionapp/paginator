<?php

namespace Mention\Paginator;

final class PaginatorItem implements PaginatorItemInterface
{
    /** @var string|null */
    private $cursor;

    /** @var mixed */
    private $data;

    /**
     * @param mixed $data
     */
    public function __construct(?string $cursor, $data)
    {
        $this->cursor = $cursor;
        $this->data = $data;
    }

    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}

<?php

namespace Mention\Paginator;

interface PaginatorItemInterface
{
    public function getCursor(): ?string;

    /** @return mixed */
    public function getData();
}

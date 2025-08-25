<?php

class Link {
    public Node $node;
    public ?Link $next;

    public function __construct(Node $node, ?Link $next = null) {
        $this->node = $node;
        $this->next = $next;
    }
}

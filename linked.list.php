<?php
class Node
{
    public $value;
    public $next;
    public function __construct($v, Node $n = null)
    {
        $this->value = $v;
        $this->next = $n;
    }
}
class LinkedList
{
    public $firstNode = null;
    public $total = 0;
    public function add(Node $n)
    {
        if ($this->firstNode === null) {
            $this->firstNode = $n;
        } else {
            $node = $this->firstNode;
            while ($node->next !== null) {
                $node = $node->next;
            }
            $node->next = $n;
        }
        
        $this->total++;
        return $this;
    }
    
    public function isCyclic()
    {
        
        $node = $this->firstNode;
        $counter = 0;
        while ($node !== null) {
            $node = $node->next;
            if (++$counter > $this->total) {
                return true;
            }
        }
        
        return false;
    }
}
$a = new Node(3);
$b = new Node(2);
$c = new Node(4);
$d = new Node(6);
$e = new Node(2);
$a1 = new Node(3);
$b1 = new Node(2);
$c1 = new Node(4);
$d1 = new Node(6);
$e1 = new Node(2, $c1);
$acyclic = new LinkedList();
$acyclic->add($a)->add($b)->add($c)->add($d)->add($e);
$cyclic = new LinkedList();
$cyclic->add($a1)->add($b1)->add($c1)->add($d1)->add($e1);
echo "Should be FALSE: " . $acyclic->isCyclic() . "\n";
echo "Should be TRUE: " . $cyclic->isCyclic() . "\n";

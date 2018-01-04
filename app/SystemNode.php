<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemNode extends Model
{
    protected $fillable = ['pid', 'name', 'label', 'node', 'listorder', 'is_show'];

    public function nodeList()
    {
        // tidy menu node
        $where_first = [
            ['is_show', '=', 1],
            ['pid', '=', 0],
        ];
        $node_first = $this->where($where_first)->orderBy('listorder')->get()->toArray();

        // tidy child node
        $where_child = [
            ['is_show', '=', 1],
            ['pid', '<>', 0],
        ];
        $node_child = $this->where($where_child)->get()->toArray();

        $node_child_group = [];
        array_map(function ($item) use (&$node_child_group) {
            $node_child_group[$item['pid']]['child'][] = (array)$item;
        }, $node_child);

        // merge
        $node_list = array_map(function ($item) use ($node_child_group) {
            if (!isset($node_child_group[$item['id']])) {
                return $item;
            }
            return $item + $node_child_group[$item['id']];
        }, $node_first);

        return $node_list;
    }
}

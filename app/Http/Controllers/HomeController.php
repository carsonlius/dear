<?php

namespace App\Http\Controllers;

use App\SystemNode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // tidy menu node
//        $where_first = [
//            ['is_show', '=', 1],
//            ['pid', '=', 0],
//        ];
//        $node_first = SystemNode::where($where_first)->orderBy('listorder')->get()->toArray();
//
//        // tidy child node
//        $where_child = [
//            ['is_show', '=', 1],
//            ['pid', '<>', 0],
//        ];
//        $node_child = SystemNode::where($where_child)->get()->toArray();
//
//        $node_child_group = [];
//        array_map(function ($item) use (&$node_child_group) {
//            $node_child_group[$item['pid']]['child'][] = (array)$item;
//        }, $node_child);
//
//        // merge
//        $node_list = array_map(function ($item) use ($node_child_group) {
//            if (!isset($node_child_group[$item['id']])) {
//                return $item;
//            }
//            return $item + $node_child_group[$item['id']];
//        }, $node_first);
//        return view('home')->with(compact('node_list'));
        return view('home');
    }

}

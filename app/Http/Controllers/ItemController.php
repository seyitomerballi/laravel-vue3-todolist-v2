<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    function getItems()
    {

        $itemList = Item::query()->orderByDesc('created_at')->get();

        return $itemList;
    }

    function storeItem(Request $request)
    {

        $newItem = new Item();
        $newItem->title = $request->post('item');
        $newItem->save();

        return $newItem;
    }

    function updateItem(Request $request, $id)
    {
        $item = Item::find($id);

        if ($item) {
            $completed = $request->post('completed') ? true : false;
            $item->completed = $completed;
            $item->completed_at = $completed ? Carbon::now() : null;
            $item->save();
            return $item;
        }
        return "Item not founded.";
    }

    function deleteItem()
    {
        $item = Item::find($id);
        if ($item) {
            $item->delete();
            return "Item succesfully deleted.";
        }
        return "Item not founded.";
    }
}

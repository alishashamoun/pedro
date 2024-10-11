<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\ProductandService;
use App\Models\PurchaseOrder;
use App\Models\User;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::get();
        return view('admin.inventory.index', compact('inventory'));
    }

    public function create()
    {
        $purchase = PurchaseOrder::get();
        $vendor = User::withRole('vendor')->select('id','name')->get();
        return view('admin.inventory.create', compact('purchase','vendor'));
    }

    public function store(Request $request)
    {
        $inventory = Inventory::create($request->all());
        return redirect()->route('inventory.index')
            ->with('success', 'Inventory created successfully');
    }

    public function show(Inventory $inventory)
    {
        return view('admin.inventory.show', compact('inventory'));
    }

    public function edit(Inventory $inventory)
    {
        $purchase = PurchaseOrder::get();
        $vendor = User::withRole('vendor')->select('id','name')->get();
        return view('admin.inventory.edit', compact('inventory','purchase','vendor'));
    }

    public function update(Request $request, Inventory $Inventory)
    {
        // return $request;
        $Inventory->update($request->all());
        return redirect()->route('inventory.index')
            ->with('success', 'Inventory updated successfully');
    }

    public function destroy(Inventory $Inventory)
    {
        $Inventory->delete();
        return redirect()->route('inventory.index')
            ->with('success', 'Inventory deleted successfully');
    }
    public function product_destroy($id)
    {
        ProductandService::find($id)->delete();
        return redirect()->back()
            ->with('success', 'Product & Services deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InventoryExport;
use App\Imports\InventoryImport;
use App\Models\Inventory;

class InventoryController extends Controller
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function index()
  {
    $inventory = Inventory::get();

    return view('/inventory/inventory', compact('inventory'));
  }

  /**
   * @return \Illuminate\Support\Collection
   */
  public function export()
  {
    return Excel::download(new InventoryExport, 'inventory.xlsx');
  }

  /**
   * @return \Illuminate\Support\Collection
   */
  public function import(Request $request)
  {
    // Validate incoming request data
    $request->validate([
      'file' => 'required|max:2048',
    ]);

    Excel::import(new InventoryImport, $request->file('file'));

    return back()->with('success', 'Inventory imported successfully.');
  }

  public function create()
  {
    return view('inventory.create');
  }

  public function delete($id_barang)
  {
    Inventory::destroy($id_barang);

    return redirect()->route('inventory.index')
      ->with('success', 'Barang deleted successfully');
  }

  public function store(Request $request)
  {
    $request->validate([
      'nama_barang' => 'required',
      'qty' => 'required|int',
      'harga_jual' => 'required',
      'harga_beli' => 'required',
    ]);

    $inventory = Inventory::create([
      'nama_barang' => $request->nama_barang,
      'qty' => $request->qty,
      'harga_jual' => $request->harga_jual,
      'harga_beli' => $request->harga_beli,
    ]);

    if ($inventory) {
      //redirect dengan pesan sukses
      return redirect()->route('inventory.index')->with(['success' => 'Data Berhasil Disimpan!']);
    } else {
      //redirect dengan pesan error
      return redirect()->route('inventory.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
  }

  public function edit(Inventory $inventory)
  {
    return view('inventory.edit', compact('inventory'));
  }

  public function update(Request $request, $id_barang)
  {
    $inventory = Inventory::findOrFail($id_barang);
    $request->validate([
      'nama_barang' => 'required',
      'qty' => 'required',
      'harga_jual' => 'required',
      'harga_beli' => 'required',
    ]);

    $inventory->update([
      'nama_barang' => $request->nama_barang,
      'qty' => $request->qty,
      'harga_jual' => $request->harga_jual,
      'harga_beli' => $request->harga_beli,
    ]);

    if ($inventory) {
      // Redirect with success message
      return redirect()->route('inventory.index')->with(['success' => 'Data Berhasil Diupdate!']);
    } else {
      // Redirect with error message
      return redirect()->route('inventory.index')->with(['error' => 'Data Gagal Diupdate!']);
    }
  }
}

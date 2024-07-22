<?php

namespace App\Exports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventoryExport implements FromCollection, WithHeadings
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return Inventory::all();
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function headings(): array
  {
    return ["ID", "Nama Barang", "Quantity", "Harga Beli", "Harga Jual"];
  }
}

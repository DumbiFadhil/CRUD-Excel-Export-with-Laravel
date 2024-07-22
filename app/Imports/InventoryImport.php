<?php

namespace App\Imports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Hash;

class InventoryImport implements ToModel, WithHeadingRow, WithValidation
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new Inventory([
      'nama_barang' => $row['nama_barang'],
      'qty' => $row['quantity'],       // Ensure this matches the column header in the Excel file
      'harga_beli' => $row['harga_beli'],
      'harga_jual' => $row['harga_jual'],
    ]);
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function rules(): array
  {
    return [
      '*.nama_barang' => 'required',
      '*.quantity' => 'required|integer', // Adjusted rule for quantity
      '*.harga_beli' => 'required|numeric',
      '*.harga_jual' => 'required|numeric',
    ];
  }
}

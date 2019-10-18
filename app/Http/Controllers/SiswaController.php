<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Siswa;
use PDF;

class SiswaController extends Controller
{
	public function exportPDF()
	{
		
		$dataSiswa = Siswa::all();
 
		$pdf = PDF::loadview('pdf', ['dataSiswa'=>$dataSiswa]);

		return $pdf->stream();
	}

	public function export($type)
	{
		return Excel::download(new SiswaExport, ('users'. '.' .$type));
	}

    public function exportExcel() 
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    public function importExcel() 
    {
        Excel::import(new SiswaImport, 'siswa.xlsx');
        
        return redirect('/home')->with('success', 'All good!');
	}

	public function exportCSV() 
    {
        return Excel::download(new SiswaExport, 'siswa.csv');
	}
	
	
    public function import_excel(Request $request) 
	{
		// validasi
		// $this->validate($request, [
		// 	'file' => 'required|mimes:csv,xls,xlsx,ods'
		// ]);
		$validatedData = $request->validate([
			'file' => 'required|mimes:csv,xls,xlsx,txt',
		]);

		/**
		 * Upload + simpan file
		 */
 		// ambil file upload
		$file = $request->file('file'); 
		// penamaan file upload
		$filename = Str::replaceArray(':',['-', '-'],  Carbon::now()) . '.' . $file->getClientOriginalName();
		
		// Save to
        $file->storeAs(
            'public/import/', $filename
		);
		
		//Import Dari
		Excel::import(new SiswaImport, 'public/import/' .  $filename);


		/**
		 * Upload tanpa simpan file
		 */
 
		// ambil nama file dan import
		// Excel::import(new SiswaImport, request()->file('file')); 

		// notifikasi dengan session
		Session::flash('sukses','Data Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/home');
	}
}

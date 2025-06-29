<?php

namespace App\Http\Controllers;

use App\Http\Resources\KelasResource;
use Illuminate\Http\Request;
use App\Models\Kelas;
use Barryvdh\DomPDF\Facade\Pdf;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kelas = Kelas::all();
        return KelasResource::collection($kelas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            // 'id_kelas' => 'required|string|max:10|unique:kelas',
            'nama_kelas' => 'required|string|max:255',
            'tingkat' => 'required|string|max:5',
            'wakes' => 'required|string|max:100',
            'jumlah' => 'required|string|max:255',
        ]);
        $kelas = Kelas::create($request->all());
        return (new KelasResource($kelas))
            ->additional([
                'success' => true,
                'message' => 'Kelas created successfully'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $kelas = Kelas::where('id_kelas', $id)->firstOrFail();
        return new KelasResource($kelas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_kelas)
    {
        $kelas = Kelas::where('id_kelas', $id_kelas)->firstOrFail();

        $request->validate([
            'id_kelas' => 'required|string|max:255|unique:kelas,id_kelas,' . $kelas->id_kelas . ',id_kelas',
            'nama_kelas' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'wakes' => 'required|string|max:255',
            'jumlah' => 'required|string|max:255',
        ]);

        $kelas->update($request->all());

        return (new KelasResource($kelas))
            ->additional([
                'success' => true,
                'message' => 'Kelas updated successfully'
            ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $kelas = Kelas::where('id_kelas', $id)->firstOrFail();
        $kelas->delete();

        return (new KelasResource($kelas))
            ->additional([
                'success' => true,
                'message' => 'Kelas deleted successfully'
            ]);
    }


    public function downloadPDF()
    {
        $kelas = Kelas::all();

        $pdf = Pdf::loadView('kelas-pdf', ['kelas' => $kelas]);

        return $pdf->download('data_kelas.pdf');
    }
}

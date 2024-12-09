<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('updated_at', 'desc')->get();
        return view('backend.v_user.index', [
            'judul' => 'Data User',
            'index' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.v_user.create', [
            'judul' => 'Tambah User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nama' => 'required|max:255',
                'email' => 'required|max:255|email|unique:user',
                'role' => 'required',
                'hp' => 'required|min:4|max:13',
                'password' => 'required|min:4|confirmed',
                'foto' => 'image|mimes:jpeg,jpg,png,gif|file|max:1024',
            ],
            $messages =
                [
                    'foto.image' => 'Format gambar gunakan file dengan ekstensi jpeg, jpg, png atau gif.',
                    'foto.max' => 'Ukuran file gambar maksimal adalah 1024 KB.'
                ]
        );
        $validatedData['status'] = 0;

        /// menggunakan ImageHelper
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $originalFileName = date('YmdHis') . '_' . uniqid() . '.' . $extension;
            $directory = 'storage/img-user/';
            // Simpan gambar dengan ukuran yang ditentukan
            ImageHelper::uploadAndResize($file, $directory, $originalFileName, 385, 400);
            // null (jika tinggi otomatis)
            // Simpan nama file asli di database
            $validatedData['foto'] = $originalFileName;
        }

        // password kombinasi
        $password = $request->input('password');
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/';
        // huruf kecil ([a-z]), huruf besar ([A-Z]), dan angka (\d) (?=.*[\W_]) simbol karakter (non-alphanumeric)
        if (preg_match($pattern, $password)) {
            $validatedData['password'] = Hash::make($validatedData['password']);
            User::create($validatedData, $messages);
            return redirect()->route('backend.user.index')->with('success', 'Data berhasil tersimpan');
        } else {
            return redirect()->back()->withErrors(['password' => 'Password harus terdiri dari kombinasi huruf besar, huruf kecil, angka, dan simbol karakter.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('backend.v_user.edit', [
            'judul' => 'Ubah User',
            'edit' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //ddd($request);
        $user = User::findOrFail($id);
        $rules = [
            'nama' => 'required|max:255',
            'role' => 'required',
            'status' => 'required',
            'hp' => 'required|min:10|max:13',
            'foto' => 'image|mimes:jpeg,jpg,png,gif|file|max:1024',
        ];
        $messages = [
            'foto.image' => 'Format gambar gunakan file dengan ekstensi jpeg, jpg, png, atau gif.',
            'foto.max' => 'Ukuran file gambar Maksimal adalah 1024 KB.'
        ];
        if ($request->email != $user->email) {
            $rules['email'] = 'required|max:255|email|unique:user';
        }
        $validatedData = $request->validate($rules, $messages);
        // menggunakan ImageHelper
        if ($request->file('foto')) {
            //hapus gambar lama
            if ($user->foto) {
                $oldImagePath = public_path('storage/img-user/') . $user->foto;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $originalFileName = date('YmdHis') . '_' . uniqid() . '.' . $extension;
            $directory = 'storage/img-user/';
            // Simpan gambar dengan ukuran yang ditentukan
            ImageHelper::uploadAndResize($file, $directory, $originalFileName, 385, 400);
            // null (jika tinggi otomatis)
            // Simpan nama file asli di database
            $validatedData['foto'] = $originalFileName;
        }
        $user->update($validatedData);
        return redirect()->route('backend.user.index')->with('success', 'Data berhasil diperbaharui');
    }

    public function formUser()
    {
        return view('backend.v_user.form', [
            'judul' => 'Laporan Data User'
        ]);
    }

    public function cetakUser(Request $request)
    {
        $request->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal'
        ]);

        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $query = User::whereBetween('created_at', [$tanggalAwal, $tanggalAkhir])->orderBy('id', 'desc');

        $user = $query->get();

        $data = [
            'judul' => 'Laporan User',
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
            'cetak' => $user
        ];

        $pdf = Pdf::loadView('backend.v_user.cetak', $data);
        return $pdf->stream('Laporan User.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if ($user->foto) {
            $oldImagePath = public_path('storage/img-user/') . $user->foto;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $user->delete();
        return redirect()->route('backend.user.index')->with('success', 'Data Berhasil dihapus');
    }
}

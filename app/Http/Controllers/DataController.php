<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\member_model;
use App\users_model;
use App\kategori_model;
use App\buku_model;
use App\peminjaman_model;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Hash;
use DB;

class DataController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function user()
    {
        $member = member_model::all();
        return view('data_user', ['var_member' => $member]);
    }

    // Bagian Karyawan
    public function karyawan()
    {
        $users = users_model::all();
        return view('data_karyawan', ['var_user' => $users]);
    }
    public function kategori_buku()
    {
        $kategori = kategori_model::all();
        return view('kategori_buku', ['var_kategori' => $kategori]);
    }
    public function buku()
    {
        $kategori = kategori_model::all();
        return view('buku', ['var_kategori' => $kategori]);
    }
    public function data_buku($id)
    {
        $buku = buku_model::where('id_kategori', $id)->get();
        $kategori = kategori_model::where('id_kategori', $id)->first();
        return view('detail_buku', ['var_buku' => $buku, 'var_id' => $id, 'var_kategori' => $kategori]);
    }
    public function peminjaman_buku()
    {
        $member = member_model::all();
        $buku = buku_model::all();
        $peminjaman = DB::table('peminjaman')
            ->join('member', 'peminjaman.id_member', '=', 'member.id_member')
            ->join('buku', 'peminjaman.id_buku', '=', 'buku.id')
            ->join('kategori_buku', 'buku.id_kategori', '=', 'kategori_buku.id_kategori')
            ->join('users', 'peminjaman.id', '=', 'users.id')
            ->select('peminjaman.*', 'member.nama_member', 'buku.judul_buku', 'users.name', 'kategori_buku.nama_kategori')
            ->get();
        return view('peminjaman_buku', ['var_buku' => $buku, 'var_member' => $member, 'var_peminjaman' => $peminjaman]);
    }
    public function info()
    {
        return view('info');
    }

    public function insert_member(Request $req)
    {
        $v = $this->validate($req, [
            'name'  => 'required|max:200',
            'alamat' => 'required|max:300',
            'no_telp' => 'required|max:15',
            'tgl_lahir' => 'required|date_format:Y-m-d'
        ]);
        if ($v) {
            $mb = new member_model();
            $mb->nama_member = $req["name"];
            $mb->alamat = $req["alamat"];
            $mb->no_telp = $req["no_telp"];
            $mb->tgl_lahir = $req["tgl_lahir"];
            $mb->save();
            session()->flash('berhasil', 'Data Anda Berhasil Ditambahkan');
            return redirect('/user');
        }
    }
    public function edit_member($id)
    {
        $member = member_model::where('id_member', $id)->first();
        return view('/edit_member', ['var_member' => $member]);
    }
    public function proses_edit_member(Request $req)
    {
        $v = $this->validate($req, [
            'name'  => 'required|max:200',
            'alamat' => 'required|max:300',
            'no_telp' => 'required|max:15',
            'tgl_lahir' => 'required|date_format:Y-m-d'
        ]);
        if ($v) {
            $member = member_model::where('id_member', $req['id'])->update(['nama_member' => $req["name"], 'alamat' => $req["alamat"], 'no_telp' => $req["no_telp"], 'tgl_lahir' => $req["tgl_lahir"]]);

            if ($member) {
                session()->flash('berhasil', 'Data Anda Berhasil Diubah');
                return redirect('/user');
            } else {
                session()->flash('gagal', 'Data Anda Gagal Diubah');
                return redirect('/ubah_member/' . $req["id"]);
            }
        }
    }
    public function hapus_member($id)
    {
        $member = member_model::where("id_member", $id);
        $member->delete();
        session()->flash('berhasil', 'Data Anda Berhasil Dihapus');
        return redirect('/user');
    }

    public function insert_kategori(Request $req)
    {

        $v = $this->validate($req, [
            'name'  => 'required|max:200',
            'deskripsi' => 'required|max:300',
        ]);
        if ($v) {
            $kategori = new kategori_model();
            $kategori->nama_kategori = $req['name'];
            $kategori->deskripsi = $req['deskripsi'];
            $kategori->created_by = Auth::user()->name;
            $kategori->save();
            session()->flash('berhasil', 'Data Anda Berhasil Ditambahkan');
            return redirect('/kategori_buku');
        }
    }
    public function edit_kategori($id)
    {
        $kategori = kategori_model::where('id_kategori', $id)->first();
        return view('/edit_kategori', ['var_kategori' => $kategori]);
    }
    public function proses_edit_kategori(Request $req)
    {
        $v = $this->validate($req, [
            'name'  => 'required|max:200',
            'deskripsi' => 'required|max:300',
        ]);
        if ($v) {
            $kategori = kategori_model::where('id_kategori', $req['id'])->update(['nama_kategori' => $req["name"], 'deskripsi' => $req["deskripsi"]]);

            if ($kategori) {
                session()->flash('berhasil', 'Data Anda Berhasil Diubah');
                return redirect('/kategori_buku');
            } else {
                session()->flash('gagal', 'Data Anda Gagal Diubah');
                return redirect('/ubah_kategori/' . $req["id"]);
            }
        }
    }
    public function hapus_kategori($id)
    {
        $member = kategori_model::where("id_kategori", $id);
        $member->delete();
        session()->flash('berhasil', 'Data Anda Berhasil Dihapus');
        return redirect('/kategori_buku');
    }

    public function insert_buku(Request $req)
    {
        $v = $this->validate($req, [
            'name'  => 'required|max:300',
            'pengarang' => 'required|max:300',
            'penerbit' => 'required|max:200',
            'tebal' => 'required|max:10',
            'thn_terbit' => 'required|date_format:Y-m-d',
            'edisi' => 'required|max:10',
            'jumlah' => 'required|max:10'

        ]);
        if ($v) {
            $buku = new buku_model();
            $buku->id_kategori = $req['id'];
            $buku->judul_buku = $req['name'];
            $buku->nama_pengarang = $req['pengarang'];
            $buku->nama_penerbit = $req['penerbit'];
            $buku->ketebalan = $req['tebal'];
            $buku->tahun_terbit = $req['thn_terbit'];
            $buku->edisi_buku = $req['edisi'];
            $buku->jumlah_buku = $req['jumlah'];
            $buku->created_by = Auth::user()->name;
            $buku->save();
            session()->flash('berhasil', 'Data Anda Berhasil Ditambahkan');
            return redirect('/detail_buku/' . $req["id"]);
        }
    }
    public function edit_buku($id)
    {
        $buku = buku_model::where('id', $id)->first();
        $kategori = kategori_model::all();
        return view('/edit_buku', ['var_buku' => $buku, 'var_kategori' => $kategori]);
    }
    public function proses_edit_buku(Request $req)
    {
        $v = $this->validate($req, [
            'name'  => 'required|max:300',
            'kategori' => 'required',
            'pengarang' => 'required|max:300',
            'penerbit' => 'required|max:200',
            'tebal' => 'required|max:10',
            'thn_terbit' => 'required|date_format:Y-m-d',
            'edisi' => 'required|max:10',
            'jumlah' => 'required|max:10'

        ]);
        if ($v) {
            $kategori = buku_model::where('id', $req['id'])->update(['id_kategori' => $req['kategori'], 'judul_buku' => $req["name"], 'nama_pengarang' => $req["pengarang"], 'nama_penerbit' => $req["penerbit"], 'ketebalan' => $req["tebal"], 'tahun_terbit' => $req["thn_terbit"], 'edisi_buku' => $req["edisi"], 'jumlah_buku' => $req["jumlah"], 'created_by' => Auth::user()->name]);
            if ($kategori) {
                session()->flash('berhasil', 'Data Anda Berhasil Diubah');
                return redirect('/buku');
            } else {
                session()->flash('gagal', 'Data Anda Gagal Diubah');
                return redirect('/detail_buku/ubah_buku/' . $req["id"]);
            }
        }
    }
    public function hapus_buku($id)
    {
        $member = buku_model::where("id", $id);
        $member->delete();
        session()->flash('berhasil', 'Data Anda Berhasil Dihapus');
        return redirect('/buku');
    }
    public function insert_peminjaman(Request $req)
    {
        $v = $this->validate($req, [
            'member'  => 'required',
            'buku' => 'required',
        ]);
        if ($v) {
            $peminjaman = new peminjaman_model();
            $peminjaman->id_member = $req['member'];
            $peminjaman->id_buku = $req['buku'];
            $peminjaman->id = $req['penginput'];
            $peminjaman->keadaan = 'Belum Dikembalikan';
            $peminjaman->save();

            $jml_buku = DB::table('buku')->where('id', '=', $req['buku'])->select('jumlah_buku')->get();
            $total = $jml_buku[0]->jumlah_buku - 1;
            // dd($total);
            $buku = buku_model::where('id', $req['buku'])->update(['jumlah_buku' => $total]);
            session()->flash('berhasil', 'Data Anda Berhasil Ditambahkan');
            return redirect('/peminjaman_buku');
        }
    }
    public function ubah_status($id)
    {
        $data = DB::table('peminjaman')->where('id_peminjaman', '=', $id)->select(DB::raw('datediff(updated_at,created_at) as total'))->get();
        if ($data[0]->total > 7) {
            $denda = 25000;
            $administrasi = 5000;
            $total = $denda + $administrasi;
        } else {
            $denda = 0;
            $administrasi = 5000;
            $total = $denda + $administrasi;
        }
        $peminjaman = peminjaman_model::where("id_peminjaman", $id)->update(['lama' => $data[0]->total, 'keadaan' => "Sudah Dikembalikan", 'updated_by' => Auth::user()->name, 'denda' => $denda, 'administrasi' => $administrasi, 'total_biaya' => $total]);
        // Total Buku
        $jmlh = DB::table('peminjaman')
            ->where([['peminjaman.id_peminjaman', '=', $id]])
            ->join('buku', 'peminjaman.id_buku', '=', 'buku.id')
            ->select('buku.*')->first();
        $total = $jmlh->jumlah_buku + 1;
        $buku = buku_model::where("id", $jmlh->id)->update(['jumlah_buku' => $total]);
        if ($peminjaman && $buku) {
            session()->flash('berhasil', 'Data Anda Berhasil Diubah');
            return redirect('/peminjaman_buku');
        } else {
            session()->flash('gagal', 'Data Anda Gagal Diubah');
            return redirect('/peminjaman_buku');
        }
    }
    public function hapus_peminjaman($id)
    {
        $member = peminjaman_model::where("id_peminjaman", $id);
        $member->delete();
        session()->flash('berhasil', 'Data Anda Berhasil Dihapus');
        return redirect('/peminjaman_buku');
    }
    // Ubah User
    public function ubah_user()
    {
        return view('edit_user');
    }
    public function proses_edit_user(Request $req)
    {
        $v = $this->validate($req, [
            'name'  => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($v) {
            if (\Hash::check($req['password'], Auth::user()->password)) {
                if ($req['email'] == Auth::user()->email) {
                    users_model::where('id', Auth::user()->id)->update(['name' => $req['name'], 'email' => $req["email"]]);
                    session()->flash('berhasil', 'Data Anda Berhasil Diubah');
                    return redirect('/home');
                } else {
                    $email = DB::table('users')->where('email', '=', $req['email'])->first();
                    if ($email) {
                        session()->flash('gagal', 'Data Anda Gagal Diubah');
                        return redirect('/ubah_user');
                    } else {
                        users_model::where('id', Auth::user()->id)->update(['name' => $req['name'], 'email' => $req["email"]]);
                        session()->flash('berhasil', 'Data Anda Berhasil Diubah');
                        return redirect('/home');
                    }
                }
            } else {
                session()->flash('gagal', 'Data Anda Gagal Diubah');
                return redirect('/ubah_user');
            }
        }
    }
}
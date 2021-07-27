<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Destinasi;
use App\Models\Kategori;
use Livewire\WithPagination;
use Auth;

class Destinasik extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

	public $id_destinasi;
	public $gambar_destinasi;
	public $nama_destinasi;
	public $alamat_destinasi;
	public $harga_destinasi;
	public $kategori_kecamatan;
	public $keterangan_destinasi;
	public $latitude_destinasi;
	public $longitude_destinasi;

	public $ids;
	public $id_destinasis;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

	public function clearform(){
        $this->id_destinasi = '';
        $this->gambar_destinasi = '';
        $this->nama_destinasi = '';
        $this->alamat_destinasi = '';
        $this->harga_destinasi = '';
        $this->kategori_kecamatan = 'Kategori Destinasi';
        $this->keterangan_destinasi = '';
        $this->latitude_destinasi = '';
        $this->longitude_destinasi = '';
    }

    public function SimpanData(){
    	$this->validate([
            'id_destinasi' => 'required',
            'gambar_destinasi' => 'required',
            'nama_destinasi' => 'required',
            'alamat_destinasi' => 'required',
            'harga_destinasi' => 'required',
            'kategori_kecamatan' => 'required',
            'keterangan_destinasi' => 'required',
            'latitude_destinasi' => 'required',
            'longitude_destinasi' => 'required',
        ], [
            'id_destinasi.required' => 'Wajib diisi !!',
            'gambar_destinasi.required' => 'Wajib diisi !!',
            'nama_destinasi.required' => 'Wajib diisi !!',
            'alamat_destinasi.required' => 'Wajib diisi !!',
            'harga_destinasi.required' => 'Wajib diisi !!',
            'kategori_kecamatan.required' => 'Wajib diisi !!',
            'keterangan_destinasi.required' => 'Wajib diisi !!',
            'latitude_destinasi.required' => 'Wajib diisi !!',
            'longitude_destinasi.required' => 'Wajib diisi !!',
        ]);

        Destinasi::create([
        	'id_user' => Auth::user()->id,
            'id_destinasi' => $this->id_destinasi,
            'gambar_destinasi' => $this->gambar_destinasi,
            'nama_destinasi' => $this->nama_destinasi,
            'alamat_destinasi' => $this->alamat_destinasi,
            'harga_destinasi' => $this->harga_destinasi,
            'kategori_kecamatan' => $this->kategori_kecamatan,
            'keterangan_destinasi' => $this->keterangan_destinasi,
            'latitude_destinasi' => $this->latitude_destinasi,
            'longitude_destinasi' => $this->longitude_destinasi,
        ]);
        session()->flash('pesan','Data Berhasil Disimpan !!!');
		$this->clearform();
    }

    public function detailData($id){
		$destinasik = Destinasi::where('id',$id)->first();
		$this->ids = $destinasik->id;
		$this->id_destinasi = $destinasik->id_destinasi;
		$this->gambar_destinasi = $destinasik->gambar_destinasi;
		$this->nama_destinasi = $destinasik->nama_destinasi;
		$this->alamat_destinasi = $destinasik->alamat_destinasi;
		$this->harga_destinasi = $destinasik->harga_destinasi;
		$this->kategori_kecamatan = $destinasik->kategori_kecamatan;
		$this->keterangan_destinasi = $destinasik->keterangan_destinasi;
		$this->latitude_destinasi = $destinasik->latitude_destinasi;
		$this->longitude_destinasi = $destinasik->longitude_destinasi;
	}

	public function UbahData(){
    	$this->validate([
            'id_destinasi' => 'required',
            'gambar_destinasi' => 'required',
            'nama_destinasi' => 'required',
            'alamat_destinasi' => 'required',
            'harga_destinasi' => 'required',
            'kategori_kecamatan' => 'required',
            'keterangan_destinasi' => 'required',
            'latitude_destinasi' => 'required',
            'longitude_destinasi' => 'required',
        ], [
            'id_destinasi.required' => 'Wajib diisi !!',
            'gambar_destinasi.required' => 'Wajib diisi !!',
            'nama_destinasi.required' => 'Wajib diisi !!',
            'alamat_destinasi.required' => 'Wajib diisi !!',
            'harga_destinasi.required' => 'Wajib diisi !!',
            'kategori_kecamatan.required' => 'Wajib diisi !!',
            'keterangan_destinasi.required' => 'Wajib diisi !!',
            'latitude_destinasi.required' => 'Wajib diisi !!',
            'longitude_destinasi.required' => 'Wajib diisi !!',
        ]);

        Destinasi::where('id', $this->ids)->update([
        	'id_user' => Auth::user()->id,
            'id_destinasi' => $this->id_destinasi,
            'gambar_destinasi' => $this->gambar_destinasi,
            'nama_destinasi' => $this->nama_destinasi,
            'alamat_destinasi' => $this->alamat_destinasi,
            'harga_destinasi' => $this->harga_destinasi,
            'kategori_kecamatan' => $this->kategori_kecamatan,
            'keterangan_destinasi' => $this->keterangan_destinasi,
            'latitude_destinasi' => $this->latitude_destinasi,
            'longitude_destinasi' => $this->longitude_destinasi,
        ]);
        session()->flash('pesan','Data Berhasil Diubah !!!');
    }

	public function deleteData($id){
		Destinasi::where('id',$id)->delete();
		session()->flash('pesan','Data Berhasil Dihapus !!!');
	}

    public function statusku($id){
        $Destinasik = Destinasi::where('id',$id)->first();
        $idk = $Destinasik->id;
        $statusk = $Destinasik->status;
        if ($statusk==0) {
            Destinasi::where('id', $idk)->update([
            'status_destinasi' => 1,
            ]);
        }else if($statusk==1){
            Destinasi::where('id', $idk)->update([
            'status_destinasi' => 0,
            ]);
        }
        
    }

    public function render()
    {
        if (Auth::user()->level==1) {
            return view('livewire.destinasik', [
            'destinasi' => Destinasi::where('kategori_kecamatan', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5),
            'kategori' => Kategori::get(),
            ])->layout('destinasi.v_destinasik');
        }else if (Auth::user()->level==2) {
            return view('livewire.destinasik', [
            'destinasi' => Destinasi::where('id_user', Auth::user()->id)->where('kategori_kecamatan', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5),
            'kategori' => Kategori::get(),
            ])->layout('destinasi.v_destinasik');
        }
        return view('livewire.destinasik', [
        	'destinasi' => Destinasi::where('id_user', Auth::user()->id)->get(),
        	'kategori' => Kategori::get(),
        ])->layout('destinasi.v_destinasik');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Voucher;
use Livewire\WithPagination;

class Vouchers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

	public $id_voucher;
	public $nominal;
	public $status;

	public $ids;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

	public function clearform(){
        $this->id_voucher = '';
        $this->nominal = '';
    }

    public function SimpanData(){
    	$this->validate([
            'id_voucher' => 'required',
            'nominal' => 'required',
        ], [
            'id_voucher.required' => 'Wajib diisi !!',
            'nominal.required' => 'Wajib diisi !!',
        ]);

        Voucher::create([
            'id_voucher' => $this->id_voucher,
            'nominal' => $this->nominal,
            'status' => 0,
        ]);
        session()->flash('pesan','Data Berhasil Disimpan !!!');
		$this->clearform();
    }

    public function detailData($id){
		$voucherk = Voucher::where('id',$id)->first();
		$this->ids = $voucherk->id;
		$this->id_voucher = $voucherk->id_voucher;
		$this->nominal = $voucherk->nominal;
	}


    public function UbahData(){
    	$this->validate([
            'id_voucher' => 'required',
            'nominal' => 'required',
        ], [
            'id_voucher.required' => 'Wajib diisi !!',
            'nominal.required' => 'Wajib diisi !!',
        ]);

        Voucher::where('id', $this->ids)->update([
            'id_voucher' => $this->id_voucher,
            'nominal' => $this->nominal,
        ]);
        session()->flash('pesan','Data Berhasil Diubah !!!');
		
    }

    public function deleteData($id){
		Voucher::where('id',$id)->delete();
		session()->flash('pesan','Data Berhasil Dihapus !!!');
	}

    public function render()
    {
        return view('livewire.voucher', [
        	'vouchers' => Voucher::where('id_voucher', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5),
        ])->layout('voucher.v_voucher');
    }
}

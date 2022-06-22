<?php

namespace Nue\Env\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Nue\Env\Models\Env;

class EnvController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Env Manager';

    private $data;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() 
    {
        $this->data = new Env();
        
        $this->prefix = 'nue.env';
        $this->view = 'nue-env::';

        $this->tCreate = "$this->title baru berhasil dibuat!";
        $this->tUpdate = "$this->title berhasil diubah!";
        $this->tDelete = "Some $this->title berhasil dihapus!";

        view()->share([
            'title' => $this->title, 
            'view' => $this->view, 
            'prefix' => $this->prefix
        ]);
    }

    /**
     * Index interface.
     *
     * @param Request $request
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = $this->data->getEnv();

        if ( $request->has('datatable') ) {
            return $this->datatable($data);
        }

        return view("$this->view.index", compact('data'));
    }

    /**
     * Tampilkan halaman untuk menambah data
     * 
     * @return Response|View
     */
    public function create() 
    {
        return view("$this->view.create");
    }

    /**
     * Lakukan penyimpanan data ke database
     * 
     * @param Request $request
     * @return Response|View
     */
    public function store(Request $request) 
    {
        $this->validate($request, [
            'key' => 'required', 
            'value' => 'required', 
        ]);

        $simpan = new $this->data;
        
        $simpan->key = $request->key;
        $simpan->value = $request->value;

        $simpan->save();
        
        notify()->flash($this->tCreate, 'success');
        return redirect(route("$this->prefix.index"));
    }

    /**
     * Tampilkan halaman perubahan data
     * 
     * @param Int $id
     * @return Response|View
     */
    public function edit(Request $request, $id)
    {
        $edit = $this->data->findOrFail($id);
    
        return view("$this->view.edit", compact('edit'));
    }

    /**
     * Lakukan perubahan data sesuai dengan data yang diedit
     * 
     * @param Request $request
     * @param Int $id
     * @return Response|View
     */
    public function update(Request $request, $id)
    {
        $edit = $this->data->findOrFail($id);

        $this->validate($request, [
            'key' => 'required', 
            'value' => 'required', 
        ]);

        $edit->key = $request->key;
        $edit->value = $request->value;
        $edit->save();

        notify()->flash($this->tUpdate, 'success');
        return redirect(route("$this->prefix.index"));
    }

    /**
     * Lakukan penghapusan data yang tidak diinginkan
     * 
     * @param Request $request
     * @param Int $id
     * @return Response|String
     */
    public function destroy(Request $request, $id)
    {
        if($request->has('pilihan')):
            foreach($request->pilihan as $temp):
                $this->data->deleteEnv($temp);
            endforeach;
            
            notify()->flash($this->tDelete, 'success');
            return redirect()->back();
        endif;
    }

    /**
     * Datatable API
     * 
     * @param  $data
     * @return Datatable
     */
    public function datatable($data) 
    {
        return datatables()->of($data)
            ->editColumn('pilihan', function($data) {
                $return = '<div class="form-check">
                        <input class="form-check-input pilihan" type="checkbox" name="pilihan[]" id="pilihan['.$data['id'].']" value="'.$data['id'].'"> 
                        <label class="form-check-label" for="pilihan['.$data['id'].']"></label>
                    </div>';

                return $return;
            })
            ->editColumn('key', function($data) {
                return '<code>'.$data['key'].'</code>';
            })
            ->editColumn('action', function($data) {
                return '<a class="text-info" href="'.route("$this->prefix.edit", $data['id']).'">
                    <span class="iconify h4 text-info mb-1" data-icon="heroicons-solid:pencil-alt"></span>
                    Edit
                </a>';
            })
            ->escapeColumns(['*'])->toJson();
    }
}
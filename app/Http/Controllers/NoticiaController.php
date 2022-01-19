<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Noticia,
    App\Models\NoticiaCategoria;

use Yajra\DataTables\Facades\DataTables;

class NoticiaController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $noticia = Noticia::all();

            return Datatables::of($noticia)
                ->addIndexColumn()
                ->addColumn('borrar', function ($noticia) {
                    $btn    = '<a href="javascript:void(0)" title="Elimina noticia"><i class="fas fa-trash text-danger borrar" id="' . $noticia['id'] . '"></i></a>';
                    return $btn;
                })
                ->rawColumns(['titulo', 'borrar'])
                ->make(true);
        }
        return view('admin.noticias.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.noticias.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $noticia = Noticia::create($request->all());

        $notification = array(
            'message' => 'Noticia creado !',
            'alert-type' => 'success'
        );

        return redirect()->route('noticias.index')->with($notification);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Noticia::find($id);
        return view('admin.noticias.show', compact('noticia'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia       = Noticia::find($id);
        return view('admin.noticias.edit', compact('noticia'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $noticia = Noticia::find($id);
        $noticia->update($request->all());

        $notification = array(
            'message' => 'Noticia actualizado !',
            'alert-type' => 'success'
        );

        return redirect()->route('noticias.edit', $noticia->id)->with($notification);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Noticia::find($request->id)->delete();

        return response()->json();
    }
}

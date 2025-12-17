<?php

namespace App\Http\Controllers;
use App\Models\Books;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
{
    $books = Books::select([
        'id',
        'title',
        'author',
        'category',
        'available'
    ]);

    if ($request->ajax()) {
        return DataTables::of($books)
        ->editColumn('available', function ($row) {
        return $row->available == 1 ? 'Yes' : 'No';})

            ->addColumn('action', function ($row) {
                return '
                <a href="javascript:void(0)" class="btn btn-info btn-sm editButton" data-id="'.$row->id.'">Edit</a>
                <a href="javascript:void(0)" class="btn btn-danger btn-sm deleteButton" data-id="'.$row->id.'">Delete</a>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    return view('create');
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
    // name="title"
    // name="author"
    // name="category"
    // name="available"
  

    if($request->book_id){
            
      $book = Books::find($request->book_id);
      if(!$book){
           abort(404);    
      }
          
      $book->update([
    'title'     => $request->title,
    'author'    => $request->author,
    'category'  => $request->category,
    'available' => $request->available,

      ]);


return response()->json([
'success' => true,
 'message' => 'Book updated successfully'


]);


    }
    else{
           

    $request->validate([
    'title'     => 'required',
    'author'    => 'required',
    'category'  => 'required',
    'available' => 'required',
]);
         
Books::create([
    'title'     => $request->title,
    'author'    => $request->author,
    'category'  => $request->category,
    'available' => $request->available,
]);

 return response()->json([
'success' => true,
 'message' => 'Book added successfully'


]);
    }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
public function update(Request $request)
{
    $request->validate([
        'id' => 'required|exists:books,id',
        'title' => 'required',
        'author' => 'required',
        'category' => 'required',
        'available' => 'required',
    ]);

    $book = Books::find($request->id);
    $book->update([
        'title' => $request->title,
        'author' => $request->author,
        'category' => $request->category,
        'available' => $request->available,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Book updated successfully'
    ]);
}

  
public function edit(string $id)
{
    $book = Books::find($id);

    if(!$book){
        abort(404);
    }

    return response()->json($book); // JSON response
}

    /**
     * Remove the specified resource from storage.
     */
 public function destroy(string $id)
{
    $book = Books::find($id);

    if(!$book){
        return response()->json(['error'=>'Category not found'],404);
    }

    $book->delete();

    return response()->json([
        'success'=>'Category deleted successfully'
    ],200); // 200 OK for delete
}

}

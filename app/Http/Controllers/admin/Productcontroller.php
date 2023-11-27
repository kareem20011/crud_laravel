<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Color;
use App\Models\User;
use App\Models\Sales_order;
use App\Models\product_color;


class Productcontroller extends Controller
{
    function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        $cats = Category::all();
        $products = Product::with('get_category')->get();
        return view('admin.product')->with(['items'=>$products,'cats'=>$cats,'colors'=>$colors]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // ==================validation========
        $validator = Validator::make($request->all(),$this->rules , $this->messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        // ==================validation========

        // =================upload file==========
        $path='uploads';
        $ext = $request->img->getClientOriginalExtension();
        $file_name=time().'.'.$ext;
        $request->img->move($path,$file_name);
        $data = $request->all();
        $data['img']=$file_name;

        $product=Product::create($data);
        $product->get_color()->attach($request->color_id);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colors = Color::all();
        $cats = Category::all();
        $data = Product::find($id);
        $selected_colors = product_color::where('product_id',$id)->pluck('color_id')->toArray();
        return view('admin.product_edit')->with(['data'=>$data,'colors'=>$colors,'cats'=>$cats,'selected_colors'=>$selected_colors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->img){
            $path='uploads';
            $ext = $request->img->getClientOriginalExtension();
            $file_name=time().'.'.$ext;
            $request->img->move($path,$file_name);

            Product::where('id',$request->id)->update([
                'name'=>$request->name,
                'price'=>$request->price,
                'img'=>$file_name,
            ]);

            $product = Product::find($request->id);
            $product->get_color()->sync($request->color_id);
        }else{
            Product::where('id',$request->id)->update([
                'name'=>$request->name,
                'price'=>$request->price,
            ]);

            $product = Product::find($request->id);
            $product->get_color()->sync($request->color_id);
        }

        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        product_color::where('product_id',$id)->delete();
        return redirect()->back();

    }

   public $rules=[
        'name' => 'required|max:10',
        'price' => 'required|numeric',
    ];

    public $messages= [
        'name.required' => 'الاسم مطلوب',
        'name.max' => 'الحد الاقصى 10 حروف',
        'price.required'=> 'السعر مطلوب'
    ];

    public function ajax_test(){
        $cats=Category::all();
        return view('admin.ajax_test')->with('cats',$cats);
    }

    public function get_products(Request $request){
        $result = Product::where('category_id',$request->id)->get();
        return $result;
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller {
    public function Index() {
        $products = DB::table('products')->latest()->paginate(3);
        if (session('success')) {
            Alert::toast(session('success'), 'success');
        }
        return view('product.index', compact('products'));
    }

    public function Create() {
        return view('product.create');
    }

    public function Store(Request $request) {
        $data = $this->Validation($request);
        //Insert Into Database
        $data                    = array();
        $data['product_name']    = $request->product_name;
        $data['product_code']    = $request->product_code;
        $data['product_details'] = $request->product_details;

        $image = $request->file('product_logo');
        if ($image) {
            $image_name     = date('day_H_s_i');
            $ext            = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name . '.' . $ext;
            $upload_path    = 'public/media/';
            $image_url      = $upload_path . $image_fullName;
            $success        = $image->move($upload_path, $image_fullName);

            $data['product_logo'] = $image_url;
            $product              = DB::table('products')->insert($data);

            return redirect()->route('product.index')->withSuccess('Your Product has been added!');
        }
    }

    public function Show($id) {
        $product = DB::table('products')->where('id', $id)->first();
        return view('product.show', compact('product'));
    }

    public function Edit($id) {
        $product = DB::table('products')->where('id', $id)->first();
        return view('product.edit', compact('product'));
    }

    public function Update(Request $request, $id) {
        $data = $this->Validation($request);

        $old_logo                = $request->old_logo;
        $data                    = array();
        $data['product_name']    = $request->product_name;
        $data['product_code']    = $request->product_code;
        $data['product_details'] = $request->product_details;

        $image = $request->file('product_logo');
        if ($image) {
            unlink($old_logo);
            $image_name     = date('day_H_s_i');
            $ext            = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name . '.' . $ext;
            $upload_path    = 'public/media/';
            $image_url      = $upload_path . $image_fullName;
            $success        = $image->move($upload_path, $image_fullName);

            $data['product_logo'] = $image_url;
            $product              = DB::table('products')->where('id', $id)->update($data);

            return redirect()->route('product.index')->withSuccess('Your Product has been updated!');
        }
    }

    public function Delete($id) {
        $data  = DB::table('products')->where('id', $id)->first();
        $image = $data->product_logo;
        unlink($image);
        $delete = DB::table('products')->where('id', $id)->delete();
        return redirect()->route('product.index')->withSuccess('Your Product has been deleted!');
    }

    public function Validation($request) {
        // input field Validation
        return $this->validate($request, [
            'product_name'    => 'required',
            'product_code'    => 'required',
            'product_details' => 'required',
            'product_logo'    => 'required',
        ], [
            'product_name.required'    => 'Please insert Product Name',
            'product_code.required'    => 'Please insert Product Code',
            'product_details.required' => 'Please write about Product Details',
            'product_logo.required'    => 'Please insert Product Image',
        ]);
    }
}

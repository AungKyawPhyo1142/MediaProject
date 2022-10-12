<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // go category page
    public function showCategory(){
        $data = Category::select('id','title','description')->get();
        return view('admin.category.index',compact('data'));
    }

    // insert category
    public function createCategory(Request $req){

        $validator = $this->checkValidation($req);

        if($validator->fails()){
            return back()->withErrors($validator)
                        ->withInput();
        }

        $data = $this->getCategoryData($req);
        Category::create($data);
        return back()->with(['insertSuccess'=>'Category inserted successfully!']);
    }

    // delete category
    public function deleteCategory($id){
        Category::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Category deleted successfully!']);
    }

    // get category data
    private function getCategoryData($req){
        return [
            'title' => $req->categoryName,
            'description' => $req->categoryDescription,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }

    // check validation
    private function checkValidation($req){
        $validator = Validator::make($req->all(),[
            'categoryName' => 'required',
            'categoryDescription' => 'required'
        ]);
        return $validator;
    }
}

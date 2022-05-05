<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategorySub;
use App\Models\ImageProduct;
use App\Models\ProductAttr;
use App\Models\AttrProduct;
use App\Helper\Cart;
use App\Models\Banner;

class HomeController extends Controller
{
    public function home(){
        $banner = Banner::find(1);
        $category = Category::all()->sortByDesc("id");
        // Mẫu mới
        $product = Product::all()->sortByDesc("id")->take(8);
        // Top sale
        $productSale = Product::orderBy('sale_price', 'ASC')->take(8)->get();
        // Top bán chạy
        $productTopSale = Product::orderBy('quantity', 'ASC')->take(4)->get();

        $cart = new Cart();
        $totalQuantity = $cart->getTotalQuantity();
        return view('home', compact('product','category','totalQuantity','banner','productSale','productTopSale'));
    }


    // Trang product detail
    public function product($id){
        
        
        $category = Category::all()->sortByDesc("id");
        $product = Product::find($id);
        $images = ImageProduct::where('product_id', $id)->pluck('images')->toArray();

        $cate_id = $product->category_id;
        $productSame = Product::where('category_id',$cate_id)->where('id','<>', $id)->get();

        $attr = ProductAttr::where('id_product', $id)->pluck('id_attr')->toArray();
        $attrColor = AttrProduct::where('name','color')->pluck('id')->toArray();
        $attrSize = AttrProduct::where('name','size')->pluck('id')->toArray();

            // Lấy ra danh sách các màu
            $colorArr = [];
            foreach($attr as $key => $value){
                if(in_array($value,$attrColor)){
                    $colorArr[$key] = $value;   
                }
            }
            $color = AttrProduct::whereIn('id',$colorArr)->pluck('value')->toArray();

            // Lấy ra danh sách các size
            $sizeArr = [];
            foreach($attr as $key => $value){
                if(in_array($value,$attrSize)){
                    $sizeArr[$key] = $value;   
                }
            }
            $size = AttrProduct::whereIn('id',$sizeArr)->pluck('value')->toArray();
            

        return view('product-detail',compact('category','product','images','color','size','productSame'));
    }

    // Sản phẩm theo danh mục
    public function productCate($id){
        $nameCate = CategorySub::find($id);
        $product = Product::where('category_id',$id)->get();

        
        return view('product-cate',compact('product','nameCate'));
    }

    // Sản phẩm tìm kiếm
    public function search(Request $request){
        $key = $request->key;
        $product = Product::where('name', 'LIKE', "%{$key}%")->get();

        return view('product-search',compact('product','key'));
    }

    // Trang xem tất cả mẫu mới
    public function seeAll(){
        $name = 'Mẫu mới';
        $product = Product::all()->sortByDesc("id");
        return view('see-all',compact('product','name'));
    }
    // Tất cả top sale
    public function seeAllSale(){
        $name = 'Top sale';
        $product = Product::orderBy('sale_price', 'ASC')->get();
        return view('see-all',compact('product','name'));
    }

    // Tất cả top bán chạy
    public function seeAllBuy(){
        $name = 'Top bán chạy';
        $product = Product::orderBy('quantity', 'ASC')->get();
        return view('see-all',compact('product','name'));
    }



    


}

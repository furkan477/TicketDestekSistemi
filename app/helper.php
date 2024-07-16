<?php
use App\Models\Category;
    if(!function_exists('Kategorilerim')){
        function Kategorilerim($cat_id = null){

            $categories = Category::where('cat_ust',$cat_id)->get();

            foreach($categories as $category){
                if($category->subcategory->count() > 0){
                    Kategorilerim($category->id);
                }
            }
        }
    }
?>
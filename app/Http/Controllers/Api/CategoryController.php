<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helper\ApiMsg;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\MainResource;
use App\Http\Resources\SubCategoryResource;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    //


    public function allCategory(Request $request)
    {
        $categories = Category::where('status','active')->get();
        return response()->json(
            new MainResource(CategoryResource::collection($categories),Response::HTTP_OK,ApiMsg::getMsg($request,'success_get'))
            ,Response::HTTP_OK);
    }

    public function singleCategory(Request $request , Category $category)
    {
        return response()->json(
            new MainResource(new CategoryResource($category),Response::HTTP_OK,ApiMsg::getMsg($request,'success_get'))
            ,Response::HTTP_OK);
    }
    public function subCategory(Request $request , SubCategory $subCategory)
    {
        return response()->json(
            new MainResource(new SubCategoryResource($subCategory),Response::HTTP_OK,ApiMsg::getMsg($request,'success_get'))
            ,Response::HTTP_OK);
    }
}

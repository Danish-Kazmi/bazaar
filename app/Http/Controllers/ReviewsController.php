<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Reviews;
use App\Models\ReviewsImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ReviewsController extends Controller
{
    public function index($product_id){

        $averageRating = Reviews::where('product_id', $product_id)
                               ->where('active', 1)
                               ->where('is_deleted', 0)
                               ->avg('rating');

        $reviews = Reviews::where('product_id', $product_id)
                         ->where('active', 1)
                         ->where('is_deleted', 0)
                         ->count();

        return response()->json([
            'averageRating' => $averageRating,
            'reviews' => $reviews,
        ]);
    }

    public function saveReview(Request $request){
        // return $request->all();
        $validatedData = $request->validate([
            'review_description' => 'required|string|max:1000',
            'rating' => 'required|integer|between:1,5',
            'product_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $review = new Reviews();
        $review->user_id = 7;
        $review->product_id = $validatedData['product_id'];
        $review->review_description = $validatedData['review_description'];
        $review->rating = $validatedData['rating'];
        $review->save();
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('review_images', 'public');
    
                $reviewImage = new ReviewsImages();
                $reviewImage->review_id = $review->id;
                $reviewImage->image = $imagePath;
                $reviewImage->save();
            }
        }
        return response()->json(['message' => 'Review saved successfully']);
    }

    public function reviewsListing($product_id)
    {
        return Inertia::render('Bazaar/Reviews',['productId' => $product_id]);
    }
    public function showProductReviews($product_id)
    {
        $product = Product::findOrFail($product_id);

        $reviews = $product->reviews()
            ->where('active', 1)
            ->where('is_deleted', 0)
            ->with(['user', 'review_images'])
            ->get();
        $reviews->each(function ($review) {
            $review->review_images->transform(function ($image) {
                // Use a default image if image_path is empty
                $image->path = $image->image 
                    ? Storage::url($image->image) 
                    : Storage::url('product_images/demo.jpeg');
                return $image;
            });
        });
        return response()->json([
            'product' => $product,
            'reviews' => $reviews,
        ]);
    }
}

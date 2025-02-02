<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\ProductImage;
use Validator;
use Str;
use File;

class ProductController extends Controller
{
    public function index(){
        $data = [
            'products' => Product::all()->sortByDesc('id'),
            'title' => 'Products'
        ];

        return view('admin.product.index', $data);
    }

    public function create(){
        return view('admin.product.create', ['title' => 'Add Product']);
    }

    public function check(Request $request){
        $name = Product::where('title', $request->title)->exists();
        if($name){
            return response()->json(['status' => 'success', 'messages' => 'not available', 'code' => 200], 200);
        }else{
            return response()->json(['status' => 'success', 'messages' => 'available', 'code' => 201], 201);
        }
    }

    public function save(Request $request){
        $validator = Validator($request->all(), [
            'category' => 'required',
            'title' => 'required|unique:products',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'desc' => 'required',
        ]);
    
        if($validator->fails()){
            return redirect()->route('productCreate')->withErrors($validator)->withInput();
        }else{
            $product = Product::create([
                'category_id' => $request->category,
                'title' => $request->title,
                'price' => $request->price,
                'stock' => $request->stock,
                'desc' => $request->desc,
            ]);
    
            if ($request->generated_image) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $request->generated_image
                ]);
            }
    
            return redirect()->route('productAddImages', ['product' => $request->title]);
        }
    }

    public function addImages($product){

        $productData = Product::where('title', $product)->first();

        $data = [
            'title' => 'Add Images - '. str_replace('-', ' ', $product),
            'product' => $productData
        ];

        return view('admin.product.addImages', $data);
    }

    public function getImages(Request $request){
        $data = ProductImage::where('product_id', $request->id_products)->orderByDesc('id')->get();
        return response()->json($data);
    }

    public function addImagesSave(Request $request){
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('shop/products'), $imageName);

        ProductImage::create([
            'product_id' => $request->id_product,
            'path' => $imageName
        ]);

        return response()->json(['status' => 'success', 'code' => 200], 200);
    }

    public function deleteImages(Request $request){
        $filename = $request->get('filename');
        ProductImage::where('path', $filename)->delete();
        $paths = public_path().'/shop/products/'. $filename;
        if(file_exists($paths)){
            unlink($paths);
        }
        return response()->json(['status' => 'success', 'code' => 200], 200);
    }

    public function edit($product){
        $productData = Product::where('title', $product)->first();

        $data = [
            'product' => $productData,
            'title' => 'Edit product '. str_replace('-', ' ', $product)
        ];

        return view('admin.product.edit', $data);
    }

    public function editSave(Request $request, $product, $id){

        $validatorCheck = '';
        if($product != $request->title){
            $validatorCheck = 'unique:products';
        }

        $validator = Validator($request->all(), [
            'category' => 'required',
            'title' => 'required|'.$validatorCheck,
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'desc' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->route('productEdit', ['product' => $product, 'id' => $id])->withErrors($validator)->withInput();
        }else{
            Product::where('id', $id)->update([
                'category_id' => $request->category,
                'title' => $request->title,
                'price' => $request->price,
                'stock' => $request->stock,
                'desc' => $request->desc,
            ]);

            return redirect()->route('productEdit', $request->title)->with('success', 'Data updated');
        }
    }

    public function delete($id){
        $product = Product::where('id', $id)->first();

        $dataImage = [];

        foreach($product->productImage as $i => $item){
            array_push($dataImage, public_path().'/shop/products/'.$item->path);
        }

        File::delete($dataImage);

        Product::destroy($id);
        return redirect()->route('products')->with('success', 'Data product deleted');
    }

    public function generateDescription(Request $request)
{
    $title = $request->input('title');

    if (!$title) {
        return response()->json(['error' => 'Veuillez entrer un titre'], 400);
    }

    $apiKey = env('GEMINI_KEY');

    if (empty($apiKey)) {
        return response()->json(['error' => 'Clé API manquante ou invalide'], 500);
    }

    $url = "https:

    $prompt = "Génère une description concise et attrayante pour un produit e-commerce intitulé: '$title'. 
               La description doit être en français, comporter entre 20 et 30 mots, et mettre en valeur 
               les caractéristiques du produit sans être trop technique.";

    $payload = [
        "contents" => [
            [
                "role" => "user",
                "parts" => [
                    ["text" => $prompt]
                ]
            ]
        ],
        "generationConfig" => [
            "temperature" => 0.7,
            "topP" => 0.9,
            "topK" => 40,
            "maxOutputTokens" => 200
        ]
    ];

    try {
        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, $payload);

        if ($response->failed()) {
            return response()->json([
                'error' => 'Erreur API',
                'status' => $response->status(),
                'response' => $response->body()
            ], $response->status());
        }

        $responseData = json_decode($response->body(), true);
        $generatedText = $responseData['candidates'][0]['content']['parts'][0]['text'] ?? '';

        $generatedText = trim(str_replace(['"', '*'], '', $generatedText));

        return response()->json([
            'status' => 'success',
            'description' => $generatedText
        ]);

    } catch (\Exception $e) {
        \Log::error('Erreur API IA : ' . $e->getMessage());
        return response()->json([
            'error' => 'Erreur de communication avec IA',
            'message' => $e->getMessage()
        ], 500);
    }
}

public function generateImage(Request $request)
{
    $title = $request->input('title');
    $desc = $request->input('desc');

    if (!$title || !$desc) {
        return response()->json(['error' => 'Veuillez fournir un titre et une description'], 400);
    }

    $apiKey = env('HUGGINGFACE_API_KEY');

    if (empty($apiKey)) {
        return response()->json(['error' => 'Clé API Hugging Face manquante'], 500);
    }

    $model = "stabilityai/stable-diffusion-xl-base-1.0";
    $prompt = "A detailed and realistic e-commerce product image for: $title. Product description: $desc. High quality, professional product photo on white background.";

    try {
        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'Authorization' => "Bearer $apiKey",
            'Content-Type'  => 'application/json'
        ])->timeout(120)->post("https:
            'inputs' => $prompt,
            'options' => ['wait_for_model' => true]
        ]);

        if ($response->failed()) {
            \Log::error('Hugging Face API Error', [
                'status' => $response->status(),
                'response' => $response->body()
            ]);
            return response()->json([
                'error' => 'Erreur API Hugging Face',
                'status' => $response->status(),
                'message' => json_decode($response->body())->error ?? $response->body()
            ], $response->status());
        }

        $imageData = $response->body();
        $imageName = 'product_' . time() . '.png';
        $publicPath = 'shop/products/' . $imageName;
        $fullPath = public_path($publicPath);

        file_put_contents($fullPath, $imageData);

        return response()->json([
            'status' => 'success',
            'image_url' => asset($publicPath),
            'image_name' => $imageName
        ]);

    } catch (\Exception $e) {
        \Log::error('Image generation error: ' . $e->getMessage());
        return response()->json([
            'error' => 'Erreur lors de la génération de l\'image',
            'message' => $e->getMessage()
        ], 500);
    }
}
    
}
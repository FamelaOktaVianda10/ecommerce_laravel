<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\FlashSale;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $flashSales = FlashSale::where('status', true)->get();

        return view('pages.user.index', compact('products', 'flashSales'));
    }
    public function detail_product($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.user.detail', compact('product'));
    }
    public function purchase($productId, $userId)
    {
        $product = Product::findOrFail($productId);
        $user = User::findOrFail($userId);
    
        if ($user->point >= $product->price) {
            $totalPoints = $user->point - $product->price;
    
            $user->update([
                'point' => $totalPoints,
            ]);
    
            Alert::success('Berhasil!', 'Produk berhasil dibeli!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Point anda tidak cukup!');
            return redirect()->back();

        }
    }
    public function purchase_flashSale($flashSaleId, $userId)
    {
        $flashSale = FlashSale::findOrFail($flashSaleId);
        $user = User::findOrFail($userId);

        // Pastikan flash sale masih aktif dan stok tersedia
        if ($flashSale->status && $flashSale->stock > 0) {
            if ($user->point >= $flashSale->discount_price) {
                $totalpoints = $user->point - $flashSale->discount_price;

                // Update poin pengguna dan kurangi stok flash sale
                $user->update([
                    'point' => $totalpoints,
                ]);

                $flashSale->decrement('stock');  // Kurangi stok sebanyak 1

                // Jika stok habis, tandai flash sale sebagai tidak aktif
                if ($flashSale->stock == 0) {
                    $flashSale->update(['status' => false]);
                }

                Alert::success('Berhasil!', 'Produk Flash Sale berhasil dibeli!');
                return redirect()->back();
            } else {
                // Jika poin tidak cukup
                Alert::error('Gagal!', 'Poin Anda tidak cukup untuk membeli produk ini!');
                return redirect()->back();
            }
        } else {
            // Jika flash sale tidak aktif atau stok habis
            Alert::error('Gagal!', 'Produk Flash Sale sudah habis atau tidak aktif.');
            return redirect()->back();
        }
    }

}
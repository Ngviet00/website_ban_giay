<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseHistory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected Product $product;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $products = $this->product
            ->query()
            ->whereHas('category', function ($q) {
                $q->statusActive()->whereNull('deleted_at');
            })
            ->get();

        return view('home', compact('products'));
    }

    public function product()
    {
        $products = $this->product
            ->query()
            ->whereHas('category', function ($q) {
                $q->statusActive()->whereNull('deleted_at');
            })
            ->get();

        return view('product', compact('products'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function cart()
    {
        $carts = Cart::content();

        return view('cart', compact('carts'));
    }

    public function addCart(Request $request)
    {
        $item = Cart::content()->firstWhere('id', $request->id);
        if ($item) {
            Cart::update(
                $item->rowId,
                [
                    'qty' => (int)$item->qty + (int)$request->quantity,
                    'options' => [
                        'image' => $request->image,
                        'total_money' => ((int)$item->qty + (int)$request->quantity) * (int)$request->price
                    ],
                ]
            );
        } else {
            Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'qty' => $request->quantity,
                'price' => $request->price,
                'weight' => 0,
                'options' => [
                    'image' => $request->image,
                    'total_money' => (int)$request->quantity * (int)$request->price,
                ],
                'taxRate' => 0
            ]);
        }

        session()->flash('success', 'Success');

        return redirect(route('cart'));
    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);

        session()->flash('success', 'Success');

        return redirect(route('cart'));
    }

    public function clearCart()
    {
        Cart::destroy();

        session()->flash('success', 'Success');

        return redirect(route('cart'));
    }

    public function updateCart(Request $request)
    {
        $carts = Cart::content();

        $ids = $request->ids;
        $quantity = $request->quantity;
        $images = $request->images;
        $prices = $request->prices;

        foreach ($ids as $key => $id) {
            $item = $carts->firstWhere('id', $id);
            Cart::update(
                $item->rowId,
                [
                    'qty' => (int)$quantity[$key],
                    'options' => [
                        'image' => $images[$key],
                        'total_money' => (int)$quantity[$key] * (int)$prices[$key]
                    ],
                ]
            );

        }

        return redirect(route('cart'));
    }

    public function checkOut()
    {
        if (Cart::count() == 0) {
            return redirect()->route('cart');
        }

        if (!auth()->user()) {
            return redirect()->route('login', ['page' => 'cart']);
        }

        return view('check-out');
    }

    public function ordered()
    {
        return view('ordered');
    }

    public function search(Request $request)
    {
        $products = Product::query()
            ->when($request->keyword && !empty($request->keyword), function ($q) use ($request) {
                $q->where('name', 'LIKE', "%{$request->keyword}%");
            })
            ->get();
        return view('search', compact('products'));
    }

    public function submitOrdered(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|numeric',
            'address' => 'required|max:255',
        ]);

        foreach (Cart::content() as $key => $cart) {
            PurchaseHistory::query()->create([
                'member_id' => auth()->user()->id,
                'product_id' => $cart->id,
                'price' => $cart->price,
                'quantity' => $cart->qty,
                'total_money' => $cart->options->total_money,
                'status' => 1,
                'name' => $cart->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'payment_method' => $request->payment_method
            ]);
        }

        return redirect()->route('ordered');
    }
}

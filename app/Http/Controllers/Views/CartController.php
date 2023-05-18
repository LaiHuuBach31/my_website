<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Mail\VerifyOrder;
use App\Models\Cart;
use App\Models\CartAttr;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Auth;
use Mail;

class CartController extends Controller
{
    public function cart()
    {

        $carts = Cart::where('cus_id', Auth::guard('cus')->user()->id)->get();

        $check = Cart::where('cus_id', Auth::guard('cus')->user()->id)->count();

        return view('customer.cart', compact('carts', 'check'));
    }



    public function add(Request $request, Product $product)
    {
        // dd($request->all());

        if ($request->attr_id[0] != null) {
            $cart = Cart::where('cus_id', Auth::guard('cus')->user()->id)->where('pro_id', $product->id)->first();

            if ($cart) {

                $cartItems = Cart::where('cus_id', Auth::guard('cus')->user()->id)->get();

                foreach ($cartItems as $cartItem) {

                    if ($cartItem->pro_id == $product->id) {

                        $cartAttr = array_map('strval', $cartItem->cart_attr->pluck('id')->toArray());

                        $newAttr = $request->attr_id;

                        if ($cartAttr == $newAttr) {
                            $cartItem->quantity += $request->quantity;
                            $cartItem->total_price += $request->quantity * $product->price;
                            $cartItem->save();

                            return redirect()->route('cart.view');
                        } else {
                            $cart = Cart::create([
                                "quantity" => $request->quantity,
                                "total_price" => $request->quantity * $product->price,
                                "cus_id" => Auth::guard('cus')->user()->id,
                                "pro_id" => $product->id,
                            ]);

                            $attributes = $request->attr_id;
                            foreach ($attributes as $value) {
                                CartAttr::create([
                                    "cart_id" => $cart->id,
                                    "attr_id" => $value,
                                ]);
                            }

                            return redirect()->route('cart.view');
                        }
                    }
                }
            } else {

                $cart = Cart::create([
                    "quantity" => $request->quantity,
                    "total_price" => $request->quantity * $product->price,
                    "cus_id" => Auth::guard('cus')->user()->id,
                    "pro_id" => $product->id,
                ]);

                $attributes = $request->attr_id;
                foreach ($attributes as $value) {
                    CartAttr::create([
                        "cart_id" => $cart->id,
                        "attr_id" => $value,
                    ]);
                }

                return redirect()->route('cart.view');
            }
        } else {
            return redirect()->back()->with('no', 'Please choose attribute');
        }
    }

    public function updateQuantity(Request $request, Cart $cartItem)
    {
        if ($request->quantity_cart <= 0 || $request->quantity_cart != is_numeric($request->quantity_cart)) {
            if ($request->quantity_cart == 0) {
                $attrs = CartAttr::where('cart_id', $cartItem->id)->get();
                foreach ($attrs as $value) {
                    $value->delete();
                }
                $cartItem->delete();
            } else {
                $cartItem->quantity = 1;
                $cartItem->total_price = $cartItem->cart->price;
                $cartItem->save();
            }
        } else {
            $cartItem->quantity = $request->quantity_cart;
            $cartItem->total_price = $request->quantity_cart * $cartItem->cart->price;
            $cartItem->save();
        }

        return redirect()->route('cart.view');
    }

    public function updateAttribute(Request $request, Cart $cartItem)
    {
        $cart_attrs = CartAttr::where('cart_id', $cartItem->id)->get();
        foreach ($cart_attrs as $value) {
            $value->delete();
        }

        $attrs = $request->attr_id;
        foreach ($attrs as $value) {
            CartAttr::create([
                "cart_id" => $cartItem->id,
                "attr_id" => $value,
            ]);
        }

        return redirect()->route('cart.view');
    }

    public function delete(Cart $cartItem)
    {
        $attrs = CartAttr::where('cart_id', $cartItem->id)->get();
        foreach ($attrs as $value) {
            $value->delete();
        }

        $cartItem->delete();


        return redirect()->route('cart.view');
    }

    public function checkout()
    {
        $auth = Auth::guard('cus')->user();
        $carts = Cart::where('cus_id', Auth::guard('cus')->user()->id)->get();

        return view('customer.checkout', compact('auth', 'carts'));
    }

    public function orderCheckout(Request $request)
    {
        $request->validate([
            'shipping_metod' => 'required',
            'payment_metod' => 'required',
        ]);

        try {

            DB::beginTransaction();
            $order = Order::create([
                "cus_id" => Auth::guard('cus')->user()->id,
                "shipping_metod" => $request->shipping_metod,
                "payment_metod" => $request->payment_metod,
                "order_note	" => $request->order_note,
            ]);

            $cartItems = Cart::where('cus_id', Auth::guard('cus')->user()->id)->get();

            foreach ($cartItems as $value) {
                OrderDetail::create([
                    "quantity" => $value->quantity,
                    "price" => $value->total_price,
                    "order_id" => $order->id,
                    "product_id" => $value->pro_id,
                ]);
            }

            // $email = Auth::guard('cus')->user()->email;
            $email = $request->email;
            $token = Str::random(50);
            $order->token = $token;
            $order->save();

            Mail::to($email)->send(new VerifyOrder($order, $token));

            $carts = Cart::where('cus_id', Auth::guard('cus')->user()->id)->get();

            foreach ($carts as $cart) {
                $cartAttrs = CartAttr::where('cart_id', $cart->id)->get();
                foreach ($cartAttrs as $cartAttr) {
                    $cartAttr->delete();
                }
                $cart->delete();
            }
            DB::commit();
            return redirect()->route('index.home')->with('yes', 'You have successfully ordered');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('no', 'Your order failed');
        }
    }

    public function verifyOrder($token)
    {
        // dd('đã xác nhận');
        $order = Order::where('token', $token)->firstOrFail();
        $order->status = 1;
        $order->token = 'NULL';
        $order->save();

        return redirect()->route('index.home')->with('yes', 'Order confirmation successful');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\lessThanOrEqual;

class CartController extends Controller
{
    public function index(){
        $user = Auth::id();
        $cartItems = CartItem::with('product')->where('user_id',$user)->get();
        return view('client.cart.index',compact('cartItems'));
    }
    public function destroy(Request $request, $id){
        $item = CartItem::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }

    public function add(Request $request)
    {

        $productId = $request->product_id;//получить из запроса id
        $userId = Auth::id(); // id залогиненого бедолаги
        $existingItem = CartItem::where('user_id', $userId)->where('product_id',$productId )->first(); //найти запись
        if($existingItem){//если запись есть то увеличить колво на 1 / если нет то создать запись
        $existingItem->quantity += 1;
        $existingItem->save();
        return redirect()->back();}//просто редирект как и снизу
        else
        {
        $cartItem = CartItem::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => 1,
        ]);
        }
        return redirect()->back();

    }


}

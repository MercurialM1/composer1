<?php

namespace App\Http\Requests;

use App\Models\CartItem;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'recipient_name' => 'required|string|min:2',
            'phone' => 'required|string|min:10',
            'address' => 'required|string|min:5',
            'comment' => 'nullable|string',
        ];
    }
        public function withValidator($validator): void
        {
        $validator->after(function ($validator) {//чё то типо после стандартной валидации идёт это
            $cartItems = CartItem::where('user_id', $this->user()->id)->with('product')->get();//получить корзину
            foreach ($cartItems as $Item) {
                if($Item->product->count < $Item->quantity){//проверка с количества товара с количетвом товара в заказе
                    $validator->errors()->add(//вывод ошибки если выбрать больше чем есть
                      'error',"Товара {$Item->product->name} всего {$Item->product->count} шт,а вы заказываете {$Item->quantity}"
                    );
                }
            }
           });
        }
}

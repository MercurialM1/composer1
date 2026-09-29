<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\User;
use App\Notifications\ProductNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductObserver
{
    public function created(Product $product): void
    {
    Notification::send(User::all(), new ProductNotification($product));
    }
    public function creating(Product $product): void //до создания
    {
        $oldPath = $product->image;//путь
        $extension = pathinfo($oldPath, PATHINFO_EXTENSION); //расширения файла
        $basename = Str::slug($product->name);//нормальое имя
        $newPath = 'products/' . $basename . '.' . $extension;//путь
        if (Storage::disk('public')->exists($newPath)) {//защита от дубликатов
            $newPath = 'products/' . $basename . '-' .Str::lower(Str::random(2)) . '.'. $extension;
        }
        Storage::disk('public')->move($oldPath, $newPath);//конечная
        $product->image = $newPath;
    }
    public function updated(Product $product): void
    {

    }

    /**
     *
     */
    public function deleted(Product $product): void //не забыть про chown -R www-data:www-data storage/ без него не удаляется нихуя а файлы добавленные вручную удаляются без этого
    {
        Storage::disk('public')->delete($product->image);//само удаление уже тут
    }

    public function notification(Product $product): void
    {

    }
    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
//

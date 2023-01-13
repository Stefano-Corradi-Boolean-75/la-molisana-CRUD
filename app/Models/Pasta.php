<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pasta extends Model
{
    use HasFactory;

    protected $fillable = ['title','type','cooking_time','weight','description','slug'];

    public static function generateSlug($string){
        $slug = Str::slug($string, '-');
        /*
            - salvare lo slug originale
            - controllare se esiste
            - generarne uno con in aggiunta un contataore
            -- se esiste generarne un'altro e così via fino a che se ne trova uno non esistente
        */
        $original_slug = $slug;
        $c = 1;
        $house_exists = Pasta::where('slug',$slug)->first();
        while($house_exists){
            $slug = $original_slug . '-' . $c;
            $house_exists = Pasta::where('slug',$slug)->first();
            $c++;
        }
        return $slug;
    }
}

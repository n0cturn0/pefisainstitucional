<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoImage extends Model
{
    use HasFactory;
    protected $table = 'produtos_images';

    protected $fillable = ['idproduto', 'imagepath'];
}

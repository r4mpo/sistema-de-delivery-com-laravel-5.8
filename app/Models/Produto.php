<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produto extends Model
{
    use HasFactory;
    protected $guarded = []; /* Permitindo updates em nosso banco de dados*/ 
    protected $dates = ['date'];

    /* Criando uma function para informar que um produto pode ser adicionado ao carrinho por vários users */
    public function user(){
      return $this->belongsTo('App\Models\User');
    }

    /* Criando uma function para informar que um produto pode ser adicionado ao carrinho por vários users */
    public function users(){
      return $this->belongsToMany('App\Models\User');
    }
}
/* Este é o model de conexão com o banco de dados. Em outras palavras, uma conexão via eloquent. */
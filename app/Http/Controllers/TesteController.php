<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Possibilidades para passar parâmetros do controlador para uma view(blade):
 * -Array associativo:
 * -Método "Compact()", nativo do php, que tbém cria um array associativo
 *  baseado em parâmetros.
 * -"With()", método do próprio laravel.
 */

class TesteController extends Controller
{
    public function teste(int $p1, int $p2)
    {
        /* echo "A soma de $p1 + $p2 é: ".($p1+$p2); */

        /* Passando parâmetros para a view: */

        /* Usando um array associativo: */
        /* "p1" e "p2" são os índices deste array associativo */
        /* return view('site.teste', ['p1' => $p1, 'p2' => $p2]); */

        /* Usando o método "compact()", nativo do php: */
        /* Os parâmetros não vão como variáveis, mas como "strings" */
       /*  return view('site.teste', compact('p1', 'p2')); */

        /* Usando o método "With()", do laravel: */
        return view('site.teste')->with('xyz', $p1)->with('zzz', $p2);
    }
}

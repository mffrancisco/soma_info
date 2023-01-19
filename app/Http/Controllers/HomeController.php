<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $num1 = 25;
            $num2 = 10;
            logger()->debug('Aqui é um log antes da soma!');

            $soma = $num1 + $num2;
            logger()->info('A soma ficou: ', compact('soma'));

            $sub = $num1 - $num2;
            logger()->warning('A subtração ficou:', compact('num1', 'num2', 'sub'));

            if ($sub < 0) {
                logger()->error('Valor negativo', compact('sub'));
            } else {
                logger()->emergency('Valor positivo');
            }
            return 'Hello World!';
        } catch (Exception $e) {
            logger()->error($e);
            abort(500);
        }
    }

    public function soma($num1, $num2)
    {
        $soma = $num1 + $num2;
        logger()->info('Soma feita');

        return $soma;
    }
}

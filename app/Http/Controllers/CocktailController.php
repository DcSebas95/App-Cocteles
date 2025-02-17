<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cocktail; // Asegúrate de crear el modelo (más adelante)
use GuzzleHttp\Client;  // Usaremos Guzzle para consumir la API

class CocktailController extends Controller
{
    // Mostrar cócteles consumidos de la API pública
    public function index()
    {
        // Crear cliente HTTP
        $client = new Client();
        // Consumir la API de TheCocktailDB (ejemplo: búsqueda de cócteles que contengan "margarita")
        $response = $client->get('https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita');
        $data = json_decode($response->getBody(), true);

        // La API devuelve un array con la clave 'drinks'
        $cocktails = $data['drinks'] ?? [];

        return view('cocktails.index', compact('cocktails'));
    }

    // Guardar un cóctel en la base de datos
    public function save(Request $request)
    {
        
        $data = $request->validate([
            'strDrink' => 'required|string',
            'strCategory' => 'required|string',
            'strAlcoholic' => 'required|string',
            // Agrega otros campos según lo necesario
        ]);

        Cocktail::create($data);

        return redirect()->back()->with('success', 'Cóctel guardado correctamente.');
    }

    // Mostrar los cócteles guardados en la base de datos
    public function myCocktails()
    {
        $cocktails = Cocktail::all();
        return view('cocktails.my', compact('cocktails'));
    }
    public function edit($id)
{
    $cocktail = Cocktail::findOrFail($id);
    return view('cocktails.edit', compact('cocktail'));
}
//modificar bebidas
public function update(Request $request, $id)
{
    $data = $request->validate([
        'strDrink' => 'required|string',
        'strCategory' => 'required|string',
        'strAlcoholic' => 'required|string',
    ]);

    $cocktail = Cocktail::findOrFail($id);
    $cocktail->update($data);

    return redirect()->route('cocktails.my')->with('success', 'Cóctel actualizado correctamente.');
}
public function destroy($id)
{
    $cocktail = Cocktail::findOrFail($id);
    $cocktail->delete();

    return redirect()->route('cocktails.my')->with('success', 'Cóctel eliminado correctamente.');
}



}

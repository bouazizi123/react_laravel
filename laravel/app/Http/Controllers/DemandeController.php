<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    public function index()
    {
        $demandes = Demande::all();
        return response()->json($demandes);
    }

    public function show($id)
    {
        $demande = Demande::find($id);
        if (!$demande) {
            return response()->json(['message' => 'Demande non trouvée'], 404);
        }
        return response()->json($demande);
    }

    public function store(Request $request)
    {
        $rules = [
            'typeContact' => 'required|in:professionnel,particulier',
            'prenom' => 'required',
            'nom' => 'required',
            'raisonSociale' => 'required_if:typeContact,professionnel',
            'ice' => 'nullable|numeric|digits:11', 
            'adresse' => 'required',
            'telephone' => 'nullable|required_without:mobile|numeric',
            'mobile' => 'nullable|required_without:telephone|numeric',
            'email' => 'required|email',
            'typeDemande' => 'required',
            'description' => 'required',
        ];

        $this->validate($request, $rules);

        Demande::create($request->all());

        return response()->json(['message' => 'Demande créée avec succès'], 201);
    }


    public function update(Request $request, $id)
    {
        $demande = Demande::find($id);
        if (!$demande) {
            return response()->json(['message' => 'Demande non trouvée'], 404);
        }

        $rules = [
            'typeContact' => 'required|in:professionnel,particulier',
            'prenom' => 'required',
            'nom' => 'required',
            'raisonSociale' => 'required_if:typeContact,professionnel',
            'ice' => 'nullable|numeric|digits:15',
            'adresse' => 'required',
            'telephone' => 'nullable|numeric',
            'mobile' => 'nullable|numeric',
            'email' => 'required|email',
            'typeDemande' => 'required',
            'description' => 'required',
        ];

    $this->validate($request, $rules);

    $demande->update($request->all());

    return response()->json(['message' => 'Demande mise à jour avec succès'], 200);
}


    public function destroy($id)
    {
        $demande = Demande::find($id);
        if (!$demande) {
            return response()->json(['message' => 'Demande non trouvée'], 404);
        }

        $demande->delete();

        return response()->json(['message' => 'Demande supprimée avec succès'], 200);
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PasienController extends Controller
{

    public function cari(){
        return view('cari');
    }
    public function getPatientByNIK(Request $request)
    {
        
          $nik = $request->input('nik');            
        if (!$nik) {
            return redirect()->back()->with('error', 'NIK tidak boleh kosong');
        }
        
        $clientKey = "g9ENJcG1pTLWnoXMuRxyDDTQ3Rf7qbu6cG45ZYw01WDuAGyF";
        $secreetKey = "pMLZYZNd1whxPeASdQZGUBjS1VQ69t21bw3W1IV5AodAjIcXAwB2Z9AMYHJXuJ2M";
        $url = "https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/accesstoken?grant_type=client_credentials";
        
        $response = Http::asForm()->post($url, [
            'client_id' => $clientKey,
            'client_secret' => $secreetKey,
        ]);

        
        if ($response->successful()) {
            $token = $response->json()['access_token']; 
            $patientResponse = Http::withToken($token)->get("https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Patient?identifier=https://fhir.kemkes.go.id/id/nik|{$nik}");        
    
            if ($patientResponse->successful()) {
                $patientData = $patientResponse->json();     
                return view('pasien', compact('patientData'));
            } else {
               
                return response()->json(['error' => 'Patient not found or error fetching data'], 404);
            }
        } else {
            return response()->json(['error' => 'Failed to get access token'], 500);
        }

    }

}

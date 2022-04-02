<?php

use App\Http\Controllers\API\AnneeVoteControlleur;
use App\Http\Controllers\API\CommuneControlleur;
use App\Http\Controllers\API\ElecteurControlleur;
use App\Http\Controllers\API\ElecteursControlleur;
use App\Http\Controllers\API\ListeCandidatControlleur;
use App\Http\Controllers\API\CandidatsControlleurs;
use App\Http\Controllers\API\VoterControlleur;
use App\Http\Controllers\API\DemandeCarteControlleur;
use App\Http\Controllers\API\VotersControlleur;
use App\Http\Controllers\UserControlleur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Public Routes
Route::post('/register', [UserControlleur::class, 'register']);
Route::post('/login', [UserControlleur::class, 'login']);
Route::post('/logout', [UserControlleur::class, 'logout']);

// Public Routes
Route::get('/electeur', [ElecteurControlleur::class, 'index']);
Route::get('/electeur/{id}', [ElecteurControlleur::class, 'show']);
Route::put('/electeur/{id}', [ElecteurControlleur::class, 'update']);
Route::post('/electeur', [ElecteurControlleur::class, 'store']);
Route::delete('/electeur/{id}', [ElecteurControlleur::class, 'destroy']);
Route::get('/electeur/search/{id}', [ElecteurControlleur::class, 'search']);
Route::get('/electeur/searchByCNI/{id}', [ElecteurControlleur::class, 'searchByCNI']);
Route::get('/electeur/searchByNumElecteur/{id}', [ElecteurControlleur::class, 'searchByNumElecteur']);
Route::get('/joinCommuneRegionElecteur/{id}', [ElecteursControlleur::class, 'FindCommuneEtRegionElecteur']); 

// Public Routes
Route::get('/candidat', [ListeCandidatControlleur::class, 'index']);
Route::get('/candidat/{id}', [ListeCandidatControlleur::class, 'show']);
Route::put('/candidat/{id}', [ListeCandidatControlleur::class, 'update']);
Route::post('/candidat', [ListeCandidatControlleur::class, 'store']);
Route::delete('/candidat/{id}', [ListeCandidatControlleur::class, 'destroy']);
Route::get('/candidat/search/{id}', [ListeCandidatControlleur::class, 'search']);
Route::get('/candidat/searchByCNI/{id}', [ListeCandidatControlleur::class, 'searchByCNI']);
Route::get('/findAllCandidatByCommune/{id}', [CandidatsControlleurs::class, 'findAllCandidatByCommune']);
Route::get('/findAllCandidat', [CandidatsControlleurs::class, 'findAllCandidat']);


// Public Routes
Route::get('/demande', [DemandeCarteControlleur::class, 'index']);
Route::get('/demande/{id}', [DemandeCarteControlleur::class, 'show']);
Route::post('/demande', [DemandeCarteControlleur::class, 'store']);
Route::put('/demande/{id}', [DemandeCarteControlleur::class, 'update']);
Route::delete('/demande/{id}', [DemandeCarteControlleur::class, 'destroy']);
Route::get('/demande/searchByCNI/{id}', [DemandeCarteControlleur::class, 'searchByCNI']);


// Toutes les communes
Route::get('/commune', [CommuneControlleur::class, 'getAllCommune']);

// Pour voter
Route::get('/vote', [VoterControlleur::class, 'index']);
Route::post('/vote', [VoterControlleur::class, 'store']);

Route::get('/annee_vote', [AnneeVoteControlleur::class, 'index']);
Route::get('/annee_vote/{id}', [ElecteurControlleur::class, 'show']);

Route::get('/countByCandidat', [VotersControlleur::class, 'CountByCandidat']);
Route::get('/allCandidatByCommune', [VotersControlleur::class, 'AllCandidatByCommune']);
Route::get('/allCandidatByRegion', [VotersControlleur::class, 'AllCandidatByRegion']);
Route::get('/candidatByCommune/{id}', [VotersControlleur::class, 'CandidatByCommune']);
Route::get('/candidatByRegion/{id}', [VotersControlleur::class, 'CandidatByRegion']);











// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
});

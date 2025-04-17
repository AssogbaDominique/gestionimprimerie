<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImpressionController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\FormationController;

// Routes API pour le modèle Impression
Route::get('impressions', [ImpressionController::class, 'index']); // Liste toutes les impressions
Route::get('impressions/{id}', [ImpressionController::class, 'show']); // Affiche une impression spécifique
Route::post('impressions', [ImpressionController::class, 'store']); // Crée une nouvelle impression
Route::put('impressions/{id}', [ImpressionController::class, 'update']); // Met à jour une impression existante
Route::delete('impressions/{id}', [ImpressionController::class, 'destroy']); // Supprime une impression

// Routes API pour le modèle Utilisateur
Route::get('utilisateurs', [UtilisateurController::class, 'index']); // Liste tous les utilisateurs
Route::get('utilisateurs/{id}', [UtilisateurController::class, 'show']); // Affiche un utilisateur spécifique
Route::post('utilisateurs', [UtilisateurController::class, 'store']); // Crée un nouvel utilisateur
Route::put('utilisateurs/{id}', [UtilisateurController::class, 'update']); // Met à jour un utilisateur existant
Route::delete('utilisateurs/{id}', [UtilisateurController::class, 'destroy']); // Supprime un utilisateur

// Routes API pour le modèle Commande
Route::get('commandes', [CommandeController::class, 'index']);
Route::get('commandes/{id}', [CommandeController::class, 'show']);
Route::post('commandes', [CommandeController::class, 'store']);
Route::put('commandes/{id}', [CommandeController::class, 'update']);
Route::delete('commandes/{id}', [CommandeController::class, 'destroy']); 

// Routes API pour le modèle Formation
Route::get('formations', [FormationController::class, 'index']); // Liste toutes les formations
Route::get('formations/{id}', [FormationController::class, 'show']); // Affiche une formation spécifique
Route::post('formations', [FormationController::class, 'store']); // Crée une nouvelle formation
Route::put('formations/{id}', [FormationController::class, 'update']); // Met à jour une formation existante
Route::delete('formations/{id}', [FormationController::class, 'destroy']); // Supprime une formation

// Routes API pour le modèle Impression
Route::get('impressions', [ImpressionController::class, 'index']); // Liste toutes les impressions
Route::get('impressions/{id}', [ImpressionController::class, 'show']); // Affiche une impression spécifique
Route::post('impressions', [ImpressionController::class, 'store']); // Crée une nouvelle impression
Route::put('impressions/{id}', [ImpressionController::class, 'update']); // Met à jour une impression existante
Route::delete('impressions/{id}', [ImpressionController::class, 'destroy']); // Supprime une impression

@extends('layouts.front')

@section('title', $page->meta_title ?? 'SmartFilms Prod | Maison de Production Audiovisuelle & Films de Marque Casablanca')
@section('meta_description', $page->meta_description ?? 'Maison de production audiovisuelle à Casablanca : films de marque, spots publicitaires, prises de vues par drone 4K et narration cinématographique pour grandes marques au Maroc.')

@section('content')

    {{-- CHAPTER 01: CINEMATIC FULL-BLEED HERO (#080914) --}}
    @include('sections.hero')

    {{-- CHAPTER 02: TRUST & MONOCHROME CLIENT MARQUEE (#F7F6F3) --}}
    @include('sections.clients')

    {{-- CHAPTER 03: SELECTED CINEMATIC FILMS GRID (#080914) --}}
    @include('sections.projects')

    {{-- CHAPTER 04: CORE DISCIPLINES & EXPERTISE (#F7F6F3) --}}
    @include('sections.expertise')

    {{-- CHAPTER 05: MANIFESTO & CREATIVE PROCESS (#101229) --}}
    @include('sections.manifesto')

    {{-- CHAPTER 06: HUMAN SIDE & STUDIO TEAM (#F7F6F3) --}}
    @include('sections.team')

    {{-- CHAPTER 07: PROJECT ESTIMATOR WIZARD (#101229 / #171936) --}}
    @include('sections.estimator')

    {{-- CHAPTER 08: STUDIO CONTACT & CASABLANCA HQ (#080914) --}}
    @include('sections.contact')

@endsection

#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Flask API server pre Ľudo chat - FAISS search
Nahradí Python skripty volané z PHP
"""

import os
import json
import sys
import math
import numpy as np
import faiss
from flask import Flask, request, jsonify
from flask_cors import CORS
from openai import OpenAI

app = Flask(__name__)
CORS(app)  # Povolí CORS pre komunikáciu s PHP

# Konfigurácia
OPENAI_API_KEY = os.getenv('OPENAI_API_KEY', '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')
EMBED_MODEL = "text-embedding-3-large"

# Cesty k súborom
INDEXES = {
    'prislovia': {
        'index': 'prislovia_only_clean.faiss',
        'meta': 'prislovia_only_clean_meta.json'
    },
    'porekadla': {
        'index': 'porekadla_only_clean.faiss', 
        'meta': 'porekadla_only_clean_meta.json'
    }
}

# Cache pre načítané indexy
_index_cache = {}
_meta_cache = {}

def load_index_and_meta(index_type):
    """Načíta FAISS index a meta dáta s cachovaním"""
    if index_type in _index_cache and index_type in _meta_cache:
        return _index_cache[index_type], _meta_cache[index_type]
    
    if index_type not in INDEXES:
        raise ValueError(f"Neplatný typ indexu: {index_type}")
    
    try:
        # Načítaj index
        index_path = INDEXES[index_type]['index']
        index = faiss.read_index(index_path)
        _index_cache[index_type] = index
        
        # Načítaj meta dáta
        meta_path = INDEXES[index_type]['meta']
        with open(meta_path, "r", encoding="utf-8") as f:
            meta = json.load(f)
        _meta_cache[index_type] = meta
        
        return index, meta
    except Exception as e:
        print(f"Chyba pri načítaní indexu {index_type}: {e}", file=sys.stderr)
        raise

def embed_query(client, text):
    """Vytvorí embedding pre dotaz"""
    try:
        e = client.embeddings.create(input=text, model=EMBED_MODEL)
        v = np.array(e.data[0].embedding, dtype=np.float32)
        # L2 normalizácia (ako v FAISS indexe)
        norm = np.linalg.norm(v)
        if norm > 0:
            v = v / norm
        return v
    except Exception as e:
        print(f"Chyba pri vytváraní embeddingu: {e}", file=sys.stderr)
        raise

def search_similar(index, meta, query_vec, top_k=3):
    """Nájde podobné príslovia/porekadlá"""
    query_vec = query_vec.reshape(1, -1)
    
    # Hľadajme viac výsledkov pre lepšie pokrytie
    search_k = min(top_k * 5, index.ntotal)
    D, I = index.search(query_vec, search_k)
    
    results = []
    seen_txt_ids = set()
    
    for idx, score in zip(I[0], D[0]):
        if idx == -1:
            continue
            
        try:
            mr = meta[int(idx)]
            txt_id = mr["txt_id"]
            
            # Preskoč duplikáty
            if txt_id in seen_txt_ids:
                continue
            seen_txt_ids.add(txt_id)
            
            results.append({
                "score": float(score),
                "prislovie": mr["prislovie"],
                "vyznam": mr.get("vyznam", ""),
                "klucove_slova": mr.get("klucove_slova", ""),
                "txt_id": txt_id,
                "ai_id": mr.get("ai_id"),
            })
            
            # Ak máme dosť unikátnych výsledkov, skončíme
            if len(results) >= top_k:
                break
                
        except (IndexError, KeyError) as e:
            print(f"Chyba pri spracovaní výsledku {idx}: {e}", file=sys.stderr)
            continue
    
    return results

@app.route('/health', methods=['GET'])
def health_check():
    """Health check endpoint"""
    return jsonify({
        'status': 'ok',
        'message': 'Ľudo FAISS API server beží',
        'available_indexes': list(INDEXES.keys())
    })

@app.route('/search/prislovia', methods=['POST'])
def search_prislovia():
    """Vyhľadávanie v prísloviach"""
    try:
        data = request.get_json()
        if not data or 'query' not in data:
            return jsonify({'error': 'Chýba pole "query"'}), 400
        
        query = data['query']
        top_k = data.get('top_k', 3)
        
        # Načíta index a meta
        index, meta = load_index_and_meta('prislovia')
        
        # Vytvorí embedding pre dotaz
        client = OpenAI(api_key=OPENAI_API_KEY)
        query_vec = embed_query(client, query)
        
        # Nájde podobné príslovia
        results = search_similar(index, meta, query_vec, top_k=top_k)
        
        return jsonify({
            'results': results,
            'query': query,
            'type': 'prislovia',
            'count': len(results)
        })
        
    except Exception as e:
        print(f"Chyba v search_prislovia: {e}", file=sys.stderr)
        return jsonify({'error': str(e)}), 500

@app.route('/search/porekadla', methods=['POST'])
def search_porekadla():
    """Vyhľadávanie v porekadlách a úsloviach"""
    try:
        data = request.get_json()
        if not data or 'query' not in data:
            return jsonify({'error': 'Chýba pole "query"'}), 400
        
        query = data['query']
        top_k = data.get('top_k', 3)
        
        # Načíta index a meta
        index, meta = load_index_and_meta('porekadla')
        
        # Vytvorí embedding pre dotaz
        client = OpenAI(api_key=OPENAI_API_KEY)
        query_vec = embed_query(client, query)
        
        # Nájde podobné porekadlá a úslovia
        results = search_similar(index, meta, query_vec, top_k=top_k)
        
        return jsonify({
            'results': results,
            'query': query,
            'type': 'porekadla',
            'count': len(results)
        })
        
    except Exception as e:
        print(f"Chyba v search_porekadla: {e}", file=sys.stderr)
        return jsonify({'error': str(e)}), 500

@app.route('/search/combined', methods=['POST'])
def search_combined():
    """Kombinované vyhľadávanie (príslovia + porekadlá)"""
    try:
        data = request.get_json()
        if not data or 'query' not in data:
            return jsonify({'error': 'Chýba pole "query"'}), 400
        
        query = data['query']
        top_k = data.get('top_k', 3)
        
        # Vytvorí embedding pre dotaz (len raz)
        client = OpenAI(api_key=OPENAI_API_KEY)
        query_vec = embed_query(client, query)
        
        # Získaj výsledky z oboch typov
        prislovia_results = []
        porekadla_results = []
        
        try:
            # Príslovia
            index, meta = load_index_and_meta('prislovia')
            prislovia_results = search_similar(index, meta, query_vec, top_k=top_k)
        except Exception as e:
            print(f"Chyba pri vyhľadávaní v prísloviach: {e}", file=sys.stderr)
        
        try:
            # Porekadlá
            index, meta = load_index_and_meta('porekadla')
            porekadla_results = search_similar(index, meta, query_vec, top_k=top_k)
        except Exception as e:
            print(f"Chyba pri vyhľadávaní v porekadlách: {e}", file=sys.stderr)
        
        # Kombinuj výsledky
        all_results = prislovia_results + porekadla_results
        
        return jsonify({
            'results': all_results,
            'query': query,
            'type': 'combined',
            'count': len(all_results),
            'prislovia_count': len(prislovia_results),
            'porekadla_count': len(porekadla_results)
        })
        
    except Exception as e:
        print(f"Chyba v search_combined: {e}", file=sys.stderr)
        return jsonify({'error': str(e)}), 500

@app.route('/search/extended', methods=['POST'])
def search_extended():
    """Rozšírené vyhľadávanie (viac výsledkov)"""
    try:
        data = request.get_json()
        if not data or 'query' not in data:
            return jsonify({'error': 'Chýba pole "query"'}), 400
        
        query = data['query']
        top_k = data.get('top_k', 20)  # Východzia hodnota 20
        
        # Vytvorí embedding pre dotaz
        client = OpenAI(api_key=OPENAI_API_KEY)
        query_vec = embed_query(client, query)
        
        # Získaj viac výsledkov z oboch typov
        prislovia_count = min(math.ceil(top_k / 2), 50)
        porekadla_count = min(top_k - prislovia_count, 50)
        
        prislovia_results = []
        porekadla_results = []
        
        try:
            # Príslovia
            index, meta = load_index_and_meta('prislovia')
            prislovia_results = search_similar(index, meta, query_vec, top_k=prislovia_count)
        except Exception as e:
            print(f"Chyba pri vyhľadávaní v prísloviach: {e}", file=sys.stderr)
        
        try:
            # Porekadlá
            index, meta = load_index_and_meta('porekadla')
            porekadla_results = search_similar(index, meta, query_vec, top_k=porekadla_count)
        except Exception as e:
            print(f"Chyba pri vyhľadávaní v porekadlách: {e}", file=sys.stderr)
        
        # Kombinuj výsledky
        all_results = prislovia_results + porekadla_results
        
        return jsonify({
            'results': all_results,
            'query': query,
            'type': 'extended',
            'count': len(all_results),
            'prislovia_count': len(prislovia_results),
            'porekadla_count': len(porekadla_results)
        })
        
    except Exception as e:
        print(f"Chyba v search_extended: {e}", file=sys.stderr)
        return jsonify({'error': str(e)}), 500

if __name__ == '__main__':
    port = int(os.environ.get('PORT', 5000))
    app.run(host='0.0.0.0', port=port, debug=False)

# Ľudo FAISS API Server

Flask API server pre vyhľadávanie v prísloviach a porekadlách pomocou FAISS indexov.

## Lokálne spustenie

1. Nainštaluj dependencies:
```bash
pip install -r requirements.txt
```

2. Nastav environment variable:
```bash
export OPENAI_API_KEY="tvoj-openai-api-key"
```

3. Spusti server:
```bash
python app.py
```

Server bude bežať na `http://localhost:5000`

## API Endpoints

### Health Check
```
GET /health
```

### Vyhľadávanie v prísloviach
```
POST /search/prislovia
Content-Type: application/json

{
  "query": "tvoj dotaz",
  "top_k": 3
}
```

### Vyhľadávanie v porekadlách
```
POST /search/porekadla
Content-Type: application/json

{
  "query": "tvoj dotaz", 
  "top_k": 3
}
```

### Kombinované vyhľadávanie
```
POST /search/combined
Content-Type: application/json

{
  "query": "tvoj dotaz",
  "top_k": 3
}
```

### Rozšírené vyhľadávanie
```
POST /search/extended
Content-Type: application/json

{
  "query": "tvoj dotaz",
  "top_k": 20
}
```

## Potrebné súbory

Server potrebuje tieto súbory v root adresári:
- `prislovia_only_clean.faiss`
- `prislovia_only_clean_meta.json`
- `porekadla_only_clean.faiss`
- `porekadla_only_clean_meta.json`

## Deployment na Railway

1. Pushni kód do GitHub repozitára
2. Pripoj repozitár k Railway
3. Nastav `OPENAI_API_KEY` environment variable
4. Uploadni FAISS súbory
5. Deploy!

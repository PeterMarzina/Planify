from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
from typing import List

# Maak de FastAPI app instance
app = FastAPI()

# CORS Middleware instellen
origins = [
    "http://localhost:5173", # De poort van onze React frontend
    "http://localhost:3000", # Een andere veelgebruikte poort voor React
]

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# Pydantic model voor data validatie
class Todo(BaseModel):
    id: int
    title: str
    completed: bool

# Simpele in-memory "database"
todos_db = [
    Todo(id=1, title='Leer FastAPI', completed=True),
    Todo(id=2, title='Bouw een React frontend', completed=False),
]

# API Endpoints (Routes) Dit laat de lijst zien
@app.get("/todos", response_model=List[Todo])
def get_todos():
    return todos_db

#  Dit onder is de memory van de todo lijst
@app.post("/todos", response_model=Todo)
def create_todo(todo: Todo):
    todos_db.append(todo)
    return todo

@app.get("/")
def root():
    return {"message": "Hello World"}

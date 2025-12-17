import { useState, useEffect } from 'react';

const API_URL = 'http://127.0.0.1:8000';

function App() {
  // State voor de lijst van todos en de input voor een nieuwe todo
  const [todos, setTodos] = useState([]);
  const [newTodoTitle, setNewTodoTitle] = useState('');

  // useEffect hook om data te fetchen wanneer de component laadt
  useEffect(() => {
    const fetchTodos = async () => {
      const response = await fetch(`${API_URL}/todos`);
      const data = await response.json();
      setTodos(data);
    };
    fetchTodos();
  }, []); // Lege dependency array zorgt ervoor dat dit maar één keer draait

  // Functie om een nieuwe todo toe te voegen
  const addTodo = async (e) => {
    e.preventDefault(); // Voorkom dat de pagina herlaadt
    if (!newTodoTitle.trim()) return;

    const newTodo = {
      id: Date.now(), // Simpel uniek ID
      title: newTodoTitle,
      completed: false,
    };

    await fetch(`${API_URL}/todos`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(newTodo),
    });

    setTodos([...todos, newTodo]);
    setNewTodoTitle('');
  };

  return (
    <div className="bg-gray-100 min-h-screen flex items-center justify-center">
      <div className="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 className="text-3xl font-bold mb-6 text-center text-gray-800">Mijn To-Do Lijst</h1>

        <form onSubmit={addTodo} className="flex mb-4">
          <input
            type="text"
            className="flex-grow p-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Voeg een nieuwe taak toe..."
            value={newTodoTitle}
            onChange={(e) => setNewTodoTitle(e.target.value)}
          />
          <button type="submit" className="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600">
            Toevoegen
          </button>
        </form>

        <ul>
          {todos.map((todo) => (
            <li key={todo.id} className="p-2 border-b border-gray-200">
              {todo.title}
            </li>
          ))}
        </ul>
      </div>
    </div >
  );
}

export default App;
